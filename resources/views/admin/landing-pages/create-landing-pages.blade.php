@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Landing Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Create Landing Pages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
        <div class="col-12 col-sm-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-section1-tab" data-toggle="pill" href="#custom-tabs-section1" role="tab" aria-controls="custom-tabs-section1" aria-selected="true">Section 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-section2-tab" data-toggle="pill" href="#custom-tabs-section2" role="tab" aria-controls="custom-tabs-section2" aria-selected="false">Section 2</a>
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
                  <div class="tab-pane fade show active" id="custom-tabs-section1" role="tabpanel" aria-labelledby="custom-tabs-section1-tab">
                     <h3>Section 1</h3>
                     <div class="row">
                        <div class="col-md-12">
                            
                                <nav class="navbar navbar-expand-lg" style="background-color: #FFFFFF;">
                                    <div class="container">
                                        <a class="navbar-brand w-25" href="#"><img class="w-75" id="output-logo" src="{{ url('admin/img/tech2globe-logo.jpg') }}" alt=""></a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav ms-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href="#our-services"><span id="outputMenu1"></span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#why-choose"><span id="outputMenu2"></span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#our-customers"><span id="outputMenu3"></span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#our-contact"><span id="outputMenu4"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            
                        </div>
                     </div>
                     <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary mt-5">
                            <div class="card-header">
                              <h3 class="card-title">Create Section 1</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('admin/create-landing-pages') }}" method="post" enctype="multipart/form-data">@csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="menu1">Menu 1</label>
                                  <input type="text" class="form-control" id="menu1" name="menu1" placeholder="Enter Menu 1" value="What We Do">
                                </div>
                                <div class="form-group">
                                  <label for="menu2">Menu 2</label>
                                  <input type="text" class="form-control" name="menu2" id="menu2" placeholder="Enter Menu 2" value="Why Choose Tech2globe">
                                </div>
                                <div class="form-group">
                                    <label for="menu3">Menu 3</label>
                                    <input type="text" class="form-control" name="menu3" id="menu3" placeholder="Enter Menu 3" value="Our Customers">
                                </div>
                                <div class="form-group">
                                    <label for="menu4">Menu 4</label>
                                    <input type="text" class="form-control" name="menu4" id="menu4" placeholder="Enter Menu 4" value="Contact Us">
                                </div> 
                                <div class="form-group">
                                    <label for="favicon_icon">Favicon Icon</label>
                                    <input type="file" class="form-control" name="favicon_icon" id="favicon_icon">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                </div>                
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                            </form>
                          </div>
                          <!-- /.card -->
              
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                  </div>
                  <div class="tab-pane fade show" id="custom-tabs-section2" role="tabpanel" aria-labelledby="custom-tabs-section2-tab">
                    <h3>Section 2</h3>
                    <!-- hero section start -->

                    <section class="section-a" style="height: 420px;">
                        <div class="background-feature-image position-relative">
                          <img src="{{ url('landing_page/images/banner-1.jpg') }}" id="outputBackground_image2" alt="" style="background-size: cover; width: 100%; position: absolute; height: 100%;" />
                            <div class="container">
                                <div class="row sub-section-a d-flex justify-content-between align-items-center">
                                    <div class="col-md-7 col-lg-7 col-xl-7 col-xxl-7 col-sm-12 col-xs-12">
                                        <h1 class="text-dark main-heading" style="color: #000000;"><span id="outputTitle2"></span></h1>
                                        <p class="" style="color: #f26e4f;"><span id="outputSub_title2"></span></p>
                                        <div class="button-container">
                                            <a href="#our-contact" class="main-button"><span id="outputButton1"></span></a>
                                            <a href="tel:+1-250-206-8787" class="main-button call-us-btn"><span id="outputButton2"></span></a>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-lg-5 col-xl-5 col-xxl-5 col-sm-12 col-xs-12">
                                        <figure class="w-100">
                                            <img class="w-100" style="border-radius: 20px;" id="outputBanner_image2" src="{{ url('landing_page/images/businesswomen.jpg') }}" alt="">
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- hero section end -->
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                          <!-- general form elements -->
                          <div class="card card-primary mt-5">
                            <div class="card-header">
                              <h3 class="card-title">Create Section 2</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ url('admin/create-landing-pages') }}" method="post">@csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="title2">Title</label>
                                  <input type="text" class="form-control" id="title2" name="title2" placeholder="Enter Title" value="Virtual Assistants Are the Solution For Your Business">
                                </div>
                                <div class="form-group">
                                  <label for="sub_title2">Sub Title</label>
                                  <input type="text" class="form-control" name="sub_title2" id="sub_title2" placeholder="Enter Subtitle" value="Get In Touch With Us Today">
                                </div>
                                <div class="form-group">
                                    <label for="button1">Button 1</label>
                                    <input type="text" class="form-control" name="button1" id="button1" placeholder="Enter Button Content" value="GET STARTED">
                                </div>
                                <div class="form-group">
                                    <label for="button2">Button 2</label>
                                    <input type="text" class="form-control" name="button2" id="button2" placeholder="Enter Button Content" value="CALL US">
                                </div>
                                <div class="form-group">
                                    <label for="background_image2">Banner Background Image</label>
                                    <input type="file" class="form-control" name="background_image2" id="background_image2">
                                </div>
                                <div class="form-group">
                                    <label for="banner_image2">Banner Upper Image</label>
                                    <input type="file" class="form-control" name="banner_image2" id="banner_image2">
                                </div>                  
                              </div>
                              <!-- /.card-body -->
              
                              <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                    <h3>Section 3</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section4" role="tabpanel" aria-labelledby="custom-tabs-section4-tab">
                    <h3>Section 4</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section5" role="tabpanel" aria-labelledby="custom-tabs-section5-tab">
                    <h3>Section 5</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section6" role="tabpanel" aria-labelledby="custom-tabs-section6-tab">
                    <h3>Section 6</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section7" role="tabpanel" aria-labelledby="custom-tabs-section7-tab">
                    <h3>Section 7</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section8" role="tabpanel" aria-labelledby="custom-tabs-section8-tab">
                    <h3>Section 8</h3>
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section9" role="tabpanel" aria-labelledby="custom-tabs-section9-tab">
                    <h3>Section 9</h3>
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
