<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\City;
use App\Models\Country;
use App\Models\Shipping;
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
            'countries' => Country::all(),
            'cities' => City::all(),
        ]);
    }
    public function checkoutPost(Request $request){
        if(isset($request->shipping_address_status)){
            Shipping::insert([
                'name' => $request->shipping_name,
                'email' => $request->shipping_email,
                'phone_number' => $request->shipping_phone_number,
                'country_id' => $request->shipping_country_id,
                'city_id' => $request->shipping_city_id,
                'address' => $request->shipping_address,
                'created_at' => Carbon::now(),
            ]);
        }else{
            Shipping::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'created_at' => Carbon::now(),
            ]);
        }
        Billing::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
        ]);
        echo "inserted";
    }
    public function getCityListAjax(Request $request){
        $stringToSend = "";
        $cities = City::where('country_id', $request->country_id)->get();
        foreach($cities as $city){
            $stringToSend .= "<option value='".$city->id."'>".$city->name."</option>";
        }
        return $stringToSend;
    }
}
