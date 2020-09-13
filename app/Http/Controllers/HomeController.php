<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\User;
use Illuminate\Http\Request;
use session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (request('search')) {
            $books = Book::where('title', 'like', '%' . request('search') . '%')
                ->orderby('id', 'desc')->paginate('12');
        } else {
            $books = Book::orderby('id', 'desc')->paginate('12');
        }
        $cats = Category::all();
        $Books = Book::where('category_id', '5')->get();
        return view('client.home.home', compact('Books', 'cats', 'books'));
    }

    public function detail($id)
    {
        $book = Book::findOrfail($id);
        return view('client.book.detail', compact('book'));
    }

    public function category($id)
    {
        $cats = Category::all();
        $books = Book::where('category_id', $id)->paginate('8');
        $Books = Book::where('category_id', '1')->get();
        return view('client.home.home', compact('books', 'Books', 'cats'));
    }

    public function add(Request $request, $id)
    {
        $items = array();

        if ($request->session()->has('items')) {
            $items = $request->session()->get('items');

            if (!in_array($id, $items)) {
                array_push($items, $id);

            }

        } else {
            array_push($items, $id);
        }

        $request->session()->put('items', $items);

        // $request->session()->flush();

        $book = Book::findOrfail($id);
        return view('client.book.detail', compact('book'));
    }

    public function show(Request $request)
    {

        $cart = $request->session()->get('items');

        $books = array();

        for ($i = 0; $i < count($cart); $i++) {

            $book = Book::find($cart[$i]);

            array_push($books, $book);
        }
        $total = 0;
        foreach ($books as $book) {
            $total += $book->price;
        }

        return view('client.cart.cart', compact('books', 'total'));
    }

    public function cartDelete(Request $request, $id)
    {

        $cart = $request->session()->get('items');

        $books = array();

        for ($i = 0; $i < count($cart); $i++) {

            $book = Book::find($cart[$i]);

            array_push($books, $book);
        }

        $total = 0;
        foreach ($books as $book) {
            $total += $book->price;
        }

        return view('client.cart.cart', compact('books', 'total'));

    }

    public function check(Request $request, $id)
    {

        $cart = $request->session()->get('items');

        $books = array();

        for ($i = 0; $i < count($cart); $i++) {

            $book = Book::find($cart[$i]);

            array_push($books, $book);
        }

        $Books = $books;

        $total = 0;
        foreach ($books as $book) {
            $total += $book->price;
        }
        $user = User::findOrfail($id);
        return view('client.cart.order', compact('books', 'total', 'user', 'Books'));
    }
}
