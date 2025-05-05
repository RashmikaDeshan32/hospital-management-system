<?php

namespace App\Http\Controllers\Doctor;
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
    public function showRegisterForm(){

        $cities = City::get();
        $specialities = Speciality::get();

        return view('Doctor.register',compact('cities','specialities'));
    }


    

    public function create_doctor(Request $request)
    {   


        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialty' => 'required|exists:speciality,id',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:10',
            'national_id' => 'required|string|regex:/^\d{12}$/',
            'gender' => 'required|string',
            'city' => 'required|exists:cities,id',
            'street' => 'required|string|max:255',
            'qualification' => 'required|array',
            'qualification.*' => 'required|string|max:255', // Validation for qualifications
            'bio' => 'required|string',
            'consultation_fee' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);



     
                // Handle the file upload
        if ($request->hasFile('profile_picture')) {
            $filename = time() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            
            // Move the uploaded file to the public directory
            $request->file('profile_picture')->move(public_path('profile_pictures'), $filename);
        }



        $user = User::create([
          

            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => 2,

        ]);
        
        $doctor = Doctor::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'speciality_id' => $validated['specialty'],
            'phone_number' => $validated['phone_number'],
            'national_id' => $validated['national_id'],
            'gender' => $validated['gender'],
            'city_id' => $validated['city'],
            'street' => $validated['street'],
            'bio' => $validated['bio'],
            'consultation_fee' => $validated['consultation_fee'],
            'profile_picture' => $filename,
            'request_status'=>'waiting for approval',
            'user_id' => $user->id
            
        ]);

         // Store qualifications
        foreach ($validated['qualification'] as $qualification) {
        DoctorQualification::create([
            'doctor_id' => $doctor->doctor_id,
            'qualification' => $qualification,
        ]);
    }
        
    
        return redirect()->route('login.form')->with('success', 'Your registration is done successfully.');

    }

   
}
