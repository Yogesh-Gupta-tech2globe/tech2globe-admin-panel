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
              <a href="/admin/company-branch" class="btn btn-primary">Back</a>
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
                
                <form @if(empty($company['id'])) action="{{ url('admin/add-edit-company-branch') }}" @else action="{{ url('admin/add-edit-company-branch/'.$company['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Branch Country*</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Branch Country" required @if(!empty($company['name'])) value="{{$company['name']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="name">Branch City*</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter Branch City" required @if(!empty($company['city'])) value="{{$company['city']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="location">Branch Address*</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter Branch Address" required @if(!empty($company['location'])) value="{{$company['location']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phone">Branch Phone*</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter Branch Phone Number" required @if(!empty($company['phone'])) value="{{$company['phone']}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="googlemap">Embed a map*</label>
                            <textarea class="form-control" name="googlemap" required placeholder="Enter src given by Google map"> @if(!empty($company['google_map'])) {{$company['google_map']}} @endif</textarea>
                            <ul>
                              <li>Please enter the only "src" of provided iframe.</li>
                            </ul>
                        </div>
                        <div class="form-group">
                            <label for="flag">Country Flag*</label>
                            <input type="file" name="flag" class="form-control"  @if (empty($company['flag'])) required @endif accept="image/*">
                            <ul>
                              <li>Image should not be greater than 100Kb</li>
                            </ul>
                        </div>
                        @if (!empty($company['flag']))
                          <label>Previous Image</label><br>
                          <img src="{{ url('images/flag/'.$company['flag']) }}" height="100px">
                          <input type="hidden" name="current_image" value="{{ $company['flag'] }}">
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
