<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="/css/owl.carousel.min.css">
      <link rel="stylesheet" href="/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
         /* Hover effect for dropdown menu */
         .nav-item.dropdown:hover .dropdown-menu {
                display: block;
                margin-top: 0; /* Optional: This prevents any gap between the dropdown and the button */
            }

            /* Prevent the dropdown from closing when moving the cursor */
            .dropdown-menu {
                display: none;
            }

            /* Remove the arrow icon from the dropdown */
            .dropdown-toggle::after {
                display: none !important;
            }
      </style>
    </head>
    <body>
      <!-- header section start -->
      <div class="header_section">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <!-- Logo with spacing -->
                <a class="navbar-brand" href="index.html">
                    <img src="/images/Healthlink-Insurance-Logo.png" width="160px" height="160px" alt="Logo">
                </a>

                <!-- Toggle button for mobile view -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <!-- Original items -->
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    @guest
                    <!-- Show "Book Appointment" if the user is NOT authenticated -->
                    <a class="nav-link" href="/login-form">Book Appointment</a>
                @else
                    <!-- Redirect to a different page if the user IS authenticated -->
                    <a class="nav-link" href="/patient/find-doctor">Book Appointment</a>
                @endguest
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimonials.html">Lab appointment</a>
                    </li>
                    <!-- Dropdown menu for services -->
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <a class="dropdown-item" href="service1.html">Service 1</a>
                                <a class="dropdown-item" href="service2.html">Service 2</a>
                                <a class="dropdown-item" href="service3.html">Service 3</a>
                            </div>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor.html">Health packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact</a>
                    </li>
                        <ul class="navbar-nav">
                        @guest
    <!-- Show "Sign in/Sign up" if the user is NOT authenticated -->
    <li class="nav-item">
        <a class="nav-link" href="/login-form">Sign in/Sign up</a>
    </li>
@else
    <!-- Check user type and show the appropriate dashboard link -->
    <li class="nav-item">
        @if (auth()->user()->type === '1')
            <a class="nav-link" href="/admin/dashboard">My Account</a>
        @elseif (auth()->user()->type === '3')
            <a class="nav-link" href="/patient/dashboard">My Account</a>
        @elseif (auth()->user()->type === '2')
            <a class="nav-link" href="/doctor/dashboard">My Account</a>
        @elseif (auth()->user()->type === '4')
            <a class="nav-link" href="/receptionist/dashboard">My Account</a>
        @else
            <a class="nav-link" href="/user/dashboard">My Account</a>
        @endif
    </li>
    <!-- Show "Logout" link -->
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="nav-link btn btn-link" style="display: inline; cursor: pointer;">
                Logout
            </button>
        </form>
    </li>
@endguest
                        </ul>
    
                    </ul>
                </div>
            </nav>
      </div>
      <!-- header section end -->
      
    <!-- footer section end -->
      <!-- Javascript files-->
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <!-- <script src="/js/jquery-3.0.0.min.js"></script> -->
      <!-- <script src="/js/plugin.js"></script> -->
      <!-- sidebar -->
      <script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="/js/custom.js"></script>
      <!-- javascript --> 
      <script src="/js/owl.carousel.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- Popper.js (for dropdowns) -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <!-- Bootstrap JS -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script> -->

    </body>
</html>
