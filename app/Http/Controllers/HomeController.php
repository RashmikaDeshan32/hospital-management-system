<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function selectRegisterForm(){
        
        return view('selectRegister');
    }

    public function about(){
        
        return view('about');
    }

    public function contact(){
        
        return view('ContactUs');
    }


    public function showLoginForm(){
        
        return view('login');
    }

    public function logout(Request $request)
    {   
        Auth::logout();
        //$request->session()->pull('userInfo');
        return view("Stafflogin");
    }
}
