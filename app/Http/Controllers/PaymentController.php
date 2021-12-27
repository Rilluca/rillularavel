<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use DB;
use Session;
use Auth;
use App\myCart;
use App\myOrder;

class PaymentController extends Controller
{

    public function paymentPost(Request $request)
    {
           
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->sub*100,
                "currency" => "MYR",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of southern online",
        ]);

        return back();
    }
}