@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Landing Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Landing Pages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2 bg-gradient-dark">
                  <img class="card-img-top" src="{{ url('admin/img/photo1.png') }}" alt="Landing Page 1">
                  <div class="card-img-overlay d-flex flex-column justify-content-end">
                    <h3 class="card-title text-primary text-white">Theme 1</h3>
                    <p class="card-text text-white pb-2 pt-1">Hire Virtual Assistant.</p>
                    <a href="https://canada.tech2globe.co.in/hire-virtual-assistant/" target="blank" class="btn btn-light">View Theme</a>
                    <a href="/admin/create-landing-pages" class="btn btn-primary">Create Landing Page</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
