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
                
                <form name="portfolioForm" id="portfolioForm" @if(empty($portfolio['id'])) action="{{ url('admin/add-edit-portfolio') }}" @else action="{{ url('admin/add-edit-portfolio/'.$portfolio['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Portfolio Title" required @if(!empty($portfolio['title'])) value="{{ $portfolio['title'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label>Category*</label>
                        <select class="form-control" style="width: 100%;" name="category_id" required>
                            <option value="">Select Category</option>
                            @foreach ($portfolio_category as $row)
                              <option value="{{ $row['id'] }}" @if($row['id'] == $portfolio['cat_id']) selected @endif>{{ $row['category'] }}</option>
                            @endforeach
                          
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="technology">Technology</label>
                        <input type="text" class="form-control" id="technology" name="technology" placeholder="Enter Technology" @if(!empty($portfolio['technology'])) value="{{ $portfolio['technology'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="website">Website link*</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="Enter Website Link" required @if(!empty($portfolio['website_link'])) value="{{ $portfolio['website_link'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" class="form-control" rows="3" cols="6" id="content" placeholder="Enter Content">@if(!empty($portfolio['content'])) {{ $portfolio['content'] }} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="portfolio_image">Image*</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="portfolio_image" name="portfolio_image" @if(empty($portfolio['image'])) required @endif>
                            <label class="custom-file-label" for="image">Choose Image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                        </div>
                        @if (!empty($portfolio['image']))
                          <label>Previous Image</label><br>
                          <img src="{{ url('admin/img/portfolio-images/'.$portfolio['image']) }}" height="100px" width="180px">
                          <input type="hidden" name="current_image" value="{{ $portfolio['image'] }}">
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
