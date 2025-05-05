<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Cash Payments</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/Admin/assets/css/app.css">
    <link rel="shortcut icon" href="/Admin/assets/images/favicon.svg" type="image/x-icon">
        <!-- jQuery (add this if it's not already included) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


      

</head>
<body>



<div id="app">
@include('receptionist.sideBar')
    <div id="main">
        <header class="mb-3">
            @include('receptionist.header')
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>All Pending Cash Payments</h3>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <!-- Simple Datatable -->
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Doctor Name</th>
                                    <th>Appointment date</th>
                                    <th>Appointment id</th>
                                    <th>Patient Phone number</th>
                                    <th>Payment Status</th>
                                    <th>Appointment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment_data as $data)
                                <tr>
                                    <td>{{ $data->patient_first_name }} {{ $data->patient_last_name }}</td>
                                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->patient_phone_number }}</td>
                                    <td style="color:red">{{ $data->payment_status }}</td>
                                    <td style="color:red">{{ $data->appointment_status }}</td>
                                    <td>
                                        <button class="btn icon btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $data->appointment_id }}">View</button>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="viewModal{{ $data->appointment_id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $data->appointment_id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel{{ $data->appointment_id }}">Appointment Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <!-- Doctor Details Section -->
                                                    <div class="col-md-4 text-center">
                                                        <img src="/profile_pictures/{{ $data->profile_picture }}" alt="Doctor Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                                        <h5>Dr. {{ $data->first_name }} {{ $data->last_name }}</h5>
                                                        <p><strong>Email:</strong> {{ $data->doctor_email }}</p>
                                                        <p><strong>Phone number:</strong> {{ $data->phone_number }}</p>
                                                        <p><strong>Speciality:</strong> {{ $data->speciality_name}}</p>
                                                        <p><strong>qualification:</strong> {{ $data->qualifications }}</p>
                                                        <p>{{ $data->bio }}</p>
                                                    </div>
                                                    <!-- Patient and Appointment Details Section -->
                                                    <div class="col-md-8">
                                                        <h6><strong>Patient Details</strong></h6>
                                                        <p><strong>Name:</strong> {{ $data->patient_first_name }} {{ $data->patient_last_name }}</p>
                                                        <p><strong>Email:</strong> {{ $data->patient_email }}</p>
                                                        <p><strong>Phone Number:</strong> {{ $data->patient_phone_number }}</p>
                                                        <p><strong>Gender:</strong> {{ ucfirst($data->patient_gender) }}</p>
                                                        <p><strong>Address:</strong> {{ $data->patient_street }}</p>

                                                        <hr>

                                                        <h6><strong>Appointment Details</strong></h6>
                                                        <p><strong>Consultation Fee:</strong> Rs. {{ $data->amount }}</p>
                                                        <p style="color:red;"><strong>Payment Status:</strong> {{ $data->payment_status }}</p>
                                                        <p><strong>Payment Type:</strong> {{ $data->payment_type }}</p>
                                                        <p style="color:red"><strong>Appointment Status:</strong> {{ $data->appointment_status }}</p>
                                                        <p><strong>Date:</strong> {{ $data->date }}</p>
                                                        <p><strong>Time:</strong> {{ $data->appointment_time }}</p>
                                                        <p><strong>Number:</strong> {{ $data->appoinment_number }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <form action="/receptionist/update-payment/{{$data->appointment_id}}" method="post">
                                                    @csrf
                                                <button type="submit" class="btn btn-primary">Update Payment Status</button>
                                            </form>
                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
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
<script>
$(document).ready(function () {
    @if(session('success'))
        console.log("Success message: {{ session('success') }}");
        toastr.success("{{ session('success') }}");
    @endif

    @if(session('error'))
        console.log("Error message: {{ session('error') }}");
        toastr.error("{{ session('error') }}");
    @endif
});


</script>
</body>
</html>
