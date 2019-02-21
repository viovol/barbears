@extends('layouts.app')
@section('content')

<section class="page-tittle page-tittle-md bg dark-overlay" style="background-image: url('{{asset('images/bg-18.jpg')}}')">
    <div class="container">
        <div class="page-tittle-head display-block text-center">
            <h2>Cart</h2>
        </div>
    </div>
</section>

<!-- Cart Start -->
<section class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart-table">
                    <table class="table">
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="product-img">
                                    <img class="img-responsive" src="{{$product['item']['img_url']}}" alt="">
                                </td>
                                <td class="product-info">
                                    <span class="display-block mrg-btm-5">{{$product['item']['title']}}</span>
                                    <span class="display-block mrg-btm-5">Category:{{$product['item']['category']['title']}} </span>
                                    <span class="display-block mrg-btm-5">Category: {{$product['price']}}</span>

                                    <span class="badge">Quantity{{$product['qty']}}</span>
                                </td>
                                <!-- kiekis -->
                                <td></td>
                                <td>
                                  <!-- delete -->
                      
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card pdd-horizon-30 pdd-vertical-25 mrg-top-30">
                    <div class="border bottom">
                        <h3 class="mrg-btm-30">Summary</h3>
                        <p>Subtotal: <span class="pull-right"> $ {{$totalPrice}}</span></p>
                        <p class="mrg-top-20">Discount: <span class="pull-right">$ 0</span></p>
                    </div>
                    <p class="mrg-top-20">Grand Total: <span class="pull-right text-dark font-size-18"><b> $ {{$totalPrice + 30}}</b></span></p>
                    <div class="text-center mrg-top-30">
                        <a class="btn btn-dark btn-block" id="testas" href="javascript:void(0);">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
