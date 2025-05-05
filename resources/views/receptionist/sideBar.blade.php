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

                        <li class="sidebar-item active ">
                            <a href="/receptionist/dashboard" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-calendar-check"></i> <!-- Calendar icon for Appointments -->
                                <span>Appointments</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="/receptionist/pending-appointments">
                                        <i class="bi bi-clock"></i> <!-- Clock icon for Pending -->
                                        <span>Pending</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/receptionist/completed-appointments">
                                        <i class="bi bi-check-circle"></i> <!-- Checkmark icon for Completed -->
                                        <span>Completed</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="">
                                        <i class="bi bi-x-circle"></i> <!-- X icon for Cancelled -->
                                        <span>Cancelled</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                            
                                <i class="bi bi-person" style="margin-left: 5px;"></i> <!-- Person icon -->
                                <span>Patients</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                            <i class="bi bi-cash-stack"></i> <!-- Cash icon -->

                                <span>Cash Payments</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="/receptionist/pending-cash">
                                        <i class="bi bi-clock"></i> <!-- Clock icon for Pending -->
                                        <span>Pending</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/receptionist/completed-cash">
                                        <i class="bi bi-check-circle"></i> <!-- Checkmark icon for Completed -->
                                        <span>Completed</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>

                            <i class="bi bi-credit-card" style="margin-left: 5px;"></i> <!-- Card icon -->
                                <span>Card Payments</span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item">
                                    <a href="/doctor/add-time-schedule-view">
                                        <i class="bi bi-clock"></i> <!-- Clock icon for Pending -->
                                        <span>Pending</span>
                                    </a>
                                </li>
                                <li class="submenu-item">
                                    <a href="/doctor/view/time-schedule">
                                        <i class="bi bi-check-circle"></i> <!-- Checkmark icon for Completed -->
                                        <span>Completed</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
</body>
</html>