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
              <a href="/admin/jobs" type="button" class="btn btn-primary">
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
                
                <form @if(empty($job['id'])) action="{{ url('admin/add-edit-job') }}" @else action="{{ url('admin/add-edit-job/'.$job['id']) }}" @endif method="post">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Job Title*</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Job Title" required @if(!empty($job['title'])) value="{{ $job['title'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="industry">Industry*</label>
                            <input type="text" class="form-control" name="industry" placeholder="Enter Industry" required @if(!empty($job['industry'])) value="{{ $job['industry'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation*</label>
                            <input type="text" class="form-control" name="designation" placeholder="Enter Designation" required @if(!empty($job['designation'])) value="{{ $job['designation'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="location">Location*</label>
                            <select class="form-control" name="location" required>
                                <option>Select Location</option>
                                @foreach ($states as $state)
                                  <option value="{{$state['name']}}" @if($state['name'] == $job['location']) selected @endif>{{$state['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="profile">Job Profile*</label>
                            <textarea class="form-control" name="job_profile" required>@if(!empty($job['job_profile'])) {{ $job['job_profile'] }} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label for="skills">Skills*</label>
                            <textarea class="form-control" name="skills" required>@if(!empty($job['skills'])) {{ $job['skills'] }} @endif</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postedOn">Posted On*</label>
                                    <input type="date" class="form-control" name="posted_on" required @if(!empty($job['posted_on'])) value="{{ $job['posted_on'] }}" @endif>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="positions">Number Of Positions*</label>
                                    <select class="form-control" name="positions" required>
                                        <option>Select number of positions</option>
                                        @for ($i=1; $i<=5; $i++)
                                            <option value="{{$i}}" @if($i == $job['num_of_post']) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="experience">Experience*</label>
                                    <select class="form-control" name="experience" required>
                                        <option>Select Experience</option>
                                        @for ($i=1; $i<=10; $i++)
                                            <option value="{{$i}}" @if($i == $job['experience']) selected @endif>{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="qualification">Qualification*</label>
                            <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification" required @if(!empty($job['qualification'])) value="{{ $job['qualification'] }}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary Offered*</label>
                            <input type="text" class="form-control" name="salary" value="Best in the Industry" required readonly>
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
