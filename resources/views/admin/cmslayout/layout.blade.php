@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Layout</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Layout</li>
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
                    <p class="card-text text-white pb-2 pt-1">Landing Page</p>
                    <a href="https://canada.tech2globe.co.in/hire-virtual-assistant/" target="blank" class="btn btn-light">View Theme</a>
                    {{-- <a href="/admin/create-landing-pages" class="btn btn-primary">Create Landing Page</a> --}}
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                      Create Landing Page
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-lg">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Create Landing Page</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <!-- form start -->
                <form action="{{ url('admin/landing-pages') }}" method="post" enctype="multipart/form-data">@csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="page_name">Page Name*</label>
                      <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Enter Page Name" required>
                    </div>
                    <div class="form-group">
                      <label for="page_url">Page URL*</label>
                      <input type="text" class="form-control" id="page_url" name="page_url" value="" placeholder="Enter Page Name First" required>
                      <span id="urlVerify"></span>
                    </div>
                    <div class="form-group">
                      <label for="meta_title">Meta Title</label>
                      <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" id="meta_description" placeholder="Enter Meta Description">
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" id="meta_keywords" placeholder="Enter Meta Keywords">
                    </div> 
                    <div class="form-group">
                        <label for="favicon_icon">Favicon Icon*</label>
                        <input type="file" class="form-control" name="favicon_icon" id="favicon_icon" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo*</label>
                        <input type="file" class="form-control" name="logo" id="logo" required>
                    </div>                
                  </div>
                  <!-- /.card-body -->
  
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
