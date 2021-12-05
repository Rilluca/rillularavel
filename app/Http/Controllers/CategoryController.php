<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import Database Library
use App\Category; //import category model

class CategoryController extends Controller
{
    public function add(){
        $r=request(); //receive data by GET or POST method
        $addCategory=Category::create([
            'name'=>$r->categoryName,
        ]);
        return view('addCategory');
    }
}
