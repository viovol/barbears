<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Helpers;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(Request $request)
    {

        $token = $request->session()->get('_token'); // paima visas sesijas

        $total = cart_amount($token);
        $sub_total = number_format($total / 1.21, 2);
        $vat = $total - $sub_total;

        // dd($total);

        $carts = Cart::where('token', $token)->whereNull('order_id')->get();

        return view('carts/index', compact('carts', 'sub_total', 'vat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $cart = new Cart;
        $cart->token = $request->_token;
        $cart->product_id = $request->product_id;
        $cart->save();

        $cart->totalPrice = cart_amount($request->_token);

        echo json_encode($cart);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index');
    }
}
