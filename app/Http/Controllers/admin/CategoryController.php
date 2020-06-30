<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate('6');
        return view('admin.category.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect('admin/category')->with('status', 'Created Successful');
    }

    public function edit($id)
    {
        $category = Category::findorfail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrfail($id);
        $category->fill(
            $request->only('name')
        );
        $category->save();

        return redirect('admin/category')->with('status', 'Edited Successful');
    }

    public function destroy($id)
    {
        $category = Category::findOrfail($id);
        $category->delete();

        return redirect('admin/category')->with('status', 'deleted');
    }
}
