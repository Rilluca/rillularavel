<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use DB;
use Session;
use Auth;
use App\myCart;
use App\myOrder;
use Notification;

class PaymentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function paymentPost(Request $request)
    {
           
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is for testing purpose only.",
        ]);

        $newOrder=myOrder::create([ //create new order in myOrder with the login
            'paymentStatus'=>'Done',
            'userID'=>Auth::id(),
            'amount'=>$request->sub,
        ]);

        $orderID=DB::table('my_orders')
        ->where('userID','=',Auth::id())
        ->orderBy('created_at','desc')
        ->first(); //get the order ID at time created

        $items=$request->input('cid');
        foreach($items as $item=>$value){
            $carts=myCart::find($value); //get the cart item
            $carts->orderID=$orderID->id; //bind orderID with cart item
            $carts->save();
        }

        $email='gayerinst@gmail.com'; //receiver email
        Notification::route('mail',$email)->notify(new \App\Notifications\orderPaid($email));


        Session::flash('success','Purchase successful!');
        return back();
    }

    public function view(){
        $viewOrder=myOrder::all(); //generate SQL select * from categories
        
        Return view('myOrder')->with('my_orders', $viewOrder);
    }
}