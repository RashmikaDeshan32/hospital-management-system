<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;
use App\Models\DoctorQualification;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){

        
        return view('Admin.login');
    }


   
}
