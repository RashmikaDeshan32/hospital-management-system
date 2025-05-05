<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function staffLoginView(){

        return view('StaffLogin');


    }
    public function login(Request $request)
    {   
       
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|max:255',
        ]);

        
    
        try {
            
          
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                
          
                if (Auth::user()->type == 1)
                {  

                    if ($user) {
                        
                        $userInfo= Patient::leftjoin('users','patients.user_id','users.id')
                        ->where('user_id', $user->id)->first();
    
                        $request->session()->put('userInfo', $userInfo);
                        return redirect("/admin/dashboard")->with('success', 'You have successfully logged in!');
                    
                            // Pass the pickup orders data to the view
                            // return view('Customer.view_pickup', compact('pickupOrdersListData'));
                        } else {
                            // Handle the case where the user is not authenticated
                            // Redirect the user to the login page or display an error message
                        }
                    
                }elseif( $user->type == 2)
                {

                
                    $userInfo= Doctor::leftJoin('users','doctors.user_id','users.id')
                    ->where('user_id', $user->id)->first();
                    
                
                    // Check if the doctor exists and their request status
                    if ($userInfo) {
                        if ($userInfo->request_status == 'approved') {
                            // Store doctor information in the session
                            $request->session()->put('userInfo', $userInfo);
                            return redirect("/doctor/dashboard")->with('success', 'You have successfully logged in!');
                        } else {
                            // Request not approved, return error message
                            return redirect()->back()->withErrors(['error' => 'Your request is still waiting for approval. Please contact the admin.']);
                        }
                    } else {
                        // Handle case where doctor info does not exist
                        return redirect()->back()->withErrors(['error' => 'Doctor information not found.']);
                    }

                }elseif($user->type == 3)
                {   
                    if ($user) {
                        
                    $userInfo= Patient::leftjoin('users','patients.user_id','users.id')
                    ->where('user_id', $user->id)->first();

                    $request->session()->put('userInfo', $userInfo);
                    return redirect("/patient/find-doctor")->with('success', 'You have successfully logged in!');
                
                        // Pass the pickup orders data to the view
                        // return view('Customer.view_pickup', compact('pickupOrdersListData'));
                    } else {
                        // Handle the case where the user is not authenticated
                        // Redirect the user to the login page or display an error message
                    }
                    

                
                }elseif($user->type == 4)
                {
                   
                    if ($user) {
                        
                        $userInfo= Patient::leftjoin('users','patients.user_id','users.id')
                        ->where('user_id', $user->id)->first();
    
                        $request->session()->put('userInfo', $userInfo);
                        return redirect("/receptionist/dashboard")->with('success', 'You have successfully logged in!');
                    
                            // Pass the pickup orders data to the view
                            // return view('Customer.view_pickup', compact('pickupOrdersListData'));
                        } else {
                            // Handle the case where the user is not authenticated
                            // Redirect the user to the login page or display an error message
                        }

                }elseif(Auth::user()->type == 5)
                {
                    // $userInfo= Patient::leftjoin('users','patients.user_id','users.id')
                    // ->where('user_id', $user->id)->first();

                    // $request->session()->put('userInfo', $userInfo);
                    // return redirect("/receptionist/dashboard")->with('success', 'You have successfully logged in!');
                
                    
                }elseif(Auth::user()->type == 6)
                {
                    
                    if ($user) {
                        
                        // $userInfo= Customer::where('user_id', $user->id)->first();
                        // $request->session()->put('userInfo', $userInfo);
                        // return redirect("/customer/dashboard")->with('success', 'You have successfully logged in!');
            
                    } else {
                        // Handle the case where the user is not authenticated
                        // Redirect the user to the login page or display an error message
                    }


                }             

            } else {
              
                return redirect()->back()->with('delete', 'Unauthorized.')->withErrors(['email' => 'Invalid email or password']);    
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('delete', 'Unauthorized.');     
        }

    }

    

    public function loginView(Request $request)
    {   
      return view ("login");  
        
    }

    public function logout(Request $request)
    {   
        Auth::logout();
        //$request->session()->pull('userInfo');
        return view("login");
    }
}
