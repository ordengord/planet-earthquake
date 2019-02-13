<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
   public function __invoke(Request $request)
   {
       $transaction = new Transaction;
       foreach($request->orders as $order){
           $order->transaction_id = $transaction->id;
       }
       $transaction->save();
       return view('order.transaction');
   }
}
