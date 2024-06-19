@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$title}}
                <span id="casestudyviewbtn"></span>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success:</strong>{{ Session::get('success_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
       
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section1-tab" data-toggle="pill" href="#custom-tabs-section1" role="tab" aria-controls="custom-tabs-section1" aria-selected="true">Section 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-section2-tab" data-toggle="pill" href="#custom-tabs-section2" role="tab" aria-controls="custom-tabs-section2" aria-selected="false">Section 2</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">

                  <div class="tab-pane fade show" id="custom-tabs-section1" role="tabpanel" aria-labelledby="custom-tabs-section1-tab">
                   
                     <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary mt-2">
                            <div class="card-header">
                              <h3 class="card-title">Create Section 1</h3>

                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="section1" class="sectionSubmit" enctype="multipart/form-data">@csrf
                              <div class="card-body">
                                {{-- <div class="form-group">
                                  <label for="name">Category</label>
                                  <select class="form-control" name="catid" required>
                                    <option value="">Select Case Study Category</option>
                                    @foreach ($category as $row)
                                      <option value="{{$row['id']}}" @if($casestudy['category_id'] == $row['id']) selected @endif>{{$row['name']}}</option>
                                    @endforeach
                                  </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>Select Page*</label>
                                    <select class="form-control" style="width: 100%;" name="page_id" required>
                                        <option value="">Select Inner Page</option>
                                          @foreach ($allInnerPages as $row)
                                            <option value="{{ $row['id'] }}" @if($row['id'] == $casestudy['page_id']) selected @endif>{{ $row['page_name'] }}</option>
                                          @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="name">Case Study Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Case Study Name" required readonly @if(!empty($casestudy['name'])) value="{{$casestudy['name']}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="bannerImage">Banner Image</label>
                                    <input type="file" class="form-control" name="bannerImage" id="bannerImage">
                                </div>
                                <ul>
                                  <li>Banner Size should not be greater than 100KB</li>
                                  <li>Banner Dimensions should be 573 X 226px</li>
                                </ul>
                                @if (!empty($casestudy['bannerImage']))
                                  <label>Previous Image</label><br>
                                  <img src="{{ url('images/casestudy/bannerImage/'.$casestudy['bannerImage']) }}" height="100px" width="180px">
                                  <input type="hidden" name="current_image" value="{{ $casestudy['bannerImage'] }}">
                                @endif
                                <input type="hidden" name="section" value="1">
                                <input type="hidden" name="casestudyId" value="{{$casestudy['id']}}">                
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="section1">Submit</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.card -->
              
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="tab-pane fade show active" id="custom-tabs-section2" role="tabpanel" aria-labelledby="custom-tabs-section2-tab">
                    <!-- hero section start -->

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary mt-2">
                            <div class="card-header">
                              <h3 class="card-title">Enter Case study file code</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('admin/add-edit-case-study/'.$casestudy['id']) }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <textarea id="codeMirrorDemo" name="filecode" required>
                                            @if(!empty($casestudy['filecode']))
                                                {{htmlspecialchars_decode($casestudy['filecode'])}} 
                                            @else
                                                <section>
                                                    Write Code Here...
                                                </section>
                                            @endif
                                        </textarea>
                                    </div>
                                    
                                    <input type="hidden" name="section" value="2">        
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                    <button type="submit" name="section2" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                          </div>
                          <!-- /.card -->
              
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                  </div>

                </div>
              </div>
              <!-- /.card -->
            </div>
        </div>

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
