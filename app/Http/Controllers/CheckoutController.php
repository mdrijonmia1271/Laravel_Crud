<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
