<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
class ChangePasswordController extends Controller
{
    // change password index page
    function index() {
        return view('admin.body.change-password');
    }

    // update password
    function update(Request $req) {

        $req->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        // user password within users table
        $pass = Auth::user()->password;

        // if user password is equals to confirmed password 
        if (Hash::check($req->current_password, $pass)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($req->password);
            $user->save();
            Auth::logout();

            return redirect()->route('login')->with('success', 'Password Changed Successfully!');
        }
        else {
            // return redirect()->back()->with('error', "Please try again!");

        }
        
    }



    // update Profile
    function profile(Request $req) {
        $user = Auth::user()::all();        
        return view('admin.body.change-profile');   
    }    

}
