<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //import Database Library
use App\Product; //import category model
use Session;
use App\Category;

class ProductController extends Controller
{
    public function add(){
        $r=request(); //receive data by GET or POST method
        $image=$r->file('productImage');
        $image->move('images',$image->getClientOriginalName()); //images is the location of the folder
        $imageName=$image->getClientOriginalName();

        $addProduct=Product::create([
            'name'=>$r->productName,
            'description'=>$r->productDescription,
            'price'=>$r->productPrice,
            'image'=>$imageName,
            'quantity'=>$r->productQuantity,
            'categoryID'=>$r->categoryID,
            'id'=>$r->id,
        ]);
        Session::flash('success',"Product create successful!");
        return redirect()->route('showProduct');
    }

    public function view(){
        //$viewProduct=Product::all();
        $viewProduct=DB::table('products') //generate all from category in SQL
        
        ->leftjoin('categories','categories.id','=','products.categoryID')
        ->select('products.*','categories.name as catName')
        ->get();

        return view('showProduct')->with('products',$viewProduct);
    }

    public function delete($id){
        $deleteProduct=Product::find($id);
        $deleteProduct->delete();
        Session::flash('success',"Product deleted successfully!");
        Return redirect()->route('showProduct');
    }

    public function edit($id){
       $products=Product::all()->where('id',$id);
       
       return view('editProduct')->with('products',$products)->with('categoryID',Category::all());
    }

    public function update(){
        $r=request();
        $products=Product::find($r->productID);

        if($r->file('productImage')!=''){
            $image=$r->file('productImage');        
            $image->move('images',$image->getClientOriginalName());                   
            $imageName=$image->getClientOriginalName(); 
            $products->image=$imageName;
            }    
        
        $products->name=$r->productName;
        $products->description=$r->productDescription;
        $products->price=$r->productPrice;
        $products->quantity=$r->productQuantity;
        $products->categoryID=$r->categoryID;
        $products->save();

        return redirect()->route('showProduct');
    }

    public function productDetail($id){
        $products=Product::all()->where('id',$id);

        return view('productDetail')->with('products',$products);
    }
}
