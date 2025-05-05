<?php

namespace App\Http\Controllers\Receptionist;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    public function view_pending_appointment(){

        return view('Receptionist.pendingAppointments');
    }

    public function view_completed_appointment(){

        return view('Receptionist.completedAppointments');
    }

   

   
}

















