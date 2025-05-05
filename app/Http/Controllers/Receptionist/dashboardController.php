<?php

namespace App\Http\Controllers\Receptionist;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\DoctorSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class dashboardController extends Controller
{
    public function showDashboard(){

        return view('Receptionist.dashboard');
    }

   

   
}

















