@extends('kanjut.badag.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- First Column -->
          <div class="col-lg-6">
            <!-- Card 1 -->
            <div class="card card-outline card-primary shadow-sm">
              <div class="card-body">
                <h5 class="card-title text-dark">Welcome to the Dashboard</h5>
                <p class="card-text">This is the introductory section. You can add important announcements or statistics here.</p>
                <a href="#" class="btn btn-primary btn-sm">View More</a>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="card card-outline card-success shadow-sm">
              <div class="card-body">
                <h5 class="card-title text-dark">Recent Activity</h5>
                <p class="card-text">Some quick example text to describe recent activities or events.</p>
                <a href="#" class="btn btn-success btn-sm">Check Activity</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-lg-6 -->

          <!-- Second Column -->
          <div class="col-lg-6">
            <!-- Card 3 -->
            <div class="card card-outline card-warning shadow-sm">
              <div class="card-header">
                <h5 class="card-title m-0">Featured Section</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">New Feature</h6>
                <p class="card-text">We have added a new feature for better user experience. Check it out below.</p>
                <a href="#" class="btn btn-warning btn-sm">Learn More</a>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="card card-outline card-danger shadow-sm">
              <div class="card-header">
                <h5 class="card-title m-0">Important Notices</h5>
              </div>
              <div class="card-body">
                <p class="card-text">Don't forget to check the upcoming deadlines and important events.</p>
                <a href="#" class="btn btn-danger btn-sm">See Notices</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
