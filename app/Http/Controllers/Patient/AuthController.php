<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;

use App\Models\City;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm(){

        //Fectcing city data from the cities table
        $cities = City::get();

        //Passing city data to the patient register view
        return view('patient.register',compact('cities'));
    }

    public function showLoginForm(){
        
        return view('patient.login');
    }



    public function create_patient(Request $request)
    {   

        //Validating user input fields
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:15',
            'national_id' => 'required|string|max:20',
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'password' => 'required|confirmed|min:6',  
        ]);

        //Storing data into users table
        $user = User::create([
          

            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => 3,

        ]);
        

        //Storing data into patients table
        Patient::create([
        'first_name' => $request['first_name'],
        'last_name' => $request['last_name'],
        'phone_number' => $request['phone_number'],
        'street' => $request['street'],
        'gender' => $request['gender'],
        'city_id' => $request['city'],
        'dob' => $request['dob'],
        'national_id' => $request['national_id'],
        'user_id' => $user->id,

        
        ]);
        
    
        //Return to the paient login form after the registration is done successfully
        return redirect()->route('login.form')->with('success', 'Your registration is done successfully.');

    }


}
