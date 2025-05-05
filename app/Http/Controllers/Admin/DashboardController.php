<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use App\Notifications\DoctorNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function showDashboard(){

      

        $total__pending_appointments= Appointment::where('status','pending')->count();
        $total_completed_appointments= Appointment::where('status','completed')->count();
        $total_cancelled_appointments= Appointment::where('status','cancelled')->count();
        $total_pending_doctor_requests= Doctor::where('request_status','waiting for approval')->count();
        $total_approved_doctor_requests= Doctor::where('request_status','approved')->count();
        $total_patients= Patient::count();
        $total_doctors= Doctor::count();
        $total_appointments= Appointment::count();
        


        $appointments = Appointment::select(
            'speciality.type as department',
            DB::raw('count(appointments.id) as total_appointments')
        )
        ->leftJoin('doctors', 'appointments.doctor_id', '=', 'doctors.doctor_id')
        ->leftJoin('speciality', 'doctors.speciality_id', '=', 'speciality.id')
        ->groupBy('speciality.type')
        ->orderBy('total_appointments', 'desc')
        ->get();


        return view('Admin.dashboard',[
            'total__pending_appointments' =>  $total__pending_appointments,
            'total_completed_appointments' =>  $total_completed_appointments,
            'total_cancelled_appointments' =>   $total_cancelled_appointments,
            'total_pending_doctor_requests' =>  $total_pending_doctor_requests,
            'total_approved_doctor_requests' =>  $total_approved_doctor_requests,
            'total_patients' =>  $total_patients,
            'total_doctors' =>  $total_doctors,
            'total_appointments' => $total_appointments,
            'appointmentsData' => $appointments->toArray()


        ]);
    }

    public function doctor_request_view(){


        $doctors = User::leftJoin('doctors', 'users.id', '=', 'doctors.user_id')
        ->select('users.*', 'doctors.*')
        ->where('doctors.request_status', 'waiting for approval')
       
        ->where('users.type', '2') // Only fetching users with type '2' (doctors)
        // Filtering by request status
      

        ->get();



        return view('Admin.doctorRequest',compact('doctors'));
    }

    public function single_doctor_request_view($doctor_id){


        $doctor = User::leftJoin('doctors', 'users.id', '=', 'doctors.user_id')
        ->leftJoin('speciality', 'doctors.speciality_id', '=', 'speciality.id')
        ->leftJoin('cities', 'doctors.city_id', '=', 'cities.id')
        ->where('doctors.doctor_id', $doctor_id)
        ->select(
        
            'users.*', 
            'doctors.*', 
            
        
            'speciality.*', 
            'cities.*',
            
            // Subquery to fetch qualifications
            DB::raw("(SELECT GROUP_CONCAT(DISTINCT doctor_qualifications.qualification SEPARATOR ', ')
                    FROM doctor_qualifications
                    WHERE doctor_qualifications.doctor_id = doctors.doctor_id
                    ) as qualifications")
        )
        ->first();

    

        if ($doctor) {
            return response()->json($doctor);
        } else {
            return response()->json(['error' => 'Doctor not found'], 404);
        }


       
    }

    public function doctor_request_update(Request $request ,$doctor_id){

        // Validate the request (You may customize validation rules as necessary)
        $request->validate([
            'request_status' => 'required|string',
        ]);

        // Find the doctor by user ID
        $doctor = Doctor::where('doctor_id',$doctor_id)->first();

        // Check if the doctor exists
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found.'], 404);
        }

        // Update the request status
        $doctor->request_status = $request->request_status; // In this case, it's 'approved'
        $doctor->save();


        $user = Doctor::findOrFail($doctor_id)
        ->leftJoin('users', 'doctors.user_id', '=', 'users.id')
      
        ->select('users.*', 'doctors.*')
        ->where('doctors.doctor_id', $doctor_id)
        ->first();

        
        $details = [
            'subject' => 'Doctor Request Approval - Healthlink Medical Service',
            'greeting' => 'Hello Dr. ' . $user->first_name . ' ' . $user->last_name . ',',
            'body' => "We are pleased to inform you that **your request (Request ID: " . $user->doctor_id . ")** has been **" . $user->request_status . "**. You can now proceed with your next steps in accordance with the approved request.",
            'additionalInfo' => '**Request Details:** You may find the full request details and proceed by [logging into your account](' . route('login.form') . ').',
            'lastline' => 'Thank you for being a part of **Healthlink Medical Service!**',
            'company_name' => '**Healthlink Medical Service**',
        ];
        
        
        
        Notification::send($user,new DoctorNotification($details));

        




        return response()->json(['message' => 'Request status updated successfully.']);
            
    }

    public function doctor_request_approved_view(){



        
        $doctors = User::leftJoin('doctors', 'users.id', '=', 'doctors.user_id')
        ->select('users.*', 'doctors.*')
        ->where('doctors.request_status', 'approved')
       
        ->where('users.type', '2') // Only fetching users with type '2' (doctors)
        // Filtering by request status
      

        ->get();
        return view('Admin.ApprovedRequest',compact('doctors'));
    }










    
   
}
