<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     // Created Login View to manage the Admin Login and User Login Functionalty
   public function login(){

    return view('auth.login');
  
   }

    // Handle user login
    public function login_user(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // if (Auth::attempt($credentials)) {
        //     // Authentication passed...
        //     return redirect()->intended('panel/dashboard')->with('success', 'You are logged in!');
        // }
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('panel/dashboard')->with('success', 'Admin logged in!');
            } else {
                return redirect()->intended('user/dashboard')->with('success', 'User logged in!');
            }
        }
    

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    // Created Register View to manage the  User Registration Functionalty

    public function register(){
        
        return view('auth.register');

    
    }

     // Created Register Storing  to manage the  User Registration in the database Functionalty

     public function create_user(Request $request){
    
        //    dd($request->all());

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'

        ]);

        $save = new User();
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->save();

        return redirect('login')->with('success','Your account has registerd successfully');

    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

}
