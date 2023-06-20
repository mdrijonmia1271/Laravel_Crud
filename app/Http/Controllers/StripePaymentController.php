<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        if(session('order_id_from_checkout_page')){

            return view('TestPayment.stripe');

        }else{
            abort(404);
        }
    }

    public function stripePost(Request $request)
    {
        $amoutnt = session('cart_sub_total') - session('discount_amount');

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $amoutnt * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment Form Mohosin. Order ID: ". session('order_id_from_checkout_page')
        ]);
      
        Session::flash('pay_success', 'Payment successful!');
        
        Order::find(session('order_id_from_checkout_page'))->update([
            'payment_status' => 2
            
        ]);
        session([
              'cart_sub_total' => '',
              'coupon_name' => '',
              'discount_amount' => '',
              'order_id_from_checkout_page' => '',
        ]);   
        return redirect('cart/index');
    }
}
