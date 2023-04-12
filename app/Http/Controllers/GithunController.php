<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithunController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback(){
        $user = Socialite::driver('github')->user();
        if(!User::where('email', $user->getEmail())->exists()){
            User::insert([
                'name' => $user->getNickname(),
                'email' => $user->getEmail(),
                'role' => 2,
                'password' => Hash::make('abc@123'),
                'created_at' => Carbon::now(),
            ]);
        }
        if(Auth::attempt(['email' => $user->getEmail(), 'password' => 'abc@123' ])){
            return redirect('customer/home');
        }
    }
}
