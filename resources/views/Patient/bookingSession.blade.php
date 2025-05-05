<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Session</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
        }
        .channel-details {
            background-color: #2d5b58;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .channel-details h5 {
            margin-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .channel-details p {
            margin-bottom: 10px;
        }
        .patient-details {
            border: 2px solid #2d5b58;
            padding: 20px;
            border-radius: 10px;
        }
        .patient-details h3 {
            font-weight: bold;
            color: yellow;
            margin-bottom: 20px;
        }
        .patient-details label {
            font-weight: bold;
        }
        .btn-submit {
            background-color:darkgreen;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .btn-submit:hover {
            background-color:limegreen;
        }
        /* General styling for input, select, and textarea */
        input[type="text"], input[type="email"], input[type="number"], select, textarea {
            border: 1px solid #ced4da; /* Ensure border is always visible */
            padding: 8px;
            border-radius: 4px;
            transition: border-color 0.3s ease;
            outline: none; /* Remove default browser outline */
        }

        /* Add focus state to ensure the border stays on focus */
        input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus, 
        select:focus, textarea:focus {
            border-color: #80bdff; /* Border color when focused */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25); /* Optional shadow */
            outline: none;
        }

        /* Ensure that all input fields, when clicked, don't lose the border */
        input[type="text"]:active, input[type="email"]:active, input[type="number"]:active, 
        select:active, textarea:active {
            border-color: #80bdff; /* Active state border color */
            outline: none;
        }

    </style>
</head>
<body>
@include('header')

    <div class="container mt-5">
        <div class="row">
            <!-- Channel Details -->
            <div class="col-md-4">
                <div class="channel-details">
                    <h5>Channel Details</h5>
                    <p><strong>Doctor Name:</strong>{{$doctor_data->first_name}} {{$doctor_data->last_name}}</p>
                    <p><strong>Specialization:</strong>{{$doctor_data->type}}</p>
                    <p><strong>Appointment Date:</strong>{{$appointment_date}}</p>
                    <p><strong>Appointment Time:</strong>{{$appointment_time}}</p>
                    <p><strong>Appointment No:</strong>{{$appointment_number}}</p>
                    <!-- <p><strong>Doctor Notes:</strong></p> -->
                </div>
            </div>

            <!-- Patient Details -->
            <div class="col-md-8">
                <div class="patient-details">
                    <h3>Patient Details</h3>
                    <form action="{{ route('store.appointment')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="title">Title</label>
                                <select id="title" class="form-control">
                                    <option>Mr</option>
                                    <option>Ms</option>
                                    <option>Mrs</option>
                                </select>
                            </div>
                            <div class="form-group col-md-10">
                                <label for="name">Patient Name (Mandatory)</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Patient Name" value="{{$patient_data->first_name}} {{$patient_data->last_name}}">


                                <input type="hidden" class="form-control"  name="patient_id" value="{{$patient_data->patient_id}}">
                                <input type="hidden" class="form-control"  name="doctor_id" value="{{$doctor_data->doctor_id}}">
                                <input type="hidden" class="form-control"  name="appoinment_time" value="{{$appointment_time}}">
                                <input type="hidden" class="form-control"  name="appoinment_date" value="{{$appointment_date}}">
                                <input type="hidden" class="form-control"  name="appoinment_number" value="{{$appointment_number}}">
                                <input type="hidden" class="form-control"  name="appointment_id" value="{{$appointment_id}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nationality</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="nationality" id="sriLankan" value="Sri Lankan" checked>
                                    <label class="form-check-label" for="sriLankan">Sri Lankan</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="nationality" id="foreign" value="Foreign">
                                    <label class="form-check-label" for="foreign">Foreign</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nationalId">National ID No. (Mandatory for Sri Lankans)</label>
                            <input type="text" class="form-control" id="nationalId" placeholder="Enter National ID No." value="{{$patient_data->national_id}}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number (Mandatory)</label>
                            <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number (0XXXXXXXXX)" value="{{$patient_data->phone_number}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email for the receipt" value="{{$patient_data->email}}"> 
                        </div>

                        <div class="form-group">
                            <label for="payment">Choose Your Payment Method</label>
                            <select id="payment" class="form-control" name="payment_type">
                                <option value="cash">Cash</option>
                                <option value="card">Card</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
