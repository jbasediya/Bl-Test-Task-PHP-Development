<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard(){
    return view('backend.dashboard');
   }

   public function user_dashboard(){
      return view('frontend_user.user_dashboard');
   }
}
