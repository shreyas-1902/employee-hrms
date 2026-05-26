<!DOCTYPE html>
<html>
<head>
    <title>Payroll Management Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>

        body{
            background:#f4f6f9;
            overflow-x:hidden;
        }

        /* Desktop Sidebar */

        .sidebar{
            height:100vh;
            background:#1e293b;
            color:white;
            position:fixed;
            width:250px;
            top:0;
            left:0;
        }

        .sidebar h3{
            padding:20px;
            text-align:center;
            border-bottom:1px solid #334155;
        }

        .sidebar a{
            color:white;
            text-decoration:none;
            display:block;
            padding:14px 20px;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:#0d6efd;
        }

        /* Main Content */

        .main-content{
            margin-left:250px;
            padding:20px;
        }

        /* Dropdown */

        .dropdown-menu{
            border:none;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            background-color:#ffffff;
        }

        .dropdown-item{
            color:#000 !important;
            padding:12px 15px;
            font-weight:500;
        }

        .dropdown-item:hover{
            background:#0d6efd;
            color:white !important;
        }

        /* Cards */

        .card-box{
            border:none;
            border-radius:15px;
            color:white;
        }

        /* Mobile Responsive */

        @media(max-width:991px){

            .main-content{
                margin-left:0;
                padding:15px;
            }

        }

    </style>

</head>

<body>

<!-- Mobile Navbar -->

<nav class="navbar navbar-dark bg-dark d-lg-none">

    <div class="container-fluid">

        <button class="btn btn-outline-light"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#mobileSidebar">

            <i class="fa fa-bars"></i>

        </button>

        <span class="navbar-brand mb-0 h1">
            Payroll System
        </span>

    </div>

</nav>

<!-- Desktop Sidebar -->

<div class="sidebar d-none d-lg-block">

    <h3>
        Payroll System
    </h3>

    <a href="/">
        <i class="fa fa-home me-2"></i>
        Dashboard
    </a>

    <!-- Employee -->

    <div class="dropdown">

        <a class="dropdown-toggle text-white"
           href="#"
           data-bs-toggle="dropdown">

            <i class="fa fa-users me-2"></i>
            Employee Management

        </a>

        <ul class="dropdown-menu w-100">

            <li>
                <a class="dropdown-item" href="/employees/create">
                    Add Employee
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/employees">
                    View Employee
                </a>
            </li>

        </ul>

    </div>

    <!-- Attendance -->

    <div class="dropdown">

        <a class="dropdown-toggle text-white"
           href="#"
           data-bs-toggle="dropdown">

            <i class="fa fa-calendar-check me-2"></i>
            Attendance

        </a>

        <ul class="dropdown-menu w-100">

            <li>
                <a class="dropdown-item" href="/attendance/create">
                    Mark Attendance
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/attendance/report">
                    Attendance Report
                </a>
            </li>

        </ul>

    </div>

    <!-- Salary -->

    <div class="dropdown">

        <a class="dropdown-toggle text-white"
           href="#"
           data-bs-toggle="dropdown">

            <i class="fa fa-money-bill-wave me-2"></i>
            Salary Management

        </a>

        <ul class="dropdown-menu w-100">

            <li>
                <a class="dropdown-item" href="/salary/create">
                    Salary Structure
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="/salary">
                    Salary Calculation
                </a>
            </li>

        </ul>

    </div>

    <!-- Payslip -->

    <div class="dropdown">
    <a href="/payslip" class="text-white text-decoration-none d-block mb-3">
            <i class="fa fa-home me-2"></i> Payslip
        </a>

    </div>
</div>

<!-- Mobile Sidebar -->

<div class="offcanvas offcanvas-start bg-dark text-white"
     tabindex="-1"
     id="mobileSidebar">

    <div class="offcanvas-header">

        <h5 class="offcanvas-title">
            Payroll System
        </h5>

        <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas">
        </button>

    </div>

    <div class="offcanvas-body">

        <a href="/"
           class="text-white text-decoration-none d-block mb-3">

            <i class="fa fa-home me-2"></i>
            Dashboard

        </a>

        <!-- Employee -->

        <div class="dropdown mb-3">

            <a class="dropdown-toggle text-white text-decoration-none"
               href="#"
               data-bs-toggle="dropdown">

                <i class="fa fa-users me-2"></i>
                Employee Management

            </a>

            <ul class="dropdown-menu w-100">

                <li>
                    <a class="dropdown-item"
                       href="/employees/create">

                        Add Employee

                    </a>
                </li>

                <li>
                    <a class="dropdown-item"
                       href="/employees">

                        View Employee

                    </a>
                </li>

            </ul>

        </div>

        <!-- Attendance -->

        <div class="dropdown mb-3">

            <a class="dropdown-toggle text-white text-decoration-none"
               href="#"
               data-bs-toggle="dropdown">

                <i class="fa fa-calendar-check me-2"></i>
                Attendance

            </a>

            <ul class="dropdown-menu w-100">

                <li>
                    <a class="dropdown-item" href="/attendance/create">
                        Mark Attendance
                    </a>
                </li>

                <li>
                <a class="dropdown-item" href="/attendance/report">
                    Attendance Report
                </a>
            </li>

            </ul>

        </div>

        <!-- Salary -->

        <div class="dropdown mb-3">

            <a class="dropdown-toggle text-white text-decoration-none"
               href="#"
               data-bs-toggle="dropdown">

                <i class="fa fa-money-bill-wave me-2"></i>
                Salary Management

            </a>

            <ul class="dropdown-menu w-100">

                <li>
                    <a class="dropdown-item" href="/salary/create">
                        Salary Structure
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="/salary">
                        Salary Calculation
                    </a>
                </li>

            </ul>

        </div>

        <!-- Payslip -->

        <div class="dropdown mb-3">

        <a href="/payslip" class="text-white text-decoration-none d-block mb-3">
            <i class="fa fa-home me-2"></i> Payslip
        </a>

        </div>

    </div>

</div>

<!-- Main Content -->

<div class="main-content">

    <div class="container-fluid">

        @yield('content')

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>