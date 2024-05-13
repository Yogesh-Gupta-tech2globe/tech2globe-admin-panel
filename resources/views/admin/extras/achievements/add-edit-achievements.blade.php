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
              <li class="breadcrumb-item"><a href="">Extras</a></li>
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
                
                <form @if(empty($achievements['id'])) action="{{ url('admin/add-edit-achievements') }}" @else action="{{ url('admin/add-edit-achievements/'.$achievements['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Achievements Name" required @if(!empty($achievements['name'])) value="{{$achievements['name']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="url">Url*</label>
                            <input type="url" name="url" class="form-control" placeholder="Enter Redirection Url" required @if(!empty($achievements['url'])) value="{{$achievements['url']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="image">Image*</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                        @if (!empty($achievements['image']))
                          <label>Previous Image</label><br>
                          <img src="{{ url('images/achievements/'.$achievements['image']) }}" height="150px" width="180px">
                          <input type="hidden" name="current_image" value="{{ $achievements['image'] }}">
                        @endif
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
