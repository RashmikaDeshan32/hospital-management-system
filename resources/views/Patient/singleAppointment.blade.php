<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/Admin/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="/Admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/Admin/assets/css/app.css">
    <link rel="shortcut icon" href="/Admin/assets/images/favicon.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet"/>

    <!-- Add jQuery (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        /* Global Styles */
body {
    background-color: #f0f2f5;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Container for the appointment card */
.appointment-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color:ghostwhite;
}

/* Appointment card styling */
.appointment-card {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
}

/* Title styling */
.appointment-card h2 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
    text-align: center;
}

/* Section styling */
.appointment-section {
    margin-bottom: 20px;
}

/* Subtitle styling */
.appointment-section h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #007bff;
}

/* Paragraph styling */
.appointment-section p {
    margin: 5px 0;
    font-size: 14px;
    color: #555;
}

/* Back button styling */
.back-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    display: block;
    margin: 0 auto;
}

.back-button:hover {
    background-color: #0056b3;
}

    </style>


</head>

<body>
<script>
    @if(Session::has('success'))
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
            };
            toastr.success("{{ Session::get('success') }}");
        });
    @endif

    
</script>
    <div id="app">
        <div id="sidebar" class="active">
         @include('Patient.sideBar')    
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Aappointments details</h3>
                            <!-- <p class="text-subtitle text-muted">For user to check they list</p> -->
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">DataTable</li> -->
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <!-- Simple Datatable -->
                        </div>
                        <div class="card-body">

    <div class="appointment-container">
        <div class="appointment-card">
            <h2>Appointment Details</h2>
            <div class="appointment-section">
                <h3>Patient Information</h3>
                <p><strong>Name:</strong>{{    $single_appointment_data->patient_first_name}} {{    $single_appointment_data->patient_last_name}}</p>
                <p><strong>Age:</strong>24</p>
                <p><strong>Gender:</strong>{{    $single_appointment_data->gender}}</p>
                <p><strong>Contact:</strong>{{    $single_appointment_data->patient_phone_number}}</p>
            </div>
            <div class="appointment-section">
                <h3>Doctor Information</h3>
                <p><strong>Name:</strong> Dr. {{    $single_appointment_data->doctor_first_name}} {{ $single_appointment_data->doctor_last_name}}</p>
                <p><strong>Speciality:</strong> {{    $single_appointment_data->type}}</p>
                <p><strong>Contact:</strong>{{    $single_appointment_data->doctor_phone_number}}</p>
            </div>
            <div class="appointment-section">
                <h3>Appointment Information</h3>
                <p><strong>Date:</strong> {{    $single_appointment_data->date}}</p>
                <p><strong>Doctor arrival time:</strong> {{    $single_appointment_data->start_time}}</p>
                <p><strong>Appointment Time:</strong> {{    $single_appointment_data->appointment_time}}</p>
                <p><strong>Appointment Number:</strong> {{    $single_appointment_data->appoinment_number}}</p>
                <p style="color:red"><strong>Status:</strong>{{    $single_appointment_data->status}}</p>
            </div>
            <div class="appointment-section">
                <h3>Appointment charge</h3>
                <p><strong>Rs :</strong> {{    $single_appointment_data->amount}}</p>
            </div>
        </div>
    </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>


    <script src="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/Admin/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/Admin/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="/Admin/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</body>

</html>