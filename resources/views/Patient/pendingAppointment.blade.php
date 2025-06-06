<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peinding appointment list</title>

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
                            <h3>All pending appointments</h3>
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
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Patient Phone number</th>
                                        <th>appointment date</th>
                                        <th>appointment time</th>
                                        <th>appointment number</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_appointment_data  as $pending_appointment)
                                    <tr>
                                        <td>{{$pending_appointment->first_name}} {{$pending_appointment->last_name}}</td>
                                  
                                        <td>{{$pending_appointment->phone_number}}</td>
                                        <td>{{$pending_appointment->date}}</td>
                                        <td>{{$pending_appointment->appointment_time}}</td>
                                        <td style="color:green">{{$pending_appointment->appoinment_number}}</td>
                                        <td style="color: red;">{{$pending_appointment->status}}</td>
                              
                                        <td>
                                        <a href="/patient/view/single-appointment/{{$pending_appointment->appoinment_number}}" 
                                        class="btn icon icon-left btn-info view-doctor">
                                        <i data-feather="info"></i> View
                                        </a>
                                        <a href="#" class="btn icon btn-danger"><i data-feather="times"></i>Cancel</a>
                                    </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
    <script>
       
$(document).ready(function() {
    $('#approveStatusButton').on('click', function() {
        var doctorId = $(this).data('doctor-id');

        // Send AJAX request to update the request status
        $.ajax({
            url: '/admin/doctor-request-update/' + doctorId, // Adjust the URL based on your route
            type: 'post', // Use PUT for updating
            data: {
                request_status: 'approved', // The new status
                _token: '{{ csrf_token() }}' // CSRF token for security
            },
            success: function(response) {
                // Display a success toast message
                toastr.success('Request approved successfully!', 'Success');
                // Refresh the page after a short delay
                setTimeout(function() {
                    window.location.reload(); // Reload the current page
                }, 1000); // 1000 milliseconds = 1 second delay
            },
            error: function(xhr) {
                // Display an error toast message
                toastr.error('Error approving request: ' + xhr.responseJSON.message, 'Error');
            }
        });
    });
});
    </script>

    
</body>

</html>