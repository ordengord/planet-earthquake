<?php

namespace App\Http\Controllers;

use const http\Client\Curl\AUTH_ANY;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function myOrders(Request $request)
    {
        $orders = Order::select('latitude', 'longitude', 'start_date', 'end_date', 'cost')
            ->where('user_id', Auth::user()->id)
            ->where('Transaction_id', null)
            ->get();
        return view('my-orders')->with(compact('orders'));
    }
}
