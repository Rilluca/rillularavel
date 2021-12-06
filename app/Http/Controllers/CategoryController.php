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
        return redirect()->route('showCategory');
    }

    public function view(){
        $viewCategory=Category::all(); //generate all from category in SQL
        return view('showCategory')->with('categories',$viewCategory);
    }
}
