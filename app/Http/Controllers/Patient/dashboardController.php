<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function showDashboard(){

        $user = Auth::user();

       $total_appointments= User::leftJoin('patients','users.id','patients.user_id')
       ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
       ->where('user_id',$user->id)->count();


       $pending_appointments= User::leftJoin('patients','users.id','patients.user_id')
       ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
       ->where('appointments.status','pending')
       ->where('user_id',$user->id)->count();
       
        $completed_appointments= User::leftJoin('patients','users.id','patients.user_id')
        ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
        ->where('appointments.status','completed')
       ->where('user_id',$user->id)->count();
       
       $cancelled_appointments= User::leftJoin('patients','users.id','patients.user_id')
       ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
       ->where('appointments.status','cancelled')
       ->where('user_id',$user->id)->count();

        return view('Patient.dashboard',compact('total_appointments','pending_appointments','completed_appointments','cancelled_appointments'));
    }

   
}
