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
              <li class="breadcrumb-item">Our Work</li>
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
                
                <form @if(empty($blog['id'])) action="{{ url('admin/add-edit-blog') }}" @else action="{{ url('admin/add-edit-blog/'.$blog['id']) }}" @endif method="post">@csrf
                    <div class="card-body">
                      <div class="form-group">
                          <label>Select Page*</label>
                          <select class="form-control" style="width: 100%;" name="page_id" required>
                              <option value="">Select Inner Page</option>
                                @foreach ($allInnerPages as $row)
                                  <option value="{{ $row['id'] }}" @if($row['id'] == $blog['page_id']) selected @endif>{{ $row['page_name'] }}</option>
                                @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                            <label for="question">Select Blog*</label>
                            <select class="form-control" style="width: 100%;" name="blog_id" required>
                                <option value="">Select Blog</option>
                                @foreach ($posts as $row)
                                    <option value="{{ $row['id'] }}" @if($row['id'] == $blog['blog_id']) selected @endif>{{ $row['title']['rendered'] }}</option>
                                @endforeach
                            </select>
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
