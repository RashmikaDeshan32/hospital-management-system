<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Doctor;
use App\Models\DoctorQualification;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    // public function getAppointmentsPerSpeciality(){

    //        // Fetch the number of appointments per department
    
 
    //        $appointments = Appointment::select(
    //         'speciality.type as department',
    //         DB::raw('count(appointments.id) as total_appointments')
    //     )
    //     ->leftJoin('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
    //     ->leftJoin('speciality', 'doctors.speciality_id', '=', 'speciality.id')
    //     ->groupBy('speciality.type')
    //     ->orderBy('total_appointments', 'desc')
    //     ->get();


    //     dd(           $appointments );

    //     return view('Admin.dashboard', [
    //         'appointmentsData' => $appointments->toArray()
    //     ]);



    // }


   
}
