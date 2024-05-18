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
                
                <form @if(empty($testimonial['id'])) action="{{ url('admin/add-edit-testimonial') }}" @else action="{{ url('admin/add-edit-testimonial/'.$testimonial['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="name">Customer Name*</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Customer Name" required @if(!empty($testimonial['customer_name'])) value="{{ $testimonial['customer_name'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="info">Customer Info*</label>
                        <input type="text" class="form-control" id="info" name="info" placeholder="Enter Customer Info" required @if(!empty($testimonial['customer_info'])) value="{{ $testimonial['customer_info'] }}" @endif>
                    </div>
                    <div class="form-group">
                        <label for="testType">Testimonial Type*</label>
                        <select class="form-control" name="type" id="testType" required>
                            {{-- <option value="null">Select Type</option> --}}
                            <option value="text" @if($testimonial['type'] == "text") selected @endif>Text</option>
                            {{-- <option value="video" @if($testimonial['type'] == "video") selected @endif>Video</option> --}}
                        </select>
                    </div>
                    <div id="">
                        <div class="form-group">
                            <label>Select Page*</label>
                            <select class="form-control" style="width: 100%;" name="page_id" required>
                                <option value="">Select Inner Page</option>
                                  @foreach ($allInnerPages as $row)
                                    <option value="{{ $row['id'] }}" @if($row['id'] == $testimonial['page_id']) selected @endif>{{ $row['page_name'] }}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rating">Ratings*</label>
                            <select class="form-control" name="rating" id="testRating">
                                <option value="">Select Rating</option>
                                <option value="1" @if($testimonial['ratings'] == "1") selected @endif>1</option>
                                <option value="2" @if($testimonial['ratings'] == "2") selected @endif>2</option>
                                <option value="3" @if($testimonial['ratings'] == "3") selected @endif>3</option>
                                <option value="4" @if($testimonial['ratings'] == "4") selected @endif>4</option>
                                <option value="5" @if($testimonial['ratings'] == "5") selected @endif>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Testimonial Comment*</label>
                            <textarea class="form-control" name="comment" placeholder="Enter client comment" id="testComment">@if(!empty($testimonial['comment'])) {{ $testimonial['comment'] }} @endif</textarea>
                        </div>
                    </div>
                    <div id="testVideo">
                        <div class="form-group">
                            <label for="">Video Url</label>
                            <input type="url" class="form-control" name="video_url" id="testUrl" placeholder="Enter video url" @if(!empty($testimonial['video_url'])) value="{{ $testimonial['video_url'] }}" @endif>
                        </div>
                    </div>

                    @if($testimonial['id'])
                        <div id="editdata">
                            @if($testimonial['type'] == "text")
                                <div class="form-group">
                                    <label for="rating">Ratings*</label>
                                    <select class="form-control" name="rating" id="testRating">
                                        <option value="">Select Rating</option>
                                        <option value="1" @if($testimonial['ratings'] == "1") selected @endif>1</option>
                                        <option value="2" @if($testimonial['ratings'] == "2") selected @endif>2</option>
                                        <option value="3" @if($testimonial['ratings'] == "3") selected @endif>3</option>
                                        <option value="4" @if($testimonial['ratings'] == "4") selected @endif>4</option>
                                        <option value="5" @if($testimonial['ratings'] == "5") selected @endif>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Testimonial Comment*</label>
                                    <textarea class="form-control" name="comment" placeholder="Enter client comment" id="testComment">@if(!empty($testimonial['comment'])) {{ $testimonial['comment'] }} @endif</textarea>
                                </div>
                            @elseif($testimonial['type'] == "video")
                                <div class="form-group">
                                    <label for="">Video Url</label>
                                    <input type="url" class="form-control" name="video_url" id="testUrl" placeholder="Enter video url" @if(!empty($testimonial['video_url'])) value="{{ $testimonial['video_url'] }}" @endif>
                                </div>
                            @endif
                        </div>
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
