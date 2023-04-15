<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('frontend.checkout',[
            'user' => User::find(Auth::user()->id),
        ]);
    }
    public function checkoutPost(Request $request){
        Billing::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country_id' => $request->city_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
        ]);
        echo "inserted";
    }
}
