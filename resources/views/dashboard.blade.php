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

        /* ================= MOBILE FIX ================= */

        @media(max-width:991px){

            .main-content{
                margin-left:0;
                padding:15px;
            }
        }

        /* FIX dropdown inside offcanvas */
        .offcanvas .dropdown-menu {
            position: static !important;
            float: none !important;
            background: #ffffff;
            margin-top: 5px;
        }

        .offcanvas-body a {
            padding: 10px 0;
            font-size: 16px;
        }

        .offcanvas-body .dropdown-toggle {
            display: block;
            padding: 10px 0;
        }

        .sidebar .dropdown-menu {
            position: relative !important;
            transform: none !important;
        }

    </style>

</head>

<body>

<!-- MOBILE NAVBAR -->
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

<!-- DESKTOP SIDEBAR -->

<div class="sidebar d-none d-lg-block">

    <h3>Payroll System</h3>

    <a href="/"><i class="fa fa-home me-2"></i> Dashboard</a>

    <div class="dropdown">
        <a class="dropdown-toggle text-white" data-bs-toggle="dropdown">
            <i class="fa fa-users me-2"></i> Employee Management
        </a>

        <ul class="dropdown-menu w-100">
            <li><a class="dropdown-item" href="/employees/create">Add Employee</a></li>
            <li><a class="dropdown-item" href="/employees">View Employee</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a class="dropdown-toggle text-white" data-bs-toggle="dropdown">
            <i class="fa fa-calendar-check me-2"></i> Attendance
        </a>

        <ul class="dropdown-menu w-100">
            <li><a class="dropdown-item" href="/attendance/create">Mark Attendance</a></li>
            <li><a class="dropdown-item" href="/attendance/report">Attendance Report</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <a class="dropdown-toggle text-white" data-bs-toggle="dropdown">
            <i class="fa fa-money-bill-wave me-2"></i> Salary Management
        </a>

        <ul class="dropdown-menu w-100">
            <li><a class="dropdown-item" href="/salary/create">Salary Structure</a></li>
            <li><a class="dropdown-item" href="/salary">Salary Calculation</a></li>
        </ul>
    </div>

    <div class="dropdown">
    <a href="/payslip" class="text-white text-decoration-none d-block mb-3">
            <i class="fa fa-home me-2"></i> Payslip
        </a>
    </div>


</div>

<!-- MOBILE SIDEBAR -->
<div class="offcanvas offcanvas-start bg-dark text-white"
     tabindex="-1"
     id="mobileSidebar">

    <div class="offcanvas-header">

        <h5 class="offcanvas-title">Payroll System</h5>

        <button type="button"
                class="btn-close btn-close-white"
                data-bs-dismiss="offcanvas"></button>

    </div>

    <div class="offcanvas-body">

        <a href="/" class="text-white text-decoration-none d-block mb-3">
            <i class="fa fa-home me-2"></i> Dashboard
        </a>

        <div class="dropdown mb-3">
            <a class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown">
                <i class="fa fa-users me-2"></i> Employee
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="/employees/create">Add Employee</a></li>
                <li><a class="dropdown-item" href="/employees">View Employee</a></li>
            </ul>
        </div>

        <div class="dropdown mb-3">
            <a class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown">
                <i class="fa fa-calendar-check me-2"></i> Attendance
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="/attendance/create">Mark Attendance</a></li>
                <li><a class="dropdown-item" href="/attendance/report">Attendance Report</a></li>
            </ul>
        </div>

        <div class="dropdown mb-3">
            <a class="dropdown-toggle text-white text-decoration-none" data-bs-toggle="dropdown">
                <i class="fa fa-money-bill-wave me-2"></i> Salary
            </a>
            <ul class="dropdown-menu w-100">
                <li><a class="dropdown-item" href="/salary/create">Salary Structure</a></li>
                <li><a class="dropdown-item" href="/salary">Salary Calculation</a></li>
            </ul>
        </div>

        <div class="dropdown mb-3">
        <a href="/payslip" class="text-white text-decoration-none d-block mb-3">
            <i class="fa fa-home me-2"></i> Payslip
        </a>
        </div>

    </div>

</div>

<!-- MAIN CONTENT -->
<div class="main-content">

    <div class="container-fluid">

        <!-- Main Content -->


<!-- Top Navbar -->

<nav class="navbar navbar-expand-lg shadow-sm p-3">

    <div class="container-fluid">

        <h3 class="fw-bold text-primary">
            Payroll Dashboard
        </h3>

        <div>

            <button class="btn btn-primary">
                Admin Panel
            </button>

        </div>

    </div>

</nav>

<!-- Dashboard Cards -->

<div class="container mt-4">

    <div class="row g-4">


        <div class="col-md-4">
    <div class="card bg-primary card-box shadow">
        <div class="card-body">
            <h5>Total Employees</h5>
            <h2>{{ $totalEmployees }}</h2>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card bg-success card-box shadow">
        <div class="card-body">
            <h5>Total Salary</h5>
            <h2>₹ {{ number_format($totalSalary) }}</h2>
        </div>
    </div>
</div>
    </div>

    <!-- Features Section -->

    <div class="row mt-5">

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h4 class="text-primary fw-bold">
                        Automatic Salary Calculation
                    </h4>

                    <p class="text-muted">
                        Calculate employee salaries automatically based on attendance, bonuses, and deductions.
                    </p>

                </div>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card shadow border-0">

                <div class="card-body">

                    <h4 class="text-success fw-bold">
                        Tax Deduction Logic
                    </h4>

                    <p class="text-muted">
                        Automatically apply tax deductions and generate accurate payroll reports.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Welcome -->

    <div class="card mt-5 shadow border-0">

        <div class="card-body p-5">

            <h2 class="fw-bold text-primary">
                Welcome to Payroll Management System
            </h2>

            <p class="mt-3 text-muted">
                Manage employees, salary structures, attendance, payroll processing, and payslip generation efficiently using Laravel.
            </p>

        </div>

    </div>

</div>

</div>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>