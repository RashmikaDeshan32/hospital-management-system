<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
<!-- 
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
                        </li> -->

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

                        <!-- <li class="sidebar-item  has-sub">
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
                        </li> -->
                        
                        <!-- <li class="sidebar-item  has-sub">
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
                        </li> -->
                        <!-- <li class="sidebar-item  has-sub">
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
                        </li> -->

                   
                        <!-- <li class="sidebar-item  has-sub">
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
                        </li> -->


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
</body>
</html>