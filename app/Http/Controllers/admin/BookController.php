<?php

namespace App\Http\Controllers\admin;

use App\Book;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        if (request('search')) {
            $books = Book::where('title', 'like', '%' . request('search') . '%')
                ->orderby('id', 'desc')->paginate('12');
        } else {
            $books = Book::orderby('id', 'desc')->paginate('12');
        }
        $cats = Category::all();

        return view('admin.book.book', compact('books', 'cats'));
    }

    public function create()
    {
        $cats = Category::all();
        return view('admin.book.create', compact('cats'));
    }

    public function store(BookRequest $request)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $request->title . '.' . $image->getClientOriginalExtension();
        $image->move(public_path() . '/book/', $imageName);
        Book::create([
            'title' => $request->title,
            'image' => $imageName,
            'price' => $request->price,
            'description' => $request->description,
            'qty' => $request->qty,
            'category_id' => $request->category_id,
        ]);
        return redirect('admin/book/create')->with('status', 'Created Successful');
    }

    public function edit($id)
    {
        $book = Book::findOrfail($id);
        $cats = Category::all();
        return view('admin.book.edit', compact('book', 'cats'));
    }

    public function update(BookUpdateRequest $request, $id)
    {
        $book = Book::findOrfail($id);

        $book->fill(
            $request->only(['title', 'price', 'description', 'qty', 'category_id'])
        );
        $book->save();
        $image = $request->file('image');

        if ($image) {
            $imageName = time() . '_' . $request->title . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/book/', $imageName);
            $book->image = $imageName;
            $book->save();
        }

        return \redirect('admin/book')->with('status', 'Edited Successful');
    }

    public function destroy($id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        return redirect('admin/book')->with('status', 'Deleted');
    }

    public function category($id)
    {

        $books = Book::where('category_id', $id)->get();
        return dd($books);
    }
}
