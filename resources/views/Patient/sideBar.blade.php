<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

                        <li class="sidebar-item">
                            <a href="/" class="sidebar-link">
                                <i class="bi bi-house-door"></i> <!-- Icon for Home -->
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="/patient/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-calendar-event"></i> <!-- Icon for My Appointments -->
                                <span>My Appointments</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="/patient/view/pending-appointments">Pending</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Completed</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Cancelled</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-earmark-text"></i> <!-- Icon for Medical Records -->
                                <span>Medical records</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="">Booked</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Completed</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Cancelled</a>
                                </li>
                            </ul>
                        </li>

                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-credit-card"></i> <!-- Icon for Payments -->
                                <span>Payments</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="">Pending</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="">Completed</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                            <i class="bi bi-chat-dots"></i> <!-- Icon for Feedback -->
                                <span>Feedback</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="" class='sidebar-link'>
                            <i class="bi bi-question-circle"></i> <!-- Icon for Support -->
                                <span>Support</span>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
</body>
</html>