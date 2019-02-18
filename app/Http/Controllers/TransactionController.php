<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
   public function create(Request $request)
   {
       $transaction = new Transaction;

       $orders = Order::select('id', 'latitude', 'longitude', 'start_date', 'end_date', 'cost')
           ->where('user_id', $request->user()->id)
           ->where('Transaction_id', null)
           ->get();

       $total = 0;
       foreach($orders as $order){
           $order->transaction_id = $transaction->id;
           $total += $order->cost;
           $order->save();
       }

       $transaction->user_id =  $request->user()->id;
       $transaction->total = $total;
       $transaction->save();

       return view('order.transaction')->with(compact('transaction'));
   }

   /*public function pay(Request $request)
   {
       return view('order.transaction');
   }*/



}
