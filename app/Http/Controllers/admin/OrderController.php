<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {

        $orders = Order::paginate('6');

        return view('admin.order.order', \compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findorFail($id);
        $books = $order->book;

        $total = 0;
        foreach ($order->book as $prices) {
            $total += $prices->price;
        }

        return view('admin.order.detail', compact('books', 'total'));
    }

    public function edit($id)
    {
        $order = Order::findOrfail($id);

        return view('admin.order.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {

        $order = Order::findOrfail($id);

        $order->fill(
            $request->only('status')
        );
        $order->save();

        return redirect('admin/order')->with('status', 'Completed');
    }

}
