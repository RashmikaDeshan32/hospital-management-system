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
      <title>Contact</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    </head>
    <body>
    @include('header')
      <!-- contact section start -->
      <div class="contact_section layout_padding">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1 class="contact_text">Contact Us</h1>
                <form action="/action_page.php">
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Name" name="Name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Email" name="Email">
                  </div>
                  <div class="form-group">
                    <input type="text" class="email-bt" placeholder="Subject" name="Email">
                  </div>
                    <div class="form-group">
                      <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="text"></textarea>
                    </div>
                  </form>
                  <div class="main_bt"><a href="#">Send</a></div>
              </div>
            <div class="col-md-6">
              <h1 class="contact_text">What syas our peasant</h1>
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <h2 class="selfideno_text">Selfideno</h2>
                    <div class="client_main">
                      <div class="image_5"><img src="images/img-5.png"></div>
                      <p class="lorem_ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur </p>
                      <div class="quote_icon"><img src="images/quote-icon.png"></div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <h2 class="selfideno_text">Selfideno</h2>
                    <div class="client_main">
                      <div class="image_5"><img src="images/img-5.png"></div>
                      <p class="lorem_ipsum_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur </p>
                      <div class="quote_icon"><img src="images/quote-icon.png"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- contact section end -->
      <!-- appointment section start -->
      <div class="appointment_section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h3 class="need_text">Need a doctor for check-Up </h3>
              <h1 class="make_text">Make An Appointment & You're Done </h1>
            </div>
            <div class="col-md-6">
              <div class="appointment_bt_main">
                <div class="appointment_bt"><a href="#">Get Appointment</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- appointment section end -->
      <!-- footer section start -->
      <!-- info section -->
    <div class="info_section layout_padding">
      <div class="container ">
        <div class="info_content">
              <div>
          <div class="row">
            <div class="col-md-4">
              <div class="d-flex">
                <h5>
                  Medical Care
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Cancer Oncology
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Dental Surgery
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Diagnose & Research
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Drug / Medicines
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex">
                <h5>
                  The Services
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Cancer Oncology
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Dental Surgery
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Diagnose & Research
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Drug / Medicines
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-4">
              <div class="d-flex">
                <h5>
                  Departments
                </h5>
              </div>
              <div class="d-flex ">
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      About Departments
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Services
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Contact Us
                    </a>
                  </li>
                </ul>
                <ul class="ml-3 ml-md-5">
                  <li>
                    <a href="">
                      Cancer Oncology
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Dental Surgery
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Diagnose & Research
                    </a>
                  </li>
                  <li>
                    <a href="">
                      Drug / Medicines
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
          <div class="social-box">
            <a href="">
              <img src="images/fb-icon.png" alt="" />
            </a>

            <a href="">
              <img src="images/twitter-icon.png" alt="" />
            </a>
            <a href="">
              <img src="images/linkedin-icon.png" alt="" />
            </a>
            <a href="">
              <img src="images/instagram-icon.png" alt="" />
            </a>
          </div>
          <div class="form_container mt-5">
            <form action="">
              <label for="subscribeMail">
                Newsletter
              </label>
              <input
                type="email"
                placeholder="Enter Your email"
                id="subscribeMail"
              />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!-- end info section -->
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
      <div class="container">
        <p class="copyright">2020 All Rights Reserved. Design by <a href="https://html.design">Free html  Templates</a></p>
      </div>
    </div>
    <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
   </html>