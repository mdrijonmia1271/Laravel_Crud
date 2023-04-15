@extends('layouts.frontend_app')

@section('frontend_content')
    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                        <form action="{{ url('checkout/post') }}" method="post"> 
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <p>Name *</p>
                                    <input type="text" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone_number">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Country *</p>
                                    <select id="s_country" name="country_id">
                                        <option value="1">Bangladesh</option>
                                        <option value="2">Pakistan</option>
                                        <option value="3">Afganistan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>City *</p>
                                    <select id="s_country" name="city_id">
                                        <option value="1">Dhaka</option>
                                        <option value="2">Islamabad</option>
                                        <option value="3">Kabul</option>
                                    </select>
                                </div>                                
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">
                                </div>   
                                <div class="col-12">
                                    <input id="toggle2" type="checkbox">
                                    <label class="fontsize" for="toggle2">Ship to a different address</label>
                                    <div class="row" id="open2">
                                        <div class="col-12">
                                            <p>Name *</p>
                                            <input type="text">
                                        </div>
                                        <div class=" col-12">
                                            <p>Email Address *</p>
                                            <input type="email">
                                        </div>
                                        <div class="col-12">
                                            <p>Phone No. *</p>
                                            <input type="text">
                                        </div>
                                        <div class="col-12">
                                            <p>Country *</p>
                                            <select id="s_country">
                                                <option value="">Bangladesh</option>
                                                <option value="">Pakistan</option>
                                                <option value="">Afganistan</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <p>City *</p>
                                            <select>
                                                <option value="">Dhaka</option>
                                                <option value="">Islamabad</option>
                                                <option value="">Kabul</option>
                                            </select>
                                        </div>                                
                                        <div class="col-12">
                                            <p>Your Address *</p>
                                            <input type="text">
                                        </div> 
                                    </div>
                                </div>   
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="notes" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            @foreach (cart_items() as $cart_item)
                            <li>{{ $cart_item->product->product_name }} X {{ $cart_item->product_quantity }} <span class="pull-right">${{ $cart_item->product->product_price * $cart_item->product_quantity }}</span></li>
                            @endforeach
                            <li>Subtotal <span class="pull-right"><strong>${{ session('cart_sub_total') }}</strong></span></li>
                            <li>Discount <span class="pull-right">${{ session('discount_amount') }}</span></li>
                            <li>Total<span class="pull-right">${{ session('cart_sub_total') - session('discount_amount') }}</span></li>
                        </ul>
                        <ul class="payment-method">  
                            <li>
                                <input id="delivery" type="radio" name="payment_option" value="1" checked>
                                <label for="delivery">Cash on Delivery</label>
                            </li>                          
                            <li>
                                <input id="card" type="radio" name="payment_option" value="2">
                                <label for="card">Credit Card</label>
                            </li>
                        </ul>
                        <button type="submit">Place Order</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection