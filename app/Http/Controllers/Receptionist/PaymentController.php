<?php

namespace App\Http\Controllers\Receptionist;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Payment;
use App\Models\DoctorSchedule;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB; 
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PatientNotification;


class PaymentController extends Controller
{
    public function pending_cash_page(){


        $appointment_data = Appointment::leftJoin('patients', 'appointments.patient_id', 'patients.patient_id')
    ->leftJoin('doctors', 'appointments.doctor_id', 'doctors.doctor_id')
    ->leftJoin('doctor_schedule', 'appointments.schedule_id', 'doctor_schedule.id')
    ->leftJoin('users as user_doctor', 'doctors.user_id', 'user_doctor.id')
    ->leftJoin('users as user_patient', 'patients.user_id', 'user_patient.id')
    ->leftJoin('payments', 'appointments.id', 'payments.appointment_id')
    ->leftJoin('speciality', 'doctors.speciality_id', 'speciality.id')
    ->leftJoin('doctor_qualifications', 'doctors.doctor_id', 'doctor_qualifications.doctor_id')
    
    ->select(
        'user_patient.email as patient_email',
        'user_doctor.email as doctor_email',
        'patients.first_name as patient_first_name',
        'patients.last_name as patient_last_name',
        'patients.phone_number as patient_phone_number',
        'patients.street as patient_street',
        'patients.gender as patient_gender',
        'doctors.doctor_id',
        'doctors.first_name',
        'doctors.last_name',
        'doctors.phone_number',
        'doctors.national_id',
        'doctors.gender',
        'doctors.street',
        'doctors.profile_picture',
        'appointments.id as appointment_id',
        'appointments.appoinment_number',
        'appointments.appointment_time',
        'appointments.status as appointment_status',
        'payments.payment_status',
        'payments.payment_type',
        'payments.amount',
        'doctor_schedule.date',
        'speciality.type as speciality_name',
        'appointments.id',
        
        DB::raw("GROUP_CONCAT(doctor_qualifications.qualification SEPARATOR ', ') as qualifications")
    )
    ->where('payments.payment_status', 'pending')
    ->groupBy(
        'appointments.id',
        'user_patient.email',
        'user_doctor.email',
        'patients.first_name',
        'patients.last_name',
        'patients.phone_number',
        'patients.street',
        'patients.gender',
        'doctors.doctor_id',
        'doctors.first_name',
        'doctors.last_name',
        'doctors.phone_number',
        'doctors.national_id',
        'doctors.gender',
        'doctors.street',
        'appointments.appoinment_number',
        'appointments.status',
        'payments.payment_status',
        'doctor_schedule.date',
        'speciality.type',
        'doctors.profile_picture',
        'payments.payment_type',
        'payments.amount',
        'appointments.appointment_time',
        'appointments.id',
    )
    ->get();

    
        return view('Receptionist.pendingCash',[
            'appointment_data' => $appointment_data 
        ]);
    }

    public function completed_cash_page(){



        $appointment_data = Appointment::leftJoin('patients', 'appointments.patient_id', 'patients.patient_id')
        ->leftJoin('doctors', 'appointments.doctor_id', 'doctors.doctor_id')
        ->leftJoin('doctor_schedule', 'appointments.schedule_id', 'doctor_schedule.id')
        ->leftJoin('users as user_doctor', 'doctors.user_id', 'user_doctor.id')
        ->leftJoin('users as user_patient', 'patients.user_id', 'user_patient.id')
        ->leftJoin('payments', 'appointments.id', 'payments.appointment_id')
        ->leftJoin('speciality', 'doctors.speciality_id', 'speciality.id')
        ->leftJoin('doctor_qualifications', 'doctors.doctor_id', 'doctor_qualifications.doctor_id')
    
        ->select(
            'user_patient.email as patient_email',
            'user_doctor.email as doctor_email',
            'patients.first_name as patient_first_name',
            'patients.last_name as patient_last_name',
            'patients.phone_number as patient_phone_number',
            'patients.street as patient_street',
            'patients.gender as patient_gender',
            'doctors.doctor_id',
            'doctors.first_name',
            'doctors.last_name',
            'doctors.phone_number',
            'doctors.national_id',
            'doctors.gender',
            'doctors.street',
            'doctors.profile_picture',
            'appointments.id as appointment_id',
            'appointments.appoinment_number',
            'appointments.appointment_time',
            'appointments.status as appointment_status',
            'payments.payment_status',
            'payments.payment_type',
            'payments.amount',
            'doctor_schedule.date',
            'speciality.type as speciality_name',
            'appointments.id',
            
            DB::raw("GROUP_CONCAT(doctor_qualifications.qualification SEPARATOR ', ') as qualifications")
        )
        ->where('payments.payment_status', 'paid')
        ->groupBy(
            'appointments.id',
            'user_patient.email',
            'user_doctor.email',
            'patients.first_name',
            'patients.last_name',
            'patients.phone_number',
            'patients.street',
            'patients.gender',
            'doctors.doctor_id',
            'doctors.first_name',
            'doctors.last_name',
            'doctors.phone_number',
            'doctors.national_id',
            'doctors.gender',
            'doctors.street',
            'appointments.appoinment_number',
            'appointments.status',
            'payments.payment_status',
            'doctor_schedule.date',
            'speciality.type',
            'doctors.profile_picture',
            'payments.payment_type',
            'payments.amount',
            'appointments.appointment_time',
            'appointments.id',
        )
        ->get();

        return view('Receptionist.completedCash',[
            'appointment_data' => $appointment_data 
        ]);
    }

    public function update_payment_stauts($appointment_id){


       $payment = Payment::where('appointment_id',$appointment_id)->first();


        if ($payment) {
            
            // Update the payment status
            $payment->payment_status = 'paid'; 
            $payment->save();

            $appointment_data = Appointment::leftJoin('patients', 'appointments.patient_id', 'patients.patient_id')
            ->leftJoin('doctors', 'appointments.doctor_id', 'doctors.doctor_id')
            ->leftJoin('doctor_schedule', 'appointments.schedule_id', 'doctor_schedule.id')
            ->leftJoin('users as user_doctor', 'doctors.user_id', 'user_doctor.id')
            ->leftJoin('users as user_patient', 'patients.user_id', 'user_patient.id')
            ->leftJoin('payments', 'appointments.id', 'payments.appointment_id')
            ->leftJoin('speciality', 'doctors.speciality_id', 'speciality.id')
            ->leftJoin('doctor_qualifications', 'doctors.doctor_id', 'doctor_qualifications.doctor_id')
            ->where('payments.appointment_id', $appointment_id)
            ->select(
                'user_patient.email as patient_email',
                'user_doctor.email as doctor_email',
                'patients.first_name as patient_first_name',
                'patients.last_name as patient_last_name',
                'patients.phone_number as patient_phone_number',
                'patients.street as patient_street',
                'patients.gender as patient_gender',
                'doctors.*',
                'appointments.id as appointment_id',
                'appointments.appoinment_number',
                'appointments.appointment_time',
                'appointments.status as appointment_status',
                'payments.payment_id',
                'payments.payment_status',
                'payments.payment_type',
                'payments.amount',
                'doctor_schedule.date',
                'speciality.type as speciality_name',
               
            )->first();

        
            $service_charge = 500;
            $data = array_merge($appointment_data->toArray(), ['service_charge' => $service_charge]);

            $pdf = PDF::loadView('Patient.invoice', $data);


            $user = Auth()->user();
                
            $user = Patient::leftJoin('users', 'patients.user_id', '=', 'users.id')
            ->leftJoin('appointments','patients.patient_id','appointments.patient_id')
            ->select('users.*', 'patients.*','appointments.*')
            ->where('appointments.id',   $appointment_id)
            ->first();

  

        
            $details = [
                'subject' => 'Payment Confirmation - Healthlink Medical Service',
                'greeting' => 'Dear ' . $user->first_name . ' ' . $user->last_name . ',',
                'body' => "We are pleased to confirm that your payment (Transaction ID: " .  $appointment_data->payment_id . ") of **Rs. " . number_format( $appointment_data->amount, 2) . "** has been successfully processed. Please find the attached invoice for your records.",
                'lastline' => 'Thank you for choosing **Healthlink Medical Service**!',
                'company_name' => '**Healthlink Medical Service**',
            ];
            
        
        
            Notification::send($user, new PatientNotification($details, $pdf->output()));

            // return $pdf->download('tutsmake.pdf');

            return redirect()->back()->with('success','payment status has been updated sucessfully.');
        } else {
            return redirect()->back()-with('error','payment not found.');
        }


        
        


    




    }

    public function generateInvoice()
    {
        $data = [
            // Patient Details (Static)
            'patient_name' => 'John Doe', // Static value
            'patient_address' => '456 Patient St, Cityville, Country', // Static value
            'patient_phone' => '+1234567890', // Static value
            'patient_email' => 'johndoe@example.com', // Static value
        
            // Doctor Details (Static)
            'doctor_name' => 'Dr. Jane Smith', // Static value
        
            // Appointment Details (Static)
            'appointment_date' => '2024-10-15', // Static value
        
            // Invoice Details (Static)
            'invoice_number' => 'INV-2024-001', // Static value
            'consultation_fee' => 100.00, // Static value
            'medication_fee' => 20.00, // Static value
            'service_charge' => 10.00, // Static value
            'total_amount' => 130.00, // Static value
        
            // Payer Information (Static)
            'payer_name' => 'Jane Doe', // Static value
            'payer_relationship' => 'Spouse', // Static value
        
            // Hospital Account Details (Static)
            'hospital_account_name' => 'Healthlink Hospital Account', // Static value
            'hospital_account_number' => '123456789', // Static value
            'hospital_bank_name' => 'Wellness Bank', // Static value
        
            // Hospital Details (Static)
            'hospital_name' => 'Healthlink Hospital', // Static value
            'hospital_address' => '123 Health St, Wellness City, Country', // Static value
        ];
        
        // Generate the PDF
        $pdf = Pdf::loadView('Patient.invoice', $data);

        // Return the generated PDF for download
        return $pdf->download('invoice.pdf');
    }
   
   

   
}

















