<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor request</title>

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
         @include('Admin.SiderBar')    
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
                            <h3>Doctor pending requests</h3>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{$doctor->first_name}} {{$doctor->last_name}}</td>
                                        <td>{{$doctor->email}}</td>
                                        <td>{{$doctor->phone_number}}</td>
                                        <td style="color: red;">{{$doctor->request_status}}</td>
                                        <td>
                                        <td>
                                        <a href="#" 
                                        class="btn icon icon-left btn-info view-doctor" 
                                        data-doctor-id="{{$doctor->doctor_id}}">
                                        <i data-feather="info"></i> View
                                        </a>
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
    <!-- Doctor Detail Modal -->
    <div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="doctorModalLabel">Doctor Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Personal Details Section -->
                    <div class="col-md-6 personal-details text-center mb-4">
                        <img id="doctorProfilePicture" src="" alt="Profile Picture" style="width: 100px; height: auto; border-radius: 50%;">
                        <h5 id="doctorName"></h5>
                        <p><strong>Email:</strong> <span id="doctorEmail"></span></p>
                        <p><strong>Phone:</strong> <span id="doctorPhone"></span></p>
                        <p><strong>National ID:</strong> <span id="doctorNationalID"></span></p>
                        <p><strong>DOB:</strong> <span id="doctorDOB"></span></p>
                        <p><strong>Gender:</strong> <span id="doctorGender"></span></p>
                        <p><strong>City:</strong> <span id="doctorCity"></span></p>
                        <p><strong>Street:</strong> <span id="doctorStreet"></span></p>
                    </div>

                    <!-- Bio Section -->
                    <div class="col-md-6 bio">
                        <h6>Bio</h6>
                        <!-- <p><strong>Description:</strong> <span id="doctorDescription"></span></p> -->
                        <p><strong>Qualifications:</strong> <span id="doctorQualifications"></span></p>
                        <p><strong>Experience:</strong> <span id="doctorExperience"></span></p>
                        <p><strong style="font-weight: bold;">Consultation Fee:</strong> <span id="doctorFee" style="font-weight: bold;">5000.00</span></p>
                        <p><strong>Speciality:</strong> <span id="doctorSpeciality"></span></p>
                        <p><strong style="color: red;">Request Status:</strong> <span id="doctorRequestStatus" style="color: red;">waiting for approval</span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               

          
                <button type="button" class="btn btn-success" id="approveStatusButton">Approve</button>

           
            
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
        $(document).on('click', '.view-doctor', function (e) {
    e.preventDefault();

    // Get doctor ID from the clicked button
    var doctorId = $(this).data('doctor-id');

    // AJAX request to fetch doctor data
    $.ajax({
        url: '/admin/single-doctor-request-view/' + doctorId,
        type: 'GET',
        success: function (response) {
            console.log(response); // Log the response to check the data structure
    

            // Check if response contains the expected fields and populate the modal
            $('#doctorName').text(response.first_name ? response.first_name + ' ' + response.last_name : 'Name not available');
            $('#doctorEmail').text(response.email || 'Email not available');
            $('#doctorPhone').text(response.phone_number || 'Phone number not available');
            $('#doctorNationalID').text(response.national_id || 'National ID not available');
            $('#doctorDOB').text(response.dob || 'DOB not available');
            $('#doctorGender').text(response.gender || 'Gender not available');
            $('#doctorCity').text(response.city_name || 'City not available');
            $('#doctorStreet').text(response.street || 'Street not available');
            $('#doctorStreet').text(response.street || 'Street not available');
            $('#doctorQualifications').text(response.qualifications || 'Qualification not available');
            $('#doctorExperience').text(response.bio || 'Experience not available');
            $('#doctorFee').text(response.consultation_fee || 'Fee not available');
            $('#doctorSpeciality').text(response.type || 'Speciality not available');
            $('#doctorProfilePicture').attr('src', response.profile_picture ? '/profile_pictures/' + response.profile_picture : 'https://via.placeholder.com/100');

            $('#doctorRequestStatus').text(response.request_status || 'Request status not available');
            $('#approveStatusButton').data('doctor-id', doctorId); 

            // Show the modal
            $('#doctorModal').modal('show');
        },
        error: function (xhr, status, error) {
            console.error('Error fetching doctor data:', error);
            console.log('XHR Response:', xhr.responseText);
        }
    });
});
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