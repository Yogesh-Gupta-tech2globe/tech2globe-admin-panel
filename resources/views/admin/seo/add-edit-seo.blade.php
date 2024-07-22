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
              <a href="/admin/seo" type="button" class="btn btn-primary">
                Back
              </a>
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
                
                <form @if(empty($seo['id'])) action="{{ url('admin/add-edit-job') }}" @else action="{{ url('admin/add-edit-job/'.$seo['id']) }}" @endif method="post">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Job Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Job Title" required @if(!empty($seo['title'])) value="{{ $seo['title'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="industry">Industry*</label>
                            <input type="text" class="form-control" name="industry" placeholder="Enter Industry" required @if(!empty($seo['industry'])) value="{{ $seo['industry'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation*</label>
                            <input type="text" class="form-control" name="designation" placeholder="Enter Designation" required @if(!empty($seo['designation'])) value="{{ $seo['designation'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="profile">Job Profile*</label>
                            <textarea class="form-control" name="job_profile" required rows="6">@if(!empty($seo['job_profile'])) {{ $seo['job_profile'] }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills*</label>
                            <textarea class="form-control" name="skills" required rows="6">@if(!empty($seo['skills'])) {{ $seo['skills'] }} @endif</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postedOn">Published On*</label>
                                    <input type="date" class="form-control" name="posted_on" required @if(!empty($seo['posted_on'])) value="{{ $seo['posted_on'] }}" @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="positions">Number Of Positions*</label>
                                    <select class="form-control" name="positions" required>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="experience">Experience*</label>
                                    <select class="form-control" name="experience" required>
                                        <option>Select Experience</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="qualification">Qualification*</label>
                            <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification" required @if(!empty($seo['qualification'])) value="{{ $seo['qualification'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary Offered*</label>
                            <input type="text" class="form-control" name="salary" placeholder="Rs.10,000-Rs.50,000" required @if(!empty($seo['salary'])) value="{{ $seo['salary'] }}" @endif>
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
