<?php

namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class dashboardController extends Controller
{
    public function showDashboard(){

        return view('Doctor.dashboard');
    }

    public function add_time_schedule(){

        return view('Doctor.timeSchedule');
    }

    public function store_time_schedule(Request $request){

 
      
        // Validate the request data
        $validatedData = $request->validate([ // Ensure the doctor exists
            'date' => 'required|date',
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $user = Auth::user();

        $doctor = Doctor::where('user_id',$user->id)->first();
        // Store the schedule in the database
        $schedule = DoctorSchedule::create([
            'doctor_id' => $doctor->doctor_id,  // Assuming doctor is the logged-in user
            'date' => $validatedData['date'],
            'day' => $validatedData['day'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);


        // Redirect or return a success message
        return redirect()->back()->with('success', 'Schedule added successfully!');

    }

    public function view_time_schedule(){

        
        $user = Auth::user();
      

        $doctor_schedules = Doctor::leftjoin('doctor_schedule','doctors.doctor_id','doctor_schedule.doctor_id')
        ->where('doctors.user_id',$user->id)->get();

        return view('Doctor.manageTimeSchedule')
        ->with('doctor_schedules',$doctor_schedules);
    
    }


   
}

















