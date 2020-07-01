<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\OrderRequest;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(OrderRequest $request)
    {
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . $request->type . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/order/', $imageName);
        } else {
            $imageName = 0;
        }

        $order = Order::create([
            'user_id' => $request->user_id,
            'image' => $imageName,
            'description' => $request->description,
            'phone' => $request->phone,
            'type' => $request->type,

        ]);
        $books = $request->book;
        foreach ($books as $book) {
            $order->book()->attach([$book]);
        }

        $request->session()->forget('items');

        return redirect('/')->with("status", "Thank you, Dear Customer Your order is confirmed
        Customers who bought books, after you paid money ,you will receive item via email within 24-36 hours depends on stock availability.");
    }

    public function show($id)
    {

        $orders = Order::where('user_id', $id)->get();

        return view('client.order.order', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::findorFail($id);
        $books = $order->book;

        $total = 0;
        foreach ($order->book as $prices) {
            $total += $prices->price;
        }

        return view('client.order.detail', compact('books', 'total'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
