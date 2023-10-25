@extends('admin.layout.layout')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Landing Pages
                <a class="btn btn-primary" href="http://localhost:8000/{{ $layout['page_url'] }}" target="_blank">Visit Page</a>
            </h1>
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
                    <a class="nav-link" id="custom-tabs-seo-tab" data-toggle="pill" href="#custom-tabs-seo" role="tab" aria-controls="custom-tabs-seo" aria-selected="true">SEO Section</a>
                  </li>
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
                  <div class="tab-pane fade show" id="custom-tabs-seo" role="tabpanel" aria-labelledby="custom-tabs-seo-tab">
                    <h3>SEO Section</h3>
                  
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
                                 <label for="menu1old">Menu 1</label>
                                 <input type="text" class="form-control" id="menu1old" name="menu1old" placeholder="Enter Menu 1" value="What We Do">
                               </div>
                               <div class="form-group">
                                 <label for="menu2old">Menu 2</label>
                                 <input type="text" class="form-control" name="menu2old" id="menu2old" placeholder="Enter Menu 2" value="Why Choose Tech2globe">
                               </div>
                               <div class="form-group">
                                   <label for="menu3old">Menu 3</label>
                                   <input type="text" class="form-control" name="menu3old" id="menu3old" placeholder="Enter Menu 3" value="Our Customers">
                               </div>
                               <div class="form-group">
                                   <label for="menu4old">Menu 4</label>
                                   <input type="text" class="form-control" name="menu4old" id="menu4old" placeholder="Enter Menu 4" value="Contact Us">
                               </div> 
                               <div class="form-group">
                                   <label for="favicon_icon_old">Favicon Icon</label>
                                   <input type="file" class="form-control" name="favicon_icon_old" id="favicon_icon_old">
                               </div>
                               <div class="form-group">
                                   <label for="logo_old">logo_old</label>
                                   <input type="file" class="form-control" name="logo_old" id="logo_old">
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
                  <div class="tab-pane fade show active" id="custom-tabs-section1" role="tabpanel" aria-labelledby="custom-tabs-section1-tab">
                     <h3>Section 1</h3>
                   
                     <div class="row p-3" style="border: #FFFFFF solid 2px;">
                        <div class="col-md-12">
                          <p>Preview</p>
                                <nav class="navbar navbar-expand-lg" style="background-color: #FFFFFF;">
                                    <div class="container">
                                        <a class="navbar-brand w-25" href="#"><img width="auto" height="50px" id="output-logo" src="{{ url('images/logo/'.$layout['logo'].'') }}" alt=""></a>
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse" id="navbarNav">
                                            <ul class="navbar-nav ms-auto">
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page" href=""><span id="outputMenu1">@if(!empty($landingPage['menu1'])) {{$landingPage['menu1']}} @else What We Do @endif</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href=""><span id="outputMenu2">@if(!empty($landingPage['menu2'])) {{$landingPage['menu2']}} @else Why Choose Tech2Globe @endif</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href=""><span id="outputMenu3">@if(!empty($landingPage['menu3'])) {{$landingPage['menu3']}} @else Our Customers @endif</span></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href=""><span id="outputMenu4">@if(!empty($landingPage['menu4'])) {{$landingPage['menu4']}} @else Contact Us @endif</span></a>
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
                            <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="menu1">Menu 1</label>
                                  <input type="text" class="form-control" id="menu1" name="menu1" placeholder="Enter Menu 1" @if(!empty($landingPage['menu1'])) value="{{$landingPage['menu1']}}" @else value="What We Do" @endif>
                                </div>
                                <div class="form-group">
                                  <label for="menu2">Menu 2</label>
                                  <input type="text" class="form-control" name="menu2" id="menu2" placeholder="Enter Menu 2" @if(!empty($landingPage['menu2'])) value="{{$landingPage['menu2']}}" @else value="Why Choose Tech2globe" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="menu3">Menu 3</label>
                                    <input type="text" class="form-control" name="menu3" id="menu3" placeholder="Enter Menu 3" @if(!empty($landingPage['menu3'])) value="{{$landingPage['menu3']}}" @else value="Our Customers" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="menu4">Menu 4</label>
                                    <input type="text" class="form-control" name="menu4" id="menu4" placeholder="Enter Menu 4" @if(!empty($landingPage['menu4'])) value="{{$landingPage['menu4']}}" @else value="Contact Us" @endif>
                                </div> 
                                <div class="form-group">
                                    <label for="favicon_icon">Favicon Icon</label>
                                    <input type="file" class="form-control" name="favicon_icon" id="favicon_icon">
                                </div>
                                <div class="form-group">
                                    <label for="logo">logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo">
                                </div>                
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
                  <div class="tab-pane fade show" id="custom-tabs-section2" role="tabpanel" aria-labelledby="custom-tabs-section2-tab">
                    <h3>Section 2</h3>
                    <!-- hero section start -->
                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <section class="section-a" style="height: 420px;">
                            <div class="background-feature-image position-relative">
                              <img @if(!empty($landingPage['background_image2'])) src="{{ url('images/background/'.$landingPage['background_image2'].'') }}" @else src="{{ url('landing_page/images/banner-1.jpg') }}" @endif id="outputBackground_image2" alt="" style="background-size: cover; width: 100%; position: absolute; height: 100%;" />
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
                                                <img class="w-100" height="250px" style="border-radius: 20px;" id="outputBanner_image2" @if(!empty($landingPage['banner_image2'])) src="{{ url('images/banner/'.$landingPage['banner_image2'].'') }}" @else src="{{ url('landing_page/images/businesswomen.jpg') }}" @endif  alt="">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- hero section end -->
                      </div>
                    </div>

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
                            <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="title2">Title</label>
                                  <input type="text" class="form-control" id="title2" name="title2" placeholder="Enter Title" @if(!empty($landingPage['title2'])) value="{{$landingPage['title2']}}" @else value="Virtual Assistants Are the Solution For Your Business" @endif>
                                </div>
                                <div class="form-group">
                                  <label for="sub_title2">Sub Title</label>
                                  <input type="text" class="form-control" name="sub_title2" id="sub_title2" placeholder="Enter Subtitle" @if(!empty($landingPage['sub_title2'])) value="{{$landingPage['sub_title2']}}" @else value="Get In Touch With Us Today" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="button1">Button 1</label>
                                    <input type="text" class="form-control" name="button1" id="button1" placeholder="Enter Button Content" @if(!empty($landingPage['button1'])) value="{{$landingPage['button1']}}" @else value="GET STARTED" @endif>
                                </div>
                                <div class="form-group">
                                    <label for="button2">Button 2</label>
                                    <input type="text" class="form-control" name="button2" id="button2" placeholder="Enter Button Content" @if(!empty($landingPage['button2'])) value="{{$landingPage['button2']}}" @else value="CALL US" @endif>
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
                    <h3>Section 3</h3>

                    <style>
                      span#outputTitle3 {
                        position: relative;
                    }
                    span#outputTitle3::before {
                        position: absolute;
                        content: '';
                        width: 195px;
                        height: 2px;
                        background-color: #f26e4f;
                        bottom: 0;
                        left: 50%;
                        margin-left: -100px;
                    }
                      </style>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <!-- service section start -->
                        <section class="section-b" id="our-services" style="background-color: #FFFFFF; color: #000000;">
                          <div class="container padding-block-container">
                              <div class="row d-flex justify-content-center" id="outputServices">
                                  <h3 class="heading-3" style="align-text: center;"><span id="outputTitle3">@if(!empty($landingPage['title3'])) {{$landingPage['title3']}} @else Virtual Assistant Services We Offer @endif</span></h3><br>
                                  <p class="text-center pt-2 pb-2"><span id="outputDescription3">@if(!empty($landingPage['description3'])) {{$landingPage['description3']}} @else Curb the struggle of managing extensive administration tasks, and scale your business growth with contemporary solutions. Hire virtual assistants from the global service provider Tech2Globe Web Solutions. We utilize the latest tools, techniques, and processes to provide world-class and 100% accurate services. Furthermore, we allocate you tech-savvy and proactive VAs that have aptitude in various fields to run admin errands for you and support challenges that you may be facing. Our comprehensive solutions include, but are not limited to @endif</span></p>

                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card" style="background-color: #FFFFFF; color: #000000;">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" id="outputServiceIcon1" src="{{ url('landing_page/images/data-entry-service.png') }}" alt="" width="auto" height="50px">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center"><span id="outputServiceName1" style="color: #000000;"></span></h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark"><span id="outputServiceDescription1" style="color: #000000;"></span></p>
                                              <a href="" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>

                                  
                              </div>
                          </div>
                        </section>
                        <!-- service section end -->
                      </div>
                   </div>
                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 3</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title3">Title</label>
                                <input type="text" class="form-control" id="title3" name="title3" placeholder="Enter Title" @if(!empty($landingPage['title3'])) value="{{$landingPage['title3']}}" @else value="Virtual Assistant Services We Offer" @endif>
                              </div>
                              <div class="form-group">
                                <label for="description3">Description</label>
                                <input type="text" class="form-control" name="description3" id="description3" placeholder="Enter Description" @if(!empty($landingPage['description3'])) value="{{$landingPage['description3']}}" @else value="Curb the struggle of managing extensive administration tasks, and scale your business growth with contemporary solutions. Hire virtual assistants from the global service provider Tech2Globe Web Solutions. We utilize the latest tools, techniques, and processes to provide world-class and 100% accurate services. Furthermore, we allocate you tech-savvy and proactive VAs that have aptitude in various fields to run admin errands for you and support challenges that you may be facing. Our comprehensive solutions include, but are not limited to" @endif>
                              </div>
                              <div id="accordion">
                                <div class="card card-info card-outline">
                                  <a class="d-block w-100" data-toggle="collapse" href="#collapse1">
                                      <div class="card-header">
                                          <h4 class="card-title w-100">
                                              Service 1
                                          </h4>
                                      </div>
                                  </a>
                                  <div id="collapse1" class="collapse show" data-parent="#accordion">
                                        <div class="card-body">
                                          <div class="form-group">
                                            <label for="serviceName1">Service Name 1</label>
                                            <input type="text" class="form-control" name="serviceName1" id="serviceName1" placeholder="Enter Service Name" value="Data Entry Services">
                                        </div>
                                        <div class="form-group">
                                            <label for="serviceDescription1">Service small description 1</label>
                                            <input type="text" class="form-control" name="serviceDescription1" id="serviceDescription1" placeholder="Enter Service Description" value="We have been in the data entry business for over 12 years, and our services are backed by this solid experience in handling diverse requirements.">
                                        </div>
                                        <div class="form-group">
                                          <label for="serviceIcon1">Service Icon 1</label>
                                          <input type="file" class="form-control" name="serviceIcon1" id="serviceIcon1" placeholder="Enter Service Icon">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div>
                              <input type="button" class="btn btn-info" id="serviceAddButton" value="+ Click to add Service">               
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
                    <h3>Section 4</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <!-- why should you hire start -->
                        <section class="section-c padding-block-container" id="why-choose">
                          <h3 class="text-center heading-3" style="color: #000000;" id="outputTitle4">Why Should You Hire Virtual Assistants From Tech2gobe?</h3>
                          <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                          <div class="container">
                              <div id="counter" class="row">
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="40" id="outputBox1heading">40%</span>
                                          <p class="text" style="color: #000000;" id="outputBox1content">Cost Reduction</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="24" id="outputBox2heading">24</span>
                                          <p class="text" style="color: #000000;" id="outputBox2content">Hrs Turnaround</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="500" id="outputBox3heading">500+</span>
                                          <p class="text" style="color: #000000;" id="outputBox3content">Satisfied Client</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="250" id="outputBox4heading">250+</span>
                                          <p class="text" style="color: #000000;" id="outputBox4content">Skilled Agents</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="100" id="outputBox5heading">100%</span>
                                          <p class="text" style="color: #000000;" id="outputBox5content">Accuracy</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="12" id="outputBox6heading">12</span>
                                          <p class="text" style="color: #000000;" id="outputBox6content">Years Experience </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- why should you hire end -->
                          
                      </div>
                   </div>
                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 4</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title4">Title</label>
                                <input type="text" class="form-control" id="title4" name="title4" placeholder="Enter Title" @if(!empty($landingPage['title4'])) value="{{$landingPage['title4']}}" @else value="Why Should You Hire Virtual Assistants From Tech2gobe?" @endif>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box1heading">Box 1 Heading</label>
                                    <input type="text" class="form-control" name="box1heading" id="box1heading" placeholder="Enter Box Heading"  @if(!empty($landingPage['box1heading'])) value="{{$landingPage['box1heading']}}" @else value="40%" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box1content">Box 1 Content</label>
                                    <input type="text" class="form-control" name="box1content" id="box1content" placeholder="Enter Box Content"  @if(!empty($landingPage['box1content'])) value="{{$landingPage['box1content']}}" @else value="Cost Reduction" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box2heading">Box 2 Heading</label>
                                    <input type="text" class="form-control" name="box2heading" id="box2heading" placeholder="Enter Box Heading" @if(!empty($landingPage['box2heading'])) value="{{$landingPage['box2heading']}}" @else value="24" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box1content">Box 2 Content</label>
                                    <input type="text" class="form-control" name="box2content" id="box2content" placeholder="Enter Box Content" @if(!empty($landingPage['box2content'])) value="{{$landingPage['box2content']}}" @else value="Hrs Turnaround" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box3heading">Box 3 Heading</label>
                                    <input type="text" class="form-control" name="box3heading" id="box3heading" placeholder="Enter Box Heading" @if(!empty($landingPage['box3heading'])) value="{{$landingPage['box3heading']}}" @else value="500+" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box3content">Box 3 Content</label>
                                    <input type="text" class="form-control" name="box3content" id="box3content" placeholder="Enter Box Content" @if(!empty($landingPage['box3content'])) value="{{$landingPage['box3content']}}" @else value="Satisfied Client" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box4heading">Box 4 Heading</label>
                                    <input type="text" class="form-control" name="box4heading" id="box4heading" placeholder="Enter Box Heading" @if(!empty($landingPage['box4heading'])) value="{{$landingPage['box4heading']}}" @else value="250+" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box4content">Box 4 Content</label>
                                    <input type="text" class="form-control" name="box4content" id="box4content" placeholder="Enter Box Content" @if(!empty($landingPage['box4content'])) value="{{$landingPage['box4content']}}" @else value="Skilled Agents" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box5heading">Box 5 Heading</label>
                                    <input type="text" class="form-control" name="box5heading" id="box5heading" placeholder="Enter Box Heading" @if(!empty($landingPage['box5heading'])) value="{{$landingPage['box5heading']}}" @else value="100%" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box5content">Box 5 Content</label>
                                    <input type="text" class="form-control" name="box5content" id="box5content" placeholder="Enter Box Content" @if(!empty($landingPage['box5content'])) value="{{$landingPage['box5content']}}" @else value="Accuracy" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box6heading">Box 6 Heading</label>
                                    <input type="text" class="form-control" name="box6heading" id="box6heading" placeholder="Enter Box Heading" @if(!empty($landingPage['box6heading'])) value="{{$landingPage['box6heading']}}" @else value="12" @endif>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="box6content">Box 6 Content</label>
                                    <input type="text" class="form-control" name="box6content" id="box6content" placeholder="Enter Box Content" @if(!empty($landingPage['box6content'])) value="{{$landingPage['box6content']}}" @else value="Years Experience" @endif>
                                  </div>
                                </div>
                              </div>        
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
                    <h3>Section 5</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                             
                        <!-- valued customer start -->
                        <section class="section-d padding-block-container" id="our-customers" style="background-color: #FFFFFF; color: #000000;">
                          <h3 class="text-center heading-3" id="outputTitle5">@if(!empty($landingPage['title5'])) {{$landingPage['title5']}} @else Our Valued Customers @endif</h3>
                          <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                          <div class="container mt-2">
                              <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4" id="outputImages">
                                @if(!empty($landingPage['customers_images5']))
                                  <?php $customerImages = explode(",",$landingPage['customers_images5']); $i = 0; ?>
                                  @foreach ($customerImages as $item)
                                    <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                        <figure>
                                            <img src="{{ url("images/customers/$item") }}" alt="" id="outputImage{{$i++}}" height="80" width="auto">
                                        </figure>
                                    </div>
                                  @endforeach
                                @else 
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="{{ url('landing_page/images/aonHewit.png') }}" id="outputImage1" alt="" height="80px" width="auto">
                                      </figure>
                                  </div>
                                @endif
                              </div>
                          </div>
                        </section>
                        <!-- valued customer end -->
                      </div>
                   </div>
                   <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 5</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title5">Title</label>
                                <input type="text" class="form-control" id="title5" name="title5" placeholder="Enter Title" @if(!empty($landingPage['title5'])) value="{{$landingPage['title5']}}" @else value="Our Valued Customers" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="image1">Image1</label>
                                  <input type="file" class="form-control" name="image1" id="image1">
                              </div>   
                              <div id="section5Form">

                              </div>
                              <input type="button" class="btn btn-info" id="imageAddButton" value="+ Click to add Image">             
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
                    <h3>Section 6</h3>

                  <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                             <!-- testimonial start -->

                        <section class="section-e">

                          <div class="container padding-block-container">
                              <h3 class="text-center heading-3" style="color: #000000;" id="outputTitle6">@if(!empty($landingPage['title6'])) {{$landingPage['title6']}} @else Testimonials @endif</h3>
                              <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                              <div class="row responsive" id="outputTestimonial">
                                @if(!empty($landingPage['clientMessage6']))

                                    <?php
                                        $explodeClientMessage = explode("+++",$landingPage['clientMessage6']);
                                        $explodeClientName = explode("+++",$landingPage['clientName6']);
                                        $explodeClientPost = explode("+++",$landingPage['clientPost6']);
                                    ?>
                                    @for($i=0; $i<count($explodeClientMessage); $i++)
                                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                          <div class="details h-auto">
                                              <p style="color: #000000;" id="outputClientMessage{{$i+1}}">{{ $explodeClientMessage[$i] }}
                                              </p>
                                          </div>
                                          <div class="description">
                                              <div class="name">
                                                  <strong style="color: #000000;" id="outputClientName{{$i+1}}">- {{ $explodeClientName[$i] }}</strong>
                                              </div>
                                              <div class="designation my-2">
                                                  <p id="outputClientPost{{$i+1}}">{{ $explodeClientPost[$i] }}</p>
                                              </div>
                                          </div>
                                        </div>
                                    @endfor
                                @else
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details h-auto">
                                          <p style="color: #000000;" id="outputClientMessage1">Choosing Tech2Globe’s Virtual Assistant services was one of the best decisions we made for our business. Their team of skilled professionals has consistently delivered top-notch support, helping us streamline our operations and boost productivity. We highly recommend Tech2Globe to anyone in need of reliable virtual assistant services.
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong style="color: #000000;" id="outputClientName1">- Eva Smith</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p id="outputClientPost1">Relations Manager</p>
                                          </div>
                                      </div>
                                    </div>
                                @endif
                              </div>
                          </div>
                        </section>
                        <!-- testimonial end -->
                          
                      </div>
                  </div>
                  {{-- <div class="row">
                      <!-- left column -->
                      <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                          <div class="card-header">
                            <h3 class="card-title">Create Section 6</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title6">Title</label>
                                <input type="text" class="form-control" id="title6" name="title6" placeholder="Enter Title" @if(!empty($landingPage['title6'])) value="{{$landingPage['title6']}}" @else value="Testimonials" @endif>
                              </div>
                              <div id="testimonial">
                                @if(!empty($landingPage['clientMessage6']))
                                
                                  @for($i=0; $i<count($explodeClientMessage); $i++)
                                    <div class="card card-info card-outline">
                                      <a class="d-block w-100" data-toggle="collapse" href="#collapse{{$i+1}}">
                                          <div class="card-header">
                                              <h4 class="card-title w-100">
                                                  Testimonial {{$i+1}}
                                              </h4>
                                          </div>
                                      </a>
                                      <div id="collapse{{$i+1}}" class="collapse show" data-parent="#testimonial">
                                            <div class="card-body">
                                              <div class="form-group">
                                                  <label for="clientMessage{{$i+1}}">Client Message {{$i+1}}</label>
                                                  <input type="text" class="form-control" name="clientMessage{{$i+1}}" id="clientMessage{{$i+1}}" placeholder="Enter Client Message" value="{{ $explodeClientMessage[$i] }}">
                                              </div>
                                              <div class="row">
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="clientName{{$i+1}}">Client Name {{$i+1}}</label>
                                                    <input type="text" class="form-control" name="clientName{{$i+1}}" id="clientName{{$i+1}}" placeholder="Enter Client Name" value="{{ $explodeClientName[$i] }}">
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                  <div class="form-group">
                                                    <label for="clientPost{{$i+1}}">Client Post {{$i+1}}</label>
                                                    <input type="text" class="form-control" name="clientPost{{$i+1}}" id="clientPost{{$i+1}}" placeholder="Enter Client Post" value="{{ $explodeClientPost[$i] }}">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  @endfor
                                @else
                                  <div class="card card-info card-outline">
                                    <a class="d-block w-100" data-toggle="collapse" href="#collapse1">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                Testimonial 1
                                            </h4>
                                        </div>
                                    </a>
                                    <div id="collapse1" class="collapse show" data-parent="#testimonial">
                                          <div class="card-body">
                                            <div class="form-group">
                                                <label for="clientMessage1">Client Message 1</label>
                                                <input type="text" class="form-control" name="clientMessage1" id="clientMessage1" placeholder="Enter Client Message" value="Choosing Tech2Globe’s Virtual Assistant services was one of the best decisions we made for our business. Their team of skilled professionals has consistently delivered top-notch support, helping us streamline our operations and boost productivity. We highly recommend Tech2Globe to anyone in need of reliable virtual assistant services.">
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label for="clientName1">Client Name 1</label>
                                                  <input type="text" class="form-control" name="clientName1" id="clientName1" placeholder="Enter Client Name" value="Eva Smith">
                                                </div>
                                              </div>
                                              <div class="col-md-6">
                                                <div class="form-group">
                                                  <label for="clientPost1">Client Post 1</label>
                                                  <input type="text" class="form-control" name="clientPost1" id="clientPost1" placeholder="Enter Client Post" value="Relations Manager">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                @endif
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
                  </div> --}}
                  <!-- /.row -->
                 </div>
                 <div class="tab-pane fade show" id="custom-tabs-section7" role="tabpanel" aria-labelledby="custom-tabs-section7-tab">
                    <h3>Section 7</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>

                        <style>
                          #our-contact {
                              background-repeat: no-repeat;
                              background-size: cover;
                              background-position: center bottom;
                              background-color: rgba(0, 0, 0, 0.50) !important;
                              @if(!empty($landingPage['background_image7']))
                                background-image: url('/images/background/{{$landingPage['background_image7']}}');
                              @else
                                background-image: url('/landing_page/images/contact-parallax.jpg');
                              @endif
                              background-blend-mode: multiply;
                              width: 100%;
                              height: auto;
                              display: inline-block;
                          }
                        </style>
                        
                          <section class="section-f">
                            <div id="our-contact" class="padding-block-container">
                              <div class="container">
                                  <h3 class="text-center text-white heading-3" id="outputTitle7">@if(!empty($landingPage['title7'])) {{$landingPage['title7']}} @else Get Started with Remote Professionals Today @endif</h3>
                                  <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>

                                  <div class="row">
                                      <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                          <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="">
                                              <div class="row w-100 mb-3">
                                                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                      <input type="text" class="form-control rounded-0" id="outputInputField1" aria-describedby="emailHelp" @if(!empty($landingPage['inputfield1'])) placeholder="{{$landingPage['inputfield1']}}" @else placeholder="First Name" @endif name="fname" required>
                                                  </div>
                                                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                      <input type="text" class="form-control rounded-0" id="outputInputField2" aria-describedby="emailHelp" @if(!empty($landingPage['inputfield2'])) placeholder="{{$landingPage['inputfield2']}}" @else placeholder="Last Name" @endif name="lname">
                                                  </div>
                                                  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                      <input type="email" class="form-control rounded-0" id="outputInputField3" aria-describedby="emailHelp" @if(!empty($landingPage['inputfield3'])) placeholder="{{$landingPage['inputfield3']}}" @else placeholder="Official Email" @endif name="email" required>
                                                  </div>
                                                  <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                          
                                                          <div class="selected-option">
                                                              <div>
                                                                  <span class="iconify" data-icon="flag:us-4x3"></span>
                                                                  <strong>+1</strong>
                                                              </div>
                                                              <input type="tel" name="tel" @if(!empty($landingPage['inputfield4'])) placeholder="{{$landingPage['inputfield4']}}" @else placeholder="1111-000-1234" @endif minlength="10" required id="outputInputField4">
                                                          </div>
                                                  </div>
                                                  <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                      <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                                  </div> -->

                                                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                      <textarea class="form-control rounded-0" id="outputInputField5" rows="3" @if(!empty($landingPage['inputfield5'])) placeholder="{{$landingPage['inputfield5']}}" @else placeholder="Message" @endif name="message" required></textarea>
                                                  </div>
                                                  <div class="col-xs-12">
                                                      <button type="text" class="main-button rounded-0" id="outputInputField6" name="contact_form_submit">@if(!empty($landingPage['inputfield6'])) {{$landingPage['inputfield6']}} @else Submit @endif</button>
                                                  </div>
                                              </div>


                                          </form>
                                      </div>
                                  </div>
                              </div>
                            </div>
                          </section>
                          <!-- contact us section-f end -->
                          
                      </div>
                   </div>
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
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title7">Title</label>
                                <input type="text" class="form-control" id="title7" name="title7" placeholder="Enter Title" @if(!empty($landingPage['title7'])) value="{{$landingPage['title7']}}" @else value="Get Started with Remote Professionals Today" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField1">Input Field 1</label>
                                <input type="text" class="form-control" name="inputField1" id="inputField1" placeholder="Enter Input Field 1"  @if(!empty($landingPage['inputfield1'])) value="{{$landingPage['inputfield1']}}" @else value="First Name" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField2">Input Field 2</label>
                                <input type="text" class="form-control" name="inputField2" id="inputField2" placeholder="Enter Input Field 2"  @if(!empty($landingPage['inputfield2'])) value="{{$landingPage['inputfield2']}}" @else value="Last Name" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField3">Input Field 3</label>
                                <input type="text" class="form-control" name="inputField3" id="inputField3" placeholder="Enter Input Field 3"  @if(!empty($landingPage['inputfield3'])) value="{{$landingPage['inputfield3']}}" @else value="Official Email" @endif>
                              </div> 
                              <div class="form-group">
                                <label for="imputField4">Input Field 4</label>
                                <input type="text" class="form-control" name="inputField4" id="inputField4" placeholder="Enter Input Field 4"  @if(!empty($landingPage['inputfield4'])) value="{{$landingPage['inputfield4']}}" @else value="1111-000-1234" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField5">Input Field 5</label>
                                <input type="text" class="form-control" name="inputField5" id="inputField5" placeholder="Enter Input Field 5"  @if(!empty($landingPage['inputfield5'])) value="{{$landingPage['inputfield5']}}" @else value="Message" @endif>
                              </div>
                              <div class="form-group">
                                <label for="imputField6">Input Field 6</label>
                                <input type="text" class="form-control" name="inputField6" id="inputField6" placeholder="Enter Input Field 6"  @if(!empty($landingPage['inputfield6'])) value="{{$landingPage['inputfield6']}}" @else value="Submit" @endif>
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
                            @if(!empty($landingPage['background_image8']))
                              background-image: url('/images/background/{{$landingPage['background_image8']}}');
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
                                          <h3 class="text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading" id="outputTitle8">@if(!empty($landingPage['title8'])) {{$landingPage['title8']}} @else Have Queries? @endif</h3>
                                          <small class="text-white text-center w-100 d-block pb-5" id="outputSubTitle8">@if(!empty($landingPage['sub_title8'])) {{$landingPage['sub_title8']}} @else Get A Call Back Today! @endif</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="">
                                                  <input type="text" id="outputField1" @if(!empty($landingPage['field1'])) placeholder="{{$landingPage['field1']}}" @else placeholder="Name" @endif required>
                                                  <input type="tel" id="outputField2" @if(!empty($landingPage['field2'])) placeholder="{{$landingPage['field2']}}" @else placeholder="Phone Number" @endif required>
                                                  <input type="submit" id="outputField3" @if(!empty($landingPage['field3'])) value="{{$landingPage['field3']}}" @else value="submit" @endif>
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
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="title8">Title</label>
                                <input type="text" class="form-control" id="title8" name="title8" placeholder="Enter Title" @if(!empty($landingPage['title8'])) value="{{$landingPage['title8']}}" @else value="Have Queries?" @endif required>
                              </div>
                              <div class="form-group">
                                <label for="subtitle8">Sub Title</label>
                                <input type="text" class="form-control" name="subtitle8" id="subtitle8" placeholder="Enter Sub Title" @if(!empty($landingPage['sub_title8'])) value="{{$landingPage['sub_title8']}}" @else value="Get A Call Back Today!" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="field1">Form Field 1</label>
                                  <input type="text" class="form-control" name="field1" id="field1" placeholder="Enter Form Field 1" @if(!empty($landingPage['field1'])) value="{{$landingPage['field1']}}" @else value="Name" @endif>
                              </div>
                              <div class="form-group">
                                  <label for="field2">Form Field 2</label>
                                  <input type="text" class="form-control" name="field2" id="field2" placeholder="Enter Form Field 2" @if(!empty($landingPage['field2'])) value="{{$landingPage['field2']}}" @else value="Phone Number" @endif>
                              </div> 
                              <div class="form-group">
                                  <label for="field3">Form Field 3 (Submit Button)</label>
                                  <input type="text" class="form-control" name="field3" id="field3" placeholder="Enter Form Field 3" @if(!empty($landingPage['field3'])) value="{{$landingPage['field3']}}" @else value="Submit" @endif>
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
                                      <p>&copy;<span id="outputContent9"> @if(!empty($landingPage['content9'])) {{$landingPage['content9']}} @else Copyright 2023 Tech2globe All rights reserved. @endif</span></p>
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
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/create-landing-pages/'.$layout['id'].'') }}" method="post">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="content9">Copyright Content</label>
                                <input type="text" class="form-control" id="content9" name="content9" placeholder="Enter Copyright Content" @if(!empty($landingPage['content9'])) value="{{$landingPage['content9']}}" @else value="Copyright 2023 Tech2globe All rights reserved." @endif>
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
