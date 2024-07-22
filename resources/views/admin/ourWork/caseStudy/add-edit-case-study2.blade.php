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
                
                <form @if(empty($casestudy['id'])) action="{{ url('admin/add-edit-case-study') }}" @else action="{{ url('admin/add-edit-case-study/'.$casestudy['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label>Select Page*</label>
                          <select class="form-control" style="width: 100%;" name="page_id" required>
                              <option value="">Select Inner Page</option>
                                @foreach ($allInnerPages as $row)
                                  <option value="{{ $row['id'] }}" @if($row['id'] == $casestudy['page_id']) selected @endif>{{ $row['page_name'] }} | {{$row['page_url']}}</option>
                                @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="portfolio_id">Select Casestudy*</label>
                        @if(empty($casestudy['id']))
                          <select class="form-control" name="casestudy_id" required>
                              <option value="">Select Casestudy</option>
                              @foreach ($allCasestudy as $row)
                                  <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                              @endforeach
                          </select> 
                        @else
                          @foreach ($allCasestudy as $row)
                            @if ($row['id'] == $casestudy['id'])
                              <input type="text" class="form-control" value="{{ $row['name'] }}" readonly>
                              <input type="hidden" name="casestudy_id" value="{{ $row['id'] }}">
                            @endif
                          @endforeach
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
