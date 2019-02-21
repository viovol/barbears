<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $categories= Category::all();
         $products= Product::all();
         return view('products.index', compact('categories'),['products'=>Product::paginate(6)
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories= Category::all();
        return view('products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,
        ['title'=>'required',
        'description'=>'required',
        'img_url'=>'required',
        'price'=>'required',
        'quantity'=>'required|numeric',
        'category_id'=>'required',

      ]);
          $product=new Product;
          $product->title=$request->title;
          $product->description=$request->description;
          $product->img_url=$request->img_url;
          $product->price=$request->price;
          $product->quantity=$request->quantity;
          $product->category_id=$request->category_id;

          $product->save();
          return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $product = Product::find($id);
         $categories = Category::all();
            //  dd($product,$categories);
        return view('products/edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      Product::find($id)->update($request->all());
// $product->Duombazės kintamasis = $request->input(inputo vardas);
        $product = Product::find($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->img_url = $request->input('img_url');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->update();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect()->route('products.index');
    }

    public function getAddToCart( Request $request, $id){
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart'):null;
      $cart=new Cart($oldCart);
      $cart->add($product, $product->id);
      Session::put('cart',$cart);

        // dd($request->session()->get('cart'));

      return redirect()->route('products.index');
    }
    public function getCart(){
      if (!Session::has('cart')) {
        # code...
        return view('carts.index');
        }
        $oldCart= Session::get('cart');

        $cart=new Cart($oldCart);
        return view('carts.index',['products'=> $cart->items, 'totalPrice'=>$cart->totalPrice]);

    }
}
