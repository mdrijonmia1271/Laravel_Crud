<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('TestPayment.stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => 960 * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "Payment Form Mohosin" 
        ]);
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
