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
              <li class="breadcrumb-item active">File Management</li>
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
                
                <form @if(empty($fileData['id'])) action="{{ url('admin/add-edit-file') }}" @else action="{{ url('admin/add-edit-file/'.$fileData['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    
                      <div class="form-group">
                        <label for="email">Enter Code of File*</label>
                        <textarea id="codeMirrorDemo" class="" name="fileCode">
                          @if(!empty($fileData['file_code']))
                            {{ htmlspecialchars_decode($fileData['file_code']) }}
                          @else
                            <section>
                              Write Code Here...
                            </section>
                          @endif
                        </textarea>
                      </div>
                          
                      <div class="form-group">
                          <label for="email">File Name*</label>
                          <input type="text" class="form-control" id="fileName" name="fileName" placeholder="Enter File Name (Should be Unique)" required @if(!empty($fileData['file_name'])) value="{{ $fileData['file_name'] }}" readonly @endif>
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
