<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/Admin/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/Admin/assets/css/app.css">
    <link rel="shortcut icon" href="/Admin/assets/images/favicon.svg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .stats-icon.yellow {
        background-color: #FFC107;
        border-radius: 50%;
        padding: 15px;
        color: white; 
        text-align: center;
    }
    .stats-icon.orange {
        background-color:orangered; /* Yellow background */
        border-radius: 50%; /* Makes it circular */
        padding: 15px; /* Space around the icon */
        color: white; /* White icon color for contrast */
        text-align: center; /* Centering the icon */
    }
    </style>
</head>

<body>
@if(session('success'))
    <script>
         swal("'You have sucessfully logged!","{{ Session::get('message') }}",'success',{
            button:true,
            button:"OK",
     
        });
    </script>
@endif

    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html">Healthlink</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="/admin/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-calendar"></i> 
                                <span>Appointments</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-clock"></i> Pending</a>
                                </li>
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-check-circle"></i> Completed</a> 
                                </li>
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-x-circle"></i> Cancelled</a> 
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-fill"></i> 
                                <span>Doctors</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href="/admin/doctor-request-view"><i class="bi bi-hourglass-split"></i> Pending requests</a> 
                                </li>
                                <li class="submenu-item ">
                                      <a href="/admin/doctor-request-approved-view"><i class="bi bi-check-square"></i> Approved requests</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                            <i class="bi bi-file-earmark-person"></i>
                                <span>Patients</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-tools"></i>
                                <span>Services</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-plus-circle"></i> Add services</a> 
                                </li>
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-tools"></i> Manage services</a> 
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-tools"></i>
                                <span>Services</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-plus-circle"></i>Add speciality</a> 
                                </li>
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-tools"></i> Manage speciality</a> 
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-person-circle"></i>
                                <span>Staff</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-person-add"></i> Add staff</a>
                                </li>
                                <li class="submenu-item ">
                                <a href=""><i class="bi bi-person-lines-fill"></i> Manage staff</a>
                                </li>
                            </ul>
                        </li>

                   
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-text"></i>
                                <span>Reports</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="">Pending</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Completed</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Cancelled</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">
                                            @if(session('userInfo'))
                                                <h2>Welcome, {{ session('userInfo')->first_name }} {{ session('userInfo')->last_name }}</h2>
                                                <!-- Add more fields as needed -->
                                            @else
                                                <p>User information is not available.</p>
                                            @endif
                                            </h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">
                                        @if(session('userInfo'))
                                                <h2>Welcome, {{ session('userInfo')->first_name }} {{ session('userInfo')->last_name }}</h2>
                                                <!-- Add more fields as needed -->
                                            @else
                                                <p>User information is not available.</p>
                                            @endif
                                        </h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/staff/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="page-heading">
                <h3>Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                <i class="bi bi-clock"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pending appointment</h6>
                                                <h6 class="font-extrabold mb-0">{{ $total__pending_appointments}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                <i class="bi bi-check-circle"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Completed appointment</h6>
                                                <h6 class="font-extrabold mb-0">{{$total_completed_appointments}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                <i class="bi bi-x-circle"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Cancel appoitnments</h6>
                                                <h6 class="font-extrabold mb-0">{{ $total_cancelled_appointments}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon ">
                                                <i class="bi bi-briefcase-fill"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total appointments</h6>
                                                <h6 class="font-extrabold mb-0">{{ $total_appointments}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                <i class="bi bi-bell"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Pending doctor requests</h6>
                                                <h6 class="font-extrabold mb-0">{{ $total_pending_doctor_requests}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon yellow">
                                                <i class="bi bi-check-circle-fill"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Approved doctor requests</h6>
                                                <h6 class="font-extrabold mb-0">{{   $total_approved_doctor_requests}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon orange">
                                                <i class="bi bi-person-fill"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total registered patients</h6>
                                                <h6 class="font-extrabold mb-0">{{   $total_patients}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                <i class="bi bi-person-check-fill"></i> 
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total registered doctors</h6>
                                                <h6 class="font-extrabold mb-0">{{$total_doctors}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!-- <h4>Profile Visit</h4> -->
                                    </div>
                                    <div class="card-body">
                                    <div id="appointmentsBarChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <div class="row">
                            <div class="col-12 col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Latest Comments</h4>
                                    </div>
                                    <div class="card-body">
                                     
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-12 col-lg-3">
                        <!-- <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">John Duck</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="card">
                            <div class="card-header">
                                <h4>Recent Messages</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div> -->
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/Admin/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/Admin/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/Admin/assets/js/pages/dashboard.js"></script>

    <script src="/Admin/assets/js/main.js"></script>


          <script>
        // Pass the appointments data from the server-side to the JavaScript
        var appointmentsData = @json($appointmentsData);

        // Extract the department names and total appointments for the chart
        var departments = appointmentsData.map(item => item.department);
        var totalAppointments = appointmentsData.map(item => item.total_appointments);

        // ApexCharts options for the bar chart
        var optionsProfileVisit = {
            annotations: {
                position: 'back'
            },
            dataLabels: {
                enabled: false
            },
            chart: {
                type: 'bar',
                height: 300
            },
            fill: {
                opacity: 1
            },
            plotOptions: {},
            series: [{
                name: 'Total Appointments',
                data: totalAppointments
            }],
            colors: '#435ebe',
            xaxis: {
                categories: departments
            },
            title: {
                text: 'Number of Appointments per Department',
                align: 'center'
            }
        };

        // Render the chart
        var chart = new ApexCharts(document.querySelector("#appointmentsBarChart"), optionsProfileVisit);
        chart.render();
    </script>
   
</body>

</html>