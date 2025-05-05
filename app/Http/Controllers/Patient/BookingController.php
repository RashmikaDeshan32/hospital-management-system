<?php

namespace App\Http\Controllers\Patient;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use App\Models\DoctorSchedule;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\Specificity;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function findDoctorForm(){
        
        $Specilities = Speciality::get();

        return view('patient.findDoctor',compact('Specilities'));
    }


    //Find doctors
    public function findDoctorResult(Request $request)
    {
        $name = $request->input('name');
        $specialty = $request->input('specialty');
        $date = $request->input('date');
    
        // Start the query on the doctors table
        $query = DB::table('doctors')
            ->leftJoin('speciality', 'doctors.speciality_id', '=', 'speciality.id')
            ->select(
                'doctors.doctor_id', // Ensure the id is selected
                'doctors.first_name', 
                'doctors.last_name',
                'speciality.type as specialty', 
                'doctors.profile_picture'
            );
    
        // Apply filters if any
        if (!empty($name)) {
            $query->where(function ($q) use ($name) {
                $q->where('doctors.first_name', 'LIKE', '%' . $name . '%')
                  ->orWhere('doctors.last_name', 'LIKE', '%' . $name . '%');
            });
        }
    
        if (!empty($specialty)) {
            $query->where('speciality.id', $specialty);
        }
    
        if (!empty($date)) {
            $query->leftJoin('doctor_schedule', 'doctors.doctor_id', '=', 'doctor_schedule.doctor_id')
                ->addSelect('doctor_schedule.date')
                ->where('doctor_schedule.date', $date);
        }
    
        // Fetch the filtered or unfiltered doctors
        //$doctors variable contains an array of associative arrays
        $doctors = $query->get();
    
        // If no doctors are found, return a message with an empty list
        if ($doctors->isEmpty()) {
            return response()->json(['doctors' => [], 'message' => 'No doctors found']);
        }
    
        // Return the data in JSON format
        return response()->json(['doctors' => $doctors]);
    }




    public function view_booking_information($doctor_id){
       
        $doctor = Doctor::findOrFail($doctor_id);

        // Fetch schedule with appointment count
        $schedules = DB::table('doctor_schedule')
        ->select('doctor_schedule.id', 'doctor_schedule.date', DB::raw('COUNT(appointments.id) as appointment_count'))
        ->leftJoin('appointments', 'doctor_schedule.id', '=', 'appointments.schedule_id')
        
        ->where('doctor_schedule.doctor_id', $doctor_id)
        ->groupBy('doctor_schedule.id', 'doctor_schedule.date') 
        ->get();
    
    
        // Fetch qualifications
        $qualifications = DB::table('doctor_qualifications')
            ->where('doctor_id', $doctor_id)
            ->get();
        // Fetch speciality
        $speciality = DB::table('doctors')->leftJoin('speciality', 'doctors.speciality_id','=','speciality.id')
            ->where('doctor_id', $doctor_id)
            ->first();

        $doctor_email = DB::table('doctors')->leftJoin('users', 'doctors.user_id','=','users.id')
            ->where('doctor_id', $doctor_id)
            ->first();
        
    
        return view('Patient.viewBookingInfo', 
        compact('doctor','schedules','qualifications','speciality','doctor_email',));

       
        
    }

    public function booking_session(Request $request){

        
       
        if (Auth::check()) {

            $user = Auth::user(); 
            $request->validate([
                'doctor_id' => 'required|integer',
                'schedule_date' => 'required|date'
            ]);
    
            $doctor_id = $request->doctor_id;
            $patient_id = $request->patient_id;
            
            //Select a one date as the schedule date
            $selected_date = $request->schedule_date;

            $appointment_id = $request->appointment_id;
    
             // Determine the day of the week (e.g.,'Sunday','Monday')
             $day_of_week = Carbon::parse($selected_date)->format('l');
    
             $doctor_schedule = DoctorSchedule::where('doctor_id', $doctor_id)
            
             ->where('day', $day_of_week)
             ->first();

       
    
    
             if (!$doctor_schedule) {
                return response()->json(['error' => 'Doctor does not have a schedule for the selected day.'], 400);
            }
    
           
            // Doctor's schedule time frame
            $start_time = $doctor_schedule->start_time;  // e.g., '08:00:00'
            $end_time = $doctor_schedule->end_time;      // e.g., '10:00:00'

            $interval = 5; // 5-minute interval

            // Fetch appointments for the selected date based on the schedule ID
            $appointments = Appointment::leftJoin('doctor_schedule', 'appointments.schedule_id', '=', 'doctor_schedule.id')
            ->where('doctor_schedule.doctor_id', $doctor_id)
            ->whereDate('doctor_schedule.date', $selected_date)

            ->orderBy('appointments.appointment_time', 'asc')
            ->get(['appointments.*']); // Select appointments columns

        
    
                // Determine next available appointment number
                $appointment_count = $appointments->count();


                $next_appointment_number = $appointment_count + 1;
            
    
    
             // Determine the next available time slot
            if ($appointment_count > 0) {
                // Get the last appointment's time
                $last_appointment = $appointments->last();

                //This represents the time of the last appointment.appointments time is a string data type.last time is the carban object
                $last_time = Carbon::parse($last_appointment->appointment_time);
            
                // Calculate the next available time
                $next_time = $last_time->addMinutes($interval);
    
              
            } else {
                // If no appointments exist, start from the doctor's start time
                $next_time = Carbon::parse("$selected_date $start_time");
            }
    
            // Check if the next time is within the doctor's working hours
            if ($next_time->toTimeString() > $end_time) {
                return response()->json(['error' => 'No available time slots for this day.'], 400);
            }
    
            $appointment_date = $next_time->toDateString();  // Get only the date (YYYY-MM-DD)// Output: "2024-07-05" (assuming today is July 5th, 2024)
    
            $appointment_time = $next_time->toTimeString();  // Get only the time (HH:MM:SS)  // Output: "15:30:00" (assuming current time is 3:30 PM)
    
    
            $doctor_data = Doctor::leftjoin('speciality','doctors.speciality_id','speciality.id')->where('doctor_id',$doctor_id)->first();
    
            $user = Auth()->user();
            $patient_data = Patient::leftjoin('users','patients.user_id','users.id')->where('user_id',$user->id)->first();
            
    
            
            return view('patient.bookingSession',[
                'doctor_id' => $doctor_id,
                'patient_id' => $patient_id,
                'appointment_date' =>    $selected_date,
                'appointment_time' => $appointment_time,
                'appointment_number' => $next_appointment_number,
                'status' => 'Pending',
                'doctor_data' => $doctor_data ,
                'patient_data' => $patient_data, 
                'appointment_id' =>   $appointment_id,
            ]);


           
        } else {

            return redirect()->route('login.form'); // Redirect if not authenticated
        }
        
      
    }


    public function store_appointment(Request $request){




    // // Parse the appointment date
    $appointment_date = Carbon::parse($request->appoinment_date)->format('Y-m-d');



    // Check if the doctor has a schedule on the given date
    $date = DoctorSchedule::where('date',$appointment_date )
            ->where('doctor_id', $request->doctor_id) // If you want to fetch based on both date and doctor
            ->first(); // Get the first record
  



    // Handle case where no schedule is found
    if (!$date) {
        return redirect()->back()->with('error', 'No schedule found for the selected date.');
    }

    // Prepare appointment time
        $appointmentTime = Carbon::parse($request->appoinment_time)->format('H:i:s');

        // Store the appointment data in the database
        $appointment = Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'schedule_id' => $date->id,
            'appointment_time' => $appointmentTime,
            'appoinment_number' => $request->appoinment_number,
            'status' => 'pending',
        ]);

      

        $user = Auth()->user();

        $doctor_data = User::leftJoin('patients','users.id','patients.user_id')
        ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
        ->leftJoin('doctors','appointments.doctor_id','doctors.doctor_id')
        ->where('patients.user_id',$user->id)->first();

        $service_charge = 500;
        $total_charge = $doctor_data->consultation_fee + $service_charge;

        Payment::create([

            'amount' =>   $total_charge,
            'payment_status' => 'pending',
            'payment_type' => $request->payment_type,
            'appointment_id' =>  $appointment->id,

        ]);



        $booking_data = User::leftJoin('patients', 'users.id', 'patients.user_id')
        ->leftJoin('appointments', 'patients.patient_id', 'appointments.patient_id')
        ->leftJoin('doctors', 'appointments.doctor_id', 'doctors.doctor_id')
        ->leftJoin('speciality', 'doctors.speciality_id', 'speciality.id')
        ->leftJoin('doctor_schedule','appointments.schedule_id','doctor_schedule.id')
        ->leftJoin('payments', 'appointments.id', 'payments.appointment_id')
        ->select(
            'doctors.first_name as doctor_first_name',
            'doctors.last_name as doctor_last_name',
            'patients.first_name as patient_first_name',
            'patients.last_name as patient_last_name',
            'patients.phone_number as patient_phone_number',
            'doctors.phone_number  as doctor_phone_number',
            'speciality.type as specialition',
            'appointments.*',
            'doctor_schedule.*',
            'doctors.*',
            'users.*',
            'payments.*'
        
        )

        // ->where('patients.user_id',$user->id)
        ->where('patients.user_id',$user->id)
        ->where('appointments.id', $appointment->id) // Add this condition
        ->first();
        
   

        return view('Patient.bookingsummary',compact('booking_data'))->with('success', 'Booking confirmed!');

    // return redirect()->route('booking.summary')->with('success', 'Booking confirmed!');
    
    }
    
    public function booking_summary_view(){


        $user = Auth()->user();

        $booking_data = User::leftJoin('patients', 'users.id', 'patients.user_id')
        ->leftJoin('appointments', 'patients.patient_id', 'appointments.patient_id')
        ->leftJoin('doctors', 'appointments.doctor_id', 'doctors.doctor_id')
        ->leftJoin('speciality', 'doctors.speciality_id', 'speciality.id')
        ->leftJoin('doctor_schedule','appointments.schedule_id','doctor_schedule.id')
        ->select(
            'doctors.first_name as doctor_first_name',
            'doctors.last_name as doctor_last_name',
            'patients.first_name as patient_first_name',
            'patients.last_name as patient_last_name',
            'patients.phone_number as patient_phone_number',
            'doctors.phone_number  as doctor_phone_number',
            'speciality.type as specialition',
            'appointments.*',
            'doctor_schedule.*',
            'doctors.*',
            'users.*'
        )
        ->where('patients.user_id',$user->id)
        ->first();
    


     

        return view('patient.bookingSummary',compact('booking_data'));


    }


    public function view_oppointment_list(){


        $user = Auth()->user();


        $pending_appointment_data = User::leftJoin('patients','users.id','patients.user_id')
        ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
        ->leftJoin('doctor_schedule','appointments.schedule_id','doctor_schedule.id')
        ->where('patients.user_id',$user->id)
        ->where('status','pending')->get();

 
        return view('Patient.pendingAppointment',[
            'pending_appointment_data' =>  $pending_appointment_data,
        ]);
    }


    
    public function view_single_aoppointment($appointment_id){


        $user = Auth()->user();


       $single_appointment_data  = User::leftJoin('patients','users.id','patients.user_id')
        ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
        ->leftJoin('doctors','appointments.doctor_id','doctors.doctor_id')
        ->leftJoin('speciality','doctors.speciality_id','speciality.id')
        ->leftJoin('doctor_schedule','appointments.schedule_id','doctor_schedule.id')
        ->leftJoin('payments','appointments.id','payments.appointment_id')
        ->select(
            'patients.first_name as patient_first_name',
            'patients.last_name as patient_last_name',
            'patients.phone_number as patient_phone_number',
            'doctors.first_name as doctor_first_name ',
            'doctors.last_name  as doctor_last_name',
            'doctors.phone_number as doctor_phone_number',
            'patients.*',
            'doctors.*',
            'appointments.*',
            'speciality.*',
            'doctor_schedule.*',
            'payments.*',
        )
        ->where('patients.user_id',$user->id)
        ->where('appointments.appoinment_number',$appointment_id)->first();

        return view('Patient.singleAppointment',compact('single_appointment_data'));
    }


}
