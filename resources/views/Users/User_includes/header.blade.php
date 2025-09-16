<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Expense Tracker | Dashboard</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
    @yield('style')
</head>

<body class="bg-dark dashboard">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-2 border-bottom border-primary border-opacity-25">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-chart-pie me-2 text-primary"></i>
                <span class="text-gradient">Expense Tracker</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('showtrips') }}"><i class="fas fa-wallet me-1"></i> Trips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-chart-line me-1"></i> Reports</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end bg-dark-2">
                            <li><a class="dropdown-item text-light" href="#"><i class="fas fa-user me-1"></i>
                                    Profile</a></li>
                            <li><a class="dropdown-item text-light" href="#"><i class="fas fa-cog me-1"></i>
                                    Settings</a></li>
                            <li>
                                <hr class="dropdown-divider bg-primary opacity-25">
                            </li>
                            <li><a class="dropdown-item text-light" href="{{ route('logouts') }}"><i
                                        class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-content">
        <!-- Sidebar -->
        <div class="sidebar gap-4">

            <div class="col-12 mt-5 text-center d-flex justify-content-center flex-column align-items-center">
                <div class="image-preview" id="imagePreview">
                    <img src="{{ Auth::check() && Auth::user()->image ? asset('assets/img/' . Auth::user()->image) : '' }}"
                        alt="">
                </div>
                <div class="mt-4">
                    <h3>Welcome {{ Auth::user()->fname }}</h3>
                </div>
            </div>

            <div class="d-flex flex-column mt-4 flex-shrink-0 p-3 h-100">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link  {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('showtrips') }}" class="nav-link text-light {{ request()->routeIs('showtrips') ? 'active' : '' }}">
                            <i class="fas fa-wallet me-2"></i>
                            Trips
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-light">
                            <i class="fas fa-chart-pie me-2"></i>
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-light">
                            <i class="fas fa-calendar-alt me-2"></i>
                            Calendar
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-light">
                            <i class="fas fa-users me-2"></i>
                            Users
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-light">
                            <i class="fas fa-cog me-2"></i>
                            Settings
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-content"> 
