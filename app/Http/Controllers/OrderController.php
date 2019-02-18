<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get()
    {
        return view('order');
    }

    //to be rewritten inside the model
    public function show(Request $request)
    {
        $orders = Order::select('id', 'latitude', 'longitude', 'start_date', 'end_date', 'cost')
            ->where('user_id', $request->user()->id)
            ->where('Transaction_id', null)
            ->get();

        $total = 0;

        foreach($orders as $order){
            $total += $order->cost;
        }

        return view('my-orders')->with(compact('orders'))->with(compact('total'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('delete_id');
        Order::where('id', $id)->delete();
        return route('my-orders');
    }

    public function create(Request $request, bool $prevOrders = false)
    {
        $orders = Order::where('user_id',  $request->user()->id)->get();

        $prevOrders = count($orders) ? true : false;

        if ($request->getMethod() === 'POST') {
            $request->validate([
                'latitude' => 'required|numeric|min:-90|max:90',
                'longitude' => 'required|numeric|min:-180|max:180',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date'
            ]);

            $order = new Order([
                'user_id' => $request->user()->id,
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
