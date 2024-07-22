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
              <li class="breadcrumb-item"><a href="">Resources</a></li>
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
                
                <form name="portfolioForm" id="portfolioForm" @if(empty($portfolio['id'])) action="{{ url('admin/resources/add-edit-portfolio') }}" @else action="{{ url('admin/resources/add-edit-portfolio/'.$portfolio['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Portfolio Title" required @if(!empty($portfolio['title'])) value="{{ $portfolio['title'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label>Category*</label>
                        <select class="form-control" style="width: 100%;" name="category_id" required id="portcat">
                            <option value="">Select Category</option>
                            @foreach ($portfolio_category as $row)
                              <option value="{{ $row['id'] }}" @if($row['id'] == $portfolio['cat_id']) selected @endif>{{ $row['name'] }}</option>
                            @endforeach
                          
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Sub Category*</label>
                        <select class="form-control" style="width: 100%;" name="subcategory_id" required id="portsubcat">
                            <option value="">Select Sub Category</option>
                            @if(!empty($portfolio_subcategory))
                              @foreach ($portfolio_subcategory as $row)
                                <option value="{{ $row['id'] }}" @if($row['id'] == $portfolio['sub_cat_id']) selected @endif>{{ $row['name'] }}</option>
                              @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="website">Website link*</label>
                        <input type="url" class="form-control" id="website" name="website" placeholder="Enter Website Link" required @if(!empty($portfolio['website_link'])) value="{{ $portfolio['website_link'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="content">Short Description*</label>
                        <textarea name="content" class="form-control" required rows="3" cols="6" id="content" placeholder="Enter Content">@if(!empty($portfolio['content'])) {{ $portfolio['content'] }} @endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="portfolio_image">Image*</label>
                        <div class="input-group">
                          <input type="file" class="form-control" id="portfolio_image" name="portfolio_image" @if(empty($portfolio['image'])) required @endif>
                        </div>
                        <ul>
                          <li>Image Size should not be greater than 100KB</li>
                          <li>Image Dimensions should be 200 X 265px</li>
                        </ul>
                        @if (!empty($portfolio['image']))
                          <label>Previous Image</label><br>
                          <img src="{{ url('admin/img/portfolio-images/'.$portfolio['image']) }}" height="100px" width="180px">
                          <input type="hidden" name="current_image" value="{{ $portfolio['image'] }}">
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="r_status" @if(empty($portfolio['id'])) checked @else @if($portfolio['r_status'] != 0) checked @endif @endif>
                        <label for="status">Show on Main Page</label>
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
