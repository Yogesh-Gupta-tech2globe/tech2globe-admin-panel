@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                 <!-- form start -->
                 @if ($errors->any())
                    <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                @endif
                @if(Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Error:</strong>{{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                @endif
                
                <form name="usersForm" id="usersForm" @if(empty($users['id'])) action="{{ url('admin/add-edit-users') }}" @else action="{{ url('admin/add-edit-users/'.$users['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter User Name" required @if(!empty($users['name'])) value="{{ $users['name'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="role">Role*</label>
                        <select class="form-control" id="role" name="role" required>
                          <option>Select User Role</option>
                          <option value="Hr" @if($users['role']=="Hr") selected @endif>Hr</option>
                          <option value="Manager" @if($users['role']=="Manager") selected @endif>Manager</option>
                          <option value="SEO" @if($users['role']=="SEO") selected @endif>SEO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter User email" required @if(!empty($users['email'])) readonly value="{{ $users['email'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="email">Password*</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter User password" required @if(!empty($users['password'])) value="{{ $users['password'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="user_image">User Image</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="user_image" name="user_image">
                            <label class="custom-file-label" for="image">Choose User Profile Image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                        @if (!empty($users['image']))
                          <label>Previous Image</label><br>
                          <img src="{{ url('admin/img/photos/'.$users['image']) }}" height="150px" width="180px">
                          <input type="hidden" name="current_image" value="{{ $users['image'] }}">
                        @endif
                    </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
