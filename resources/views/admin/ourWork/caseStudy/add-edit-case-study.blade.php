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
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section3-tab" data-toggle="pill" href="#custom-tabs-section3" role="tab" aria-controls="custom-tabs-section3" aria-selected="false">Section 3</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section4-tab" data-toggle="pill" href="#custom-tabs-section4" role="tab" aria-controls="custom-tabs-section4" aria-selected="false">Section 4</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section5-tab" data-toggle="pill" href="#custom-tabs-section5" role="tab" aria-controls="custom-tabs-section5" aria-selected="false">Section 5</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section6-tab" data-toggle="pill" href="#custom-tabs-section6" role="tab" aria-controls="custom-tabs-section6" aria-selected="false">Section 6</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section7-tab" data-toggle="pill" href="#custom-tabs-section7" role="tab" aria-controls="custom-tabs-section7" aria-selected="false">Section 7</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section8-tab" data-toggle="pill" href="#custom-tabs-section8" role="tab" aria-controls="custom-tabs-section8" aria-selected="false">Section 8</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section9-tab" data-toggle="pill" href="#custom-tabs-section9" role="tab" aria-controls="custom-tabs-section9" aria-selected="false">Section 9</a>
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
                                <div class="form-group">
                                  <label for="name">Category</label>
                                  <select class="form-control" name="catid" required>
                                    <option value="">Select Case Study Category</option>
                                    @foreach ($category as $row)
                                      <option value="{{$row['id']}}" @if($casestudy['category_id'] == $row['id']) selected @endif>{{$row['name']}}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="name">Case Study Name</label>
                                  <input type="text" class="form-control" name="name" placeholder="Enter Case Study Name" required readonly @if(!empty($casestudy['name'])) value="{{$casestudy['name']}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="bannerImage">Banner Image</label>
                                    <input type="file" class="form-control" name="bannerImage" id="bannerImage" required>
                                </div>
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
                    <h3>Project Overview</h3>
                    <!-- hero section start -->

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary mt-2">
                            <div class="card-header">
                              <h3 class="card-title">Create Section 2 </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="sectionSubmit">@csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="description">Project Description</label>
                                        <textarea class="form-control" name="description" placeholder="Enter Project Description" required>@if(!empty($casestudy['projectDescription'])) {{$casestudy['projectDescription']}} @endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="cproblem">Client's Problem</label>
                                        <input type="text" class="form-control" name="cproblem" id="cproblem" placeholder="Enter Client Problem" required @if(!empty($casestudy['client_problem'])) value="{{$casestudy['client_problem']}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="tsolution">Tech2Globe's Solution</label>
                                        <input type="text" class="form-control" name="tsolution" id="tsolution" placeholder="Enter Tech2Globe's Solution" required @if(!empty($casestudy['tech2globe_solution'])) value="{{$casestudy['tech2globe_solution']}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="kmilestones">Key Milestones</label>
                                        <input type="text" class="form-control" name="kmilestones" id="kmilestones" placeholder="Enter Key Milestones" required @if(!empty($casestudy['key_milestones'])) value="{{$casestudy['key_milestones']}}" @endif>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="csatisfiction">Client Satisfaction</label>
                                            <input type="number" class="form-control" name="csatisfiction" id="csatisfiction" placeholder="Enter Client Satisfaction out of 10" required @if(!empty($casestudy['client_satisfaction'])) value="{{$casestudy['client_satisfaction']}}" @endif>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pduration">Project Duration (in Days)</label>
                                            <input type="number" class="form-control" name="pduration" id="pduration" placeholder="Enter Project Duration" required @if(!empty($casestudy['project_duration'])) value="{{$casestudy['project_duration']}}" @endif>
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mprocessed">Menus Processed</label>
                                            <input type="text" class="form-control" name="mprocessed" id="mprocessed" placeholder="Enter Menus Processed" required @if(!empty($casestudy['menues_processed'])) value="{{$casestudy['menues_processed']}}" @endif>
                                        </div>  
                                      </div>
                                    </div>
                                    <input type="hidden" name="section" value="2">
                                    <input type="hidden" name="casestudyId" value="{{$casestudy['id']}}">          
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

                  <div class="tab-pane fade show" id="custom-tabs-section3" role="tabpanel" aria-labelledby="custom-tabs-section3-tab">
                    <h3>About</h3>

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Section 3</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="sectionSubmit" enctype="multipart/form-data">@csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="aheading">Heading</label>
                                        <input type="text" class="form-control" id="aheading" name="aheading" placeholder="Enter About Heading" @if(!empty($casestudy['about_heading'])) value="{{$casestudy['about_heading']}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="adescription">Description</label>
                                        <textarea class="form-control" name="adescription" placeholder="Enter About Description" required>@if(!empty($casestudy['about_description'])) {{$casestudy['about_description']}} @endif</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="aimage">About Image</label>
                                        <input class="form-control" type="file" name="aimage" @if(empty($casestudy['about_image'])) required @endif>
                                    </div>
                                    
                                    @if (!empty($casestudy['about_image']))
                                      <label>Previous Image</label><br>
                                      <img src="{{ url('images/casestudy/aboutImage/'.$casestudy['about_image']) }}" height="100px" width="180px">
                                      <input type="hidden" name="current_image" value="{{ $casestudy['about_image'] }}">
                                    @endif
                                    
                                    <input type="hidden" name="section" value="3">
                                    <input type="hidden" name="casestudyId" value="{{$casestudy['id']}}"> 
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                <button type="submit" name="section3" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.card -->
                
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section4" role="tabpanel" aria-labelledby="custom-tabs-section4-tab">

                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                  <h3 class="card-title">Create Section 4</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form class="sectionSubmit">@csrf
                                  <div class="card-body">

                                    <div class="form-group">
                                      <label for="">Section 4 Heading</label>
                                      <input type="text" class="form-control" name="heading4" placeholder="Enter Section Heading" required @if(!empty($casestudy['heading4'])) value="{{$casestudy['heading4']}}" @endif>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Short Description</label>
                                        <textarea class="form-control" name="description4" placeholder="Enter Section Short Description" required>@if(!empty($casestudy['description4'])) {{$casestudy['description4']}} @endif</textarea>
                                    </div>

                                    <div id="section4card">
                                  
                                      <div class="card card-info card-outline">
                                          <a class="d-block w-100" data-toggle="collapse" href="#card1">
                                              <div class="card-header">
                                                  <h4 class="card-title w-100">
                                                      Card 1
                                                  </h4>
                                              </div>
                                          </a>
                                          <div id="card1" class="collapse show" data-parent="#section4card">
                                              <div class="card-body">
                                                  <div class="form-group">
                                                      <label for="cardheading">Heading</label>
                                                      <input type="text" class="form-control" name="cardHeading[]" placeholder="Enter Card Heading" required>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="clientMessage1">Content</label>
                                                    <textarea class="form-control" name="cardContent[]" placeholder="Enter Card Content" required></textarea>
                                                </div>
                                              </div>
                                          </div>

                                      </div>
                                  
                                    </div>
                                    <input type="button" class="btn btn-info" id="cardAddButton" value="+ Click to add Card">   
                                    
                                    <input type="hidden" name="section" value="4">
                                    <input type="hidden" name="casestudyId" value="{{$casestudy['id']}}">
                                                
                                  </div>
                                  <!-- /.card-body -->
                  
                                  <div class="card-footer">
                                  <button type="submit" name="section4" class="btn btn-primary">Submit</button>
                                  </div>
                              </form>
                            </div>
                            <!-- /.card -->
                
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section5" role="tabpanel" aria-labelledby="custom-tabs-section5-tab">

                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-2">
                            <div class="card-header">
                                <h3 class="card-title">Create Section 5</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="sectionSubmit" enctype="multipart/form-data">@csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="heading5">Section 5 Heading</label>
                                        <input type="text" class="form-control" name="heading5" required @if(!empty($casestudy['heading5'])) value="{{$casestudy['heading5']}}" @endif>
                                    </div>
                                    <div class="form-group">
                                        <label for="title5">Content</label>
                                        <textarea class="summernote" rows="5" cols="50" name="content5" required>
                                            @if(!empty($casestudy['content5']))
                                             {{$casestudy['content5']}}
                                            @else
                                              Place <em>some</em> <u>text</u> <strong>here</strong>
                                            @endif
                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="image5">Image</label>
                                        <input type="file" class="form-control" name="image5" required>
                                    </div> 
                                    @if (!empty($casestudy['image5']))
                                      <label>Previous Image</label><br>
                                      <img src="{{ url('images/casestudy/bannerImage/'.$casestudy['image5']) }}" height="100px" width="180px">
                                      <input type="hidden" name="current_image" value="{{ $casestudy['image5'] }}">
                                    @endif  
                                    <input type="hidden" name="section" value="5">
                                    <input type="hidden" name="casestudyId" value="{{$casestudy['id']}}">         
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                    <button type="submit" name="section5" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
            
                      </div>
                      <!--/.col (left) -->
                  </div>
                  <!-- /.row -->
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section6" role="tabpanel" aria-labelledby="custom-tabs-section6-tab">
                 
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary mt-2">
                            <div class="card-header">
                                <h3 class="card-title">Create Section 6</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="" enctype="multipart/form-data">@csrf
                                <div class="card-body">
                                <div class="form-group">
                                    <label for="heading6">Section 6 Heading</label>
                                    <input type="text" class="form-control" name="heading6" placeholder="Enter Section 6 Heading" @if(!empty($casestudy['heading6'])) value="{{$casestudy['heading6']}}" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="sdescription6">Short Description</label>
                                    <textarea class="summernote" rows="5" cols="50" name="sdescription6" required>
                                        @if(!empty($casestudy['sdescription6']))
                                          {{$casestudy['sdescription6']}}
                                        @else
                                          Place <em>some</em> <u>text</u> <strong>here</strong>
                                        @endif
                                    </textarea>
                                </div>

                                <div id="icard">
                                
                                    <div class="card card-info card-outline">
                                        <a class="d-block w-100" data-toggle="collapse" href="#collapse1">
                                            <div class="card-header">
                                                <h4 class="card-title w-100">
                                                    Card 1
                                                </h4>
                                            </div>
                                        </a>
                                        <div id="collapse1" class="collapse show" data-parent="#icard">
                                            <div class="card-body">
                                                <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="clientName1">Icon</label>
                                                        <input type="text" class="form-control" name="clientName1" placeholder="Enter Client Name">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label for="clientPost1">Heading</label>
                                                        <input type="text" class="form-control" name="clientPost1" placeholder="Enter Client Post">
                                                      </div>
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="clientMessage1">Content</label>
                                                    <textarea class="form-control" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                
                                    <input type="button" class="btn btn-info" id="testimonialAddButton" value="+ Click to add Testimonial">               
                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                    <button type="submit" name="section6" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            </div>
                            <!-- /.card -->
                
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section7" role="tabpanel" aria-labelledby="custom-tabs-section7-tab">
                    <h3>Project Outcomes</h3>

                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 7</h3>

                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form id="" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title7">Title</label>
                                <input type="text" class="form-control" id="title7" name="title7" placeholder="Enter Title" @if(!empty($casestudy['title7'])) value="{{$casestudy['title7']}}" @else value="Get Started with Remote Professionals Today" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField1">Input Field 1</label>
                                <input type="text" class="form-control" name="inputField1" id="inputField1" placeholder="Enter Input Field 1"  @if(!empty($casestudy['inputfield1'])) value="{{$casestudy['inputfield1']}}" @else value="First Name" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField2">Input Field 2</label>
                                <input type="text" class="form-control" name="inputField2" id="inputField2" placeholder="Enter Input Field 2"  @if(!empty($casestudy['inputfield2'])) value="{{$casestudy['inputfield2']}}" @else value="Last Name" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField3">Input Field 3</label>
                                <input type="text" class="form-control" name="inputField3" id="inputField3" placeholder="Enter Input Field 3"  @if(!empty($casestudy['inputfield3'])) value="{{$casestudy['inputfield3']}}" @else value="Official Email" @endif>
                              </div> 
                              <div class="form-group">
                                <label for="imputField4">Input Field 4</label>
                                <input type="text" class="form-control" name="inputField4" id="inputField4" placeholder="Enter Input Field 4"  @if(!empty($casestudy['inputfield4'])) value="{{$casestudy['inputfield4']}}" @else value="1111-000-1234" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField5">Input Field 5</label>
                                <input type="text" class="form-control" name="inputField5" id="inputField5" placeholder="Enter Input Field 5"  @if(!empty($casestudy['inputfield5'])) value="{{$casestudy['inputfield5']}}" @else value="Message" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField6">Input Field 6</label>
                                <input type="text" class="form-control" name="inputField6" id="inputField6" placeholder="Enter Input Field 6"  @if(!empty($casestudy['inputfield6'])) value="{{$casestudy['inputfield6']}}" @else value="Submit" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="background_image7">Background Image</label>
                                  <input type="file" class="form-control" name="background_image7" id="background_image7">
                              </div>                
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" name="section7" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.card -->
            
                      </div>
                      <!--/.col (left) -->
                  </div>
                  <!-- /.row -->
                 </div> 
                 <div class="tab-pane fade show" id="custom-tabs-section8" role="tabpanel" aria-labelledby="custom-tabs-section8-tab">
                    <h3>Section 8</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <style>
                       .have-query-section {
                            width: 100%;
                            height: auto;
                            background-color: rgba(36, 106, 178, .75);
                            @if(!empty($casestudy['background_image8']))
                              background-image: url('/images/background/{{$casestudy['background_image8']}}');
                            @else
                              background-image: url('/landing_page/images/footer-abstract.jpg');
                            @endif
                            background-blend-mode: multiply;
                            background-position: center center;
                            background-size: cover;
                            background-repeat: no-repeat;
                            padding-block: 100px;
                        }
                        </style>
                           <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading" id="outputTitle8">@if(!empty($casestudy['title8'])) {{$casestudy['title8']}} @else Have Queries? @endif</h3>
                                          <small class="text-white text-center w-100 d-block pb-5" id="outputSubTitle8">@if(!empty($casestudy['sub_title8'])) {{$casestudy['sub_title8']}} @else Get A Call Back Today! @endif</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" id="outputField1" @if(!empty($casestudy['field1'])) placeholder="{{$casestudy['field1']}}" @else placeholder="Name" @endif required>
                                                  <input type="tel" id="outputField2" @if(!empty($casestudy['field2'])) placeholder="{{$casestudy['field2']}}" @else placeholder="Phone Number" @endif required>
                                                  <input type="submit" id="outputField3" @if(!empty($casestudy['field3'])) value="{{$casestudy['field3']}}" @else value="submit" @endif>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- section-g start -->
                          
                      </div>
                   </div>
                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 8</h3>
                            @if($casestudy['section8_id']!="")
                              @if ($casestudy['status8']==1)
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-8" layout_id="{{$casestudy['id']}}" section_id="8" href="javascript:void(0)"><i class="fas fa-toggle-on fa-lg" status="Active">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Active</span></i></a>
                              @else
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-8" layout_id="{{$casestudy['id']}}" section_id="8" style="color: yellow;" href="javascript:void(0)"><i class="fas fa-toggle-off fa-lg" status="Inactive">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Inactive</span></i></a>
                              @endif
                            @endif
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$casestudy['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title8">Title</label>
                                <input type="text" class="form-control" id="title8" name="title8" placeholder="Enter Title" @if(!empty($casestudy['title8'])) value="{{$casestudy['title8']}}" @else value="Have Queries?" @endif required>
                              </div>
                              <div class="form-group">
                                <label for="subtitle8">Sub Title</label>
                                <input type="text" class="form-control" name="subtitle8" id="subtitle8" placeholder="Enter Sub Title" @if(!empty($casestudy['sub_title8'])) value="{{$casestudy['sub_title8']}}" @else value="Get A Call Back Today!" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="field1">Form Field 1</label>
                                  <input type="text" class="form-control" name="field1" id="field1" placeholder="Enter Form Field 1" @if(!empty($casestudy['field1'])) value="{{$casestudy['field1']}}" @else value="Name" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="field2">Form Field 2</label>
                                  <input type="text" class="form-control" name="field2" id="field2" placeholder="Enter Form Field 2" @if(!empty($casestudy['field2'])) value="{{$casestudy['field2']}}" @else value="Phone Number" @endif>
                              </div> 
                              <div class="form-group">
                                  <label for="field3">Form Field 3 (Submit Button)</label>
                                  <input type="text" class="form-control" name="field3" id="field3" placeholder="Enter Form Field 3" @if(!empty($casestudy['field3'])) value="{{$casestudy['field3']}}" @else value="Submit" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="background_image8">Background Image</label>
                                  <input type="file" class="form-control" name="background_image8" id="background_image8">
                              </div>                
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" name="section8" class="btn btn-primary">Submit</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.card -->
            
                      </div>
                      <!--/.col (left) -->
                  </div>
                  <!-- /.row -->
                 </div> 
                 <div class="tab-pane fade show" id="custom-tabs-section9" role="tabpanel" aria-labelledby="custom-tabs-section9-tab">
                    <h3>Section 9</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <div class="copyright-area">
                          <div class="container">
                              <div class="row">
                                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                      <p>&copy;<span id="outputContent9"> @if(!empty($casestudy['content9'])) {{$casestudy['content9']}} @else Copyright 2023 Tech2globe All rights reserved. @endif</span></p>
                                  </div>
                              </div>
                          </div>
                        </div>
                          
                      </div>
                   </div>
                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 9</h3>
                            @if($casestudy['section9_id']!="")
                              @if ($casestudy['status9']==1)
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-9" layout_id="{{$casestudy['id']}}" section_id="9" href="javascript:void(0)"><i class="fas fa-toggle-on fa-lg" status="Active">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Active</span></i></a>
                              @else
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-9" layout_id="{{$casestudy['id']}}" section_id="9" style="color: yellow;" href="javascript:void(0)"><i class="fas fa-toggle-off fa-lg" status="Inactive">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Inactive</span></i></a>
                              @endif
                            @endif
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$casestudy['id'].'') }}" method="post">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="content9">Copyright Content</label>
                                <input type="text" class="form-control" id="content9" name="content9" placeholder="Enter Copyright Content" @if(!empty($casestudy['content9'])) value="{{$casestudy['content9']}}" @else value="Copyright 2023 Tech2globe All rights reserved." @endif>
                              </div>               
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" name="section9" class="btn btn-primary">Submit</button>
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
