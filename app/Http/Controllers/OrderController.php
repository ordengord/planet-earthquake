<?php

namespace App\Http\Controllers;

use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get()
    {
        return view('order');
    }

    public function __invoke(Request $request, bool $prevOrders = false)
    {
        $orders = Order::where('user_id', Auth::id())->get();

        $prevOrders = count($orders) ? true : false;

        if ($request->getMethod() === 'POST') {
            $request->validate([
                'latitude' => 'required|numeric|min:-90|max:90',
                'longitude' => 'required|numeric|min:-180|max:180',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date'
            ]);

            $order = new Order([
                'user_id' => Auth::user()->id,
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date')
            ]);

            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            $order->cost = 5 * (1 + $start->diffInDays($end));

            $order->save();
        }

        return view('order', compact('prevOrders'));
    }
}
