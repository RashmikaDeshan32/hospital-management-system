<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Admin/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/Admin/assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/Admin/assets/css/app.css">
    <link rel="shortcut icon" href="/Admin/assets/images/favicon.svg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>

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
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Appointments</span>
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

                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Patients</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Schedules</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/doctor/add-time-schedule-view">Add</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="/doctor/view/time-schedule">Mange</a>
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
                                            <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                            <p class="mb-0 text-sm text-gray-600">Doctor</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/Admin/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, John!</h6>
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
                                    <li><a class="dropdown-item" href="#"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="page-heading">
                <h3>Doctor schedule</h3>
            </div>
            <div class="page-content">
                         <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Add schedule</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="form form-horizontal" action="{{route('store.doctor.schedule')}}" method="post">
    @csrf
    <div class="form-body">
        <div class="row">
            <!-- Date input -->
            <div class="col-md-4">
                <label>Date</label>
            </div>
            <div class="col-md-8">
                <div class="form-group has-icon-left">
                    <div class="position-relative">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" placeholder="Select Date" id="date-input" name="date" value="{{ old('date') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-calendar-date"></i>
                        </div>
                    </div>
                    @error('date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Day input (Auto-filled) -->
            <div class="col-md-4">
                <label>Day</label>
            </div>
            <div class="col-md-8">
                <div class="form-group has-icon-left">
                    <div class="position-relative">
                        <input type="text" class="form-control @error('day') is-invalid @enderror" placeholder="Day" id="day-input" name="day" value="{{ old('day') }}" readonly>
                        <div class="form-control-icon">
                            <i class="bi bi-calendar"></i>
                        </div>
                    </div>
                    @error('day')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Start time input -->
            <div class="col-md-4">
                <label>Start Time</label>
            </div>
            <div class="col-md-8">
                <div class="form-group has-icon-left">
                    <div class="position-relative">
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" placeholder="Select Start Time" id="start-time-input" name="start_time" value="{{ old('start_time') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                    </div>
                    @error('start_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- End time input -->
            <div class="col-md-4">
                <label>End Time</label>
            </div>
            <div class="col-md-8">
                <div class="form-group has-icon-left">
                    <div class="position-relative">
                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" placeholder="Select End Time" id="end-time-input" name="end_time" value="{{ old('end_time') }}">
                        <div class="form-control-icon">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                    </div>
                    @error('end_time')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit and Reset buttons -->
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            </div>
        </div>
    </div>
</form>



                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>


    <script>
    document.getElementById('date-input').addEventListener('change', function() {
        const dateInput = new Date(this.value);
        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const dayName = daysOfWeek[dateInput.getDay()];  // Get day name based on the date
        document.getElementById('day-input').value = dayName;  // Set the day in the day input field
    });
    </script>

    <script src="/Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/Admin/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/Admin/assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="/Admin/assets/js/pages/dashboard.js"></script>

    <script src="/Admin/assets/js/main.js"></script>
</body>

</html>