<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\AuthController;
use App\Http\Controllers\Patient\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Patient




Route::get('/patient/booking-summary-view',[App\Http\Controllers\Patient\BookingController::class,'booking_summary_view'])->name('booking.summary');
Route::get('/patient/dashboard',[App\Http\Controllers\Patient\DashboardController::class,'showDashboard']);

//Register patient
Route::get('/patient/regiter-form',[App\Http\Controllers\Patient\AuthController::class,'showRegisterForm'])->name('patient.register.form');
Route::post('/patient/register',[App\Http\Controllers\Patient\AuthController::class,'create_patient'])->name('register.patient');



//Find doctors
Route::get('/patient/find-doctor',[App\Http\Controllers\Patient\BookingController::class,'findDoctorForm'])->name('find.doctor');
Route::post('/patient/find-doctor-result',[App\Http\Controllers\Patient\BookingController::class,'findDoctorResult'])->name('find.doctor.result');



//Display booking time slots in boxses along with doctor information
Route::get('/patient/view/booking-information-view/{doctor_id}',[App\Http\Controllers\Patient\BookingController::class,'view_booking_information'])->name('view.bookig.information');

//Display all appointment data along with patients details a
Route::post('/patient/view/booking-session',[App\Http\Controllers\Patient\BookingController::class,'booking_session'])->name('booking.session');

//Store appointment data 
Route::post('/patient/appoinment-store',[App\Http\Controllers\Patient\BookingController::class,'store_appointment'])->name('store.appointment');


Route::get('/patient/view/pending-appointments',[App\Http\Controllers\Patient\BookingController::class,'view_oppointment_list']);
Route::get('/patient/view/single-appointment/{appointment_id}',[App\Http\Controllers\Patient\BookingController::class,'view_single_aoppointment']);





//Doctor
Route::get('/doctor/regiter-form',[App\Http\Controllers\Doctor\AuthController::class,'showRegisterForm'])->name('doctor.reigter.form');
Route::get('/doctor/dashboard',[App\Http\Controllers\Doctor\DashboardController::class,'showDashboard']);


Route::post('/doctor/register',[App\Http\Controllers\Doctor\AuthController::class,'create_doctor'])->name('register.doctor');

Route::get('/doctor/add-time-schedule-view',[App\Http\Controllers\Doctor\DashboardController::class,'add_time_schedule']);
Route::post('/doctor/store/time-schedule',[App\Http\Controllers\Doctor\DashboardController::class,'store_time_schedule'])->name('store.doctor.schedule');
Route::get('/doctor/view/time-schedule',[App\Http\Controllers\Doctor\DashboardController::class,'view_time_schedule'])->name('view.doctor.schedule');



//Patient and doctor login form
Route::get('/login-form',[App\Http\Controllers\HomeController::class,'showLoginForm'])->name('login.form');
Route::post('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/logout',[App\Http\Controllers\AuthController::class,'logout'])->name('logout');

//Common
Route::get('/select-register',[App\Http\Controllers\HomeController::class,'selectRegisterForm'])->name('select.register');
Route::get('/about',[App\Http\Controllers\HomeController::class,'about'])->name('about');
Route::get('/contact-us',[App\Http\Controllers\HomeController::class,'contact'])->name('contact');





//-----------------------------------------Admin-----------------------------------------//


// Route::get('/admin/login-form',[App\Http\Controllers\Admin\AuthController::class,'showLoginForm'])->name('login.form');
Route::get('/admin/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'showDashboard']);
Route::get('/admin/doctor-request-view',[App\Http\Controllers\Admin\DashboardController::class,'doctor_request_view']);
Route::get('/admin/single-doctor-request-view/{doctor_id}',[App\Http\Controllers\Admin\DashboardController::class,'single_doctor_request_view']);
Route::post('/admin/doctor-request-update/{doctor_id}',[App\Http\Controllers\Admin\DashboardController::class,'doctor_request_update']);
Route::get('/admin/doctor-request-approved-view',[App\Http\Controllers\Admin\DashboardController::class,'doctor_request_approved_view']);



Route::get('/admin/appointments-bar-chart',[App\Http\Controllers\Admin\ChartController::class,'getAppointmentsPerSpeciality']);

//-----------------------------------------Admin-----------------------------------------//

Route::get('/receptionist/dashboard',[App\Http\Controllers\Receptionist\DashboardController::class,'showDashboard']);

Route::get('/receptionist/pending-cash',[App\Http\Controllers\Receptionist\PaymentController::class,'pending_cash_page']);

Route::get('/receptionist/completed-cash',[App\Http\Controllers\Receptionist\PaymentController::class,'completed_cash_page']);


Route::get('/receptionist/pending-appointments',[App\Http\Controllers\Receptionist\AppointmentController::class,'view_pending_appointment']);

Route::get('/receptionist/completed-appointments',[App\Http\Controllers\Receptionist\AppointmentController::class,'view_completed_appointment']);


Route::post('/receptionist/update-payment/{appointment_id}',[App\Http\Controllers\Receptionist\PaymentController::class,'update_payment_stauts']);


// Route::get('/generate/invoice',[App\Http\Controllers\Receptionist\PaymentController::class,'update_payment_stauts']);

//-----------------------------------------receptionist-----------------------------------------//




//-----------------------------------------receptionist-----------------------------------------//


//Staff loign
Route::get('/staff/login-form',[App\Http\Controllers\AuthController::class,'staffLoginView'])->name('login.form');
Route::get('/staff/logout',[App\Http\Controllers\HomeController::class,'logout'])->name('staff.logout');