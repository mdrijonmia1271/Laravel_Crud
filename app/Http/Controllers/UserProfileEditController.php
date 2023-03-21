<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileEditController extends Controller
{
    //

    public function user_profile_edit()
    {
        return view('admin/user_profile/index');
    }
    public function user_profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if (Auth::user()->updated_at->addDays(30) < Carbon::now()) {
            User::find(Auth::user()->id)->update([
                'name' => $request->name
            ]);
            return back()->with('name_change', 'Successfully User Name Changed!');
        } else {
            $laft_days = Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30));
            return back()->with('laft_days','You can change user name after '.$laft_days.' days!');
        }
    }
    public function user_password_update(Request $request)
    {
        $request->validate([
            'password' => 'confirmed|min:8|alpha-num',
        ],[
           'password.confirmed' => 'Confirm Password Not Match !',
           'password.min:8' => 'Password Must be more than 8 !',
        ]);
        if(Hash::check( $request->old_password, Auth::user()->password)) {
            if($request->old_password == $request->password){
                return back()->with('new_password_error','Puran password abar disen kno!');
            }else{
                User::find(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);
                return back();
            }
        }else{
           return back()->with('old_password_error','Your old password does not match with database !');
        }
       
    }
}