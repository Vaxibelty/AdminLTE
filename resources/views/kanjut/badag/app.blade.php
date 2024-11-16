<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? "Vaxibelty" }} | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <style>
    /* Background utama */
    body {
      background: linear-gradient(120deg, #f9f9f9, #eaeaea);
      font-family: "Source Sans Pro", Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    /* Navbar */
    .main-header.navbar {
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      color: #333;
      font-size: 1rem;
    }

    .main-header .navbar-nav .nav-link {
      color: #555;
      font-weight: 600;
      text-transform: capitalize;
    }

    .main-header .navbar-nav .nav-link:hover {
      color: #007bff;
      background: rgba(0, 123, 255, 0.1);
      border-radius: 5px;
      transition: 0.3s;
    }

    /* Sidebar */
    .main-sidebar {
      background-color: #2c3e50;
      color: #ffffff;
    }

    .main-sidebar .brand-link {
      background: #34495e;
      font-weight: bold;
      color: #ffffff;
      text-align: center;
      text-transform: uppercase;
      font-size: 1.1rem;
    }

    .main-sidebar .user-panel {
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      margin-bottom: 20px;
    }

    .main-sidebar .user-panel .info a {
      color: #ecf0f1;
      font-weight: bold;
      text-transform: uppercase;
    }

    .main-sidebar .nav-sidebar>.nav-item>.nav-link {
      color: #dfe6e9;
      font-size: 0.95rem;
      border-radius: 5px;
    }

    .main-sidebar .nav-sidebar>.nav-item>.nav-link.active {
      background: #1abc9c;
      color: #2c3e50;
      font-weight: bold;
    }

    .main-sidebar .nav-sidebar>.nav-item>.nav-link:hover {
      background: #3498db;
      color: #ffffff;
      transition: 0.3s ease-in-out;
    }

    /* Content */
    .content-wrapper {
      background: #ecf0f1;
      padding: 20px;
      border-radius: 10px;
    }

    .content-wrapper h1 {
      font-size: 2rem;
      font-weight: bold;
      color: #2c3e50;
    }

    /* Cards */
    .card {
      background: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .card-header {
      background: #1abc9c;
      color: #ffffff;
      font-weight: bold;
      padding: 10px 15px;
      border-bottom: 1px solid #16a085;
    }

    .card-body {
      padding: 15px;
      color: #2c3e50;
      font-size: 0.95rem;
    }

    .btn-primary {
      background-color: #3498db;
      color: #ffffff;
      border: none;
      font-weight: bold;
      border-radius: 5px;
      padding: 8px 16px;
      transition: 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #2980b9;
      color: #ecf0f1;
    }

    /* Footer */
    footer {
      background: #34495e;
      color: #ffffff;
      text-align: center;
      padding: 10px;
      font-size: 0.9rem;
      font-weight: bold;
    }

    footer a {
      color: #1abc9c;
      text-decoration: none;
    }

    footer a:hover {
      color: #3498db;
      text-decoration: underline;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $title ?? "Laradminlte" }}</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i> 
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('produks.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Product</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  @yield('content')

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
