<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\myCart;
use App\Product;

class CartController extends Controller
{
    public function add(){
        $r=request();
        $addCart=myCart::Create([
            'productID'=>$r->productID,
            'quantity'=>$r->quantity,
            'userID'=>$r->Auth::id(),
            'orderID'=>'',
        ]);
    }
}
