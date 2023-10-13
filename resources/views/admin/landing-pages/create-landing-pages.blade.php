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
               @foreach($layout as $row)
                <a class="btn btn-primary" href="{{ $row['page_url'] }}" target="blank">Visit Page</a>
               @endforeach
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
                  <div class="tab-pane fade show active" id="custom-tabs-section1" role="tabpanel" aria-labelledby="custom-tabs-section1-tab">
                     <h3>Section 1</h3>
                   
                     <div class="row p-3" style="border: #FFFFFF solid 2px;">
                        <div class="col-md-12">
                          <p>Preview</p>
                                <nav class="navbar navbar-expand-lg" style="background-color: #FFFFFF;">
                                    <div class="container">
                                        <a class="navbar-brand w-25" href="#"><img class="w-75" id="output-logo" src="{{ url('admin/img/tech2globe-logo-1.jpg') }}" alt=""></a>
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
                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
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

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <!-- service section start -->
                        <section class="section-b" id="our-services">
                          <div class="container padding-block-container">
                              <div class="row d-flex justify-content-center">
                                  <h3 class="text-center heading-3">Virtual Assistant Services We Offer</h3>
                                  <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 20%;"></span>
                                  <p class="text-center pt-2 pb-2">Curb the struggle of managing extensive administration tasks, and scale your business growth with contemporary solutions. Hire virtual assistants from the global service provider Tech2Globe Web Solutions. We utilize the latest tools, techniques, and processes to provide world-class and 100% accurate services. Furthermore, we allocate you tech-savvy and proactive VAs that have aptitude in various fields to run admin errands for you and support challenges that you may be facing. Our comprehensive solutions include, but are not limited to</p>

                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/data-entry-service.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Entry Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">We have been in the data entry business for over 12 years, and our services are backed by this solid experience in handling diverse requirements.</p>
                                              <a href="https://tech2globe.com/data-entry-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/data-processing.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Processing Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Data processing is critical to get the most out of your data. We make data processing easy so you can focus on higher-value tasks.</p>
                                              <a href="https://tech2globe.com/data-processing-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/data-conversion.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Conversion Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Our team of data experts have been handling data conversion requirements for a diverse clientele from across the world.</p>
                                              <a href="https://tech2globe.com/data-conversion-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/data-extraction.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Extraction Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Extracting data from huge databases can take time and effort. Our team leverages the power of scripts to browse through massive databases.</p>
                                              <a href="https://tech2globe.com/data-extraction-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/data-scraping.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Scraping Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Online data extraction is a tedious, time-consuming process that requires multiple expensive software, servers, and resources.</p>
                                              <a href="https://tech2globe.com/web-scraping-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/customer-support-service.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Customer Support Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">We prioritise customer satisfaction and provide prompt support to address any concerns or inquiries. </p>
                                              <a href="https://tech2globe.com/customer-support-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/business-process-outsourcing.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Call Center Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Experience the tailored call center service to meet the diverse needs of your customers and ensure they receive top-notch assistance every time.</p>
                                              <a href="https://tech2globe.com/call-center-consulting" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/backend-support-services.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Backend Support Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Tailored solutions to cater your unique demands. With Tech2Globe’s comprehensive database management keep your systems updated, secure, and optimized.</p>
                                              <a href="https://tech2globe.com/sales-support-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/knowledge-process-outsourcing.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Data Support Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Harness the power of your company’s data for crucial and informed decision-making. Our Data Support professionals have the knowledge to help you leverage your data effectively.</p>
                                              <a href="https://tech2globe.com/data-management-services" class="sub-button">Read More</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-4 col-lg-3 col-xl-3 col-xxl-3 col-sm-12 col-xs-12 card-container-section-b">
                                      <div class="card">
                                          <div class="heading-container">
                                              <figure class="icon w-25">
                                                  <img class="w-100" src="/hire-virtual-assistant/images/chat-support-services.png" alt="">
                                              </figure>
                                              <div class="heading-4">
                                                  <h4 class="text-dark text-center">Chat Support Services</h4>
                                              </div>
                                          </div>
                                          <div class="content-container text-center">
                                              <p class="text-dark">Upgrade customer engagement and support with professional Chat Support Services. Our agents are trained to provide prompt responses and 24/7 assistant.</p>
                                              <a href="https://www.tech2globe.com/chat-support-services" class="sub-button">Read More</a>
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
                 <div class="tab-pane fade show" id="custom-tabs-section4" role="tabpanel" aria-labelledby="custom-tabs-section4-tab">
                    <h3>Section 4</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <!-- why should you hire start -->
                        <section class="section-c padding-block-container" id="why-choose">
                          <h3 class="text-center heading-3">Why Should You Hire Virtual Assistants From Tech2gobe?</h3>
                          <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px" style="width: 40%;"></span>

                          <div class="container">
                              <div id="counter" class="row">
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="40"></span><span class="symbol">%</span>
                                          <p class="text">Cost Reduction</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="24"></span>
                                          <p class="text">Hrs Turnaround</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="500"></span><span class="symbol">+</span>
                                          <p class="text">Satisfied Client</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="250"></span><span class="symbol">+</span>
                                          <p class="text">Skilled Agents</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="100"></span><span class="symbol">%</span>
                                          <p class="text">Accuracy</p>
                                      </div>
                                  </div>
                                  <div class="col-lg-2 col-xl-2 col-xxl-2 col-md-4 col-sm-12 col-xs-12">
                                      <div class="item">
                                          <span class="count" data-number="12"></span>
                                          <p class="text">Years Experience </p>
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
                 <div class="tab-pane fade show" id="custom-tabs-section5" role="tabpanel" aria-labelledby="custom-tabs-section5-tab">
                    <h3>Section 5</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                             
                        <!-- valued customer start -->
                        <section class="section-d padding-block-container" id="our-customers">
                          <h3 class="text-center heading-3">Our Valued Customers</h3>
                          <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                          <div class="container mt-2">
                              <div class="row my-5 text-center d-flex justify-content-between align-items-center our-valued-customer gap-4">
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/aonHewit.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/follett.png" alt="">
                                      </figure>
                                  </div>

                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/foodora-1.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/go-mechanic.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/hp.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/nike.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/sales-warp.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/SmartSense_Logo_Color.jpg" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/wellist.png" alt="">
                                      </figure>
                                  </div>
                                  <div class="col-lg-2 col-md-4 col-sm-6 col-xs-6">
                                      <figure>
                                          <img src="/hire-virtual-assistant/images/zebit-logo-rgb.png" alt="">
                                      </figure>
                                  </div>
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
                 <div class="tab-pane fade show" id="custom-tabs-section6" role="tabpanel" aria-labelledby="custom-tabs-section6-tab">
                    <h3>Section 6</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                             <!-- testimonial start -->

                        <section class="section-e">

                          <div class="container padding-block-container">
                              <h3 class="text-center heading-3">Testimonials</h3>
                              <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-100px" style="width: 10%;"></span>
                              <div class="row responsive">
                                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details">
                                          <p>Choosing Tech2Globe’s Virtual Assistant services was one of the best decisions we made for our business. Their team of skilled professionals has consistently delivered top-notch support, helping us streamline our operations and boost productivity. We highly recommend Tech2Globe to anyone in need of reliable virtual assistant services.
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong>- Eva Smith</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p>Relations Manager</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details">
                                          <p>We've been working with Tech2Globe Web Solutions for over a year now, and their virtual assistants have become an integral part of our daily operations. Their dedication, attention to detail, and ability to adapt to our unique requirements have exceeded our expectations. Tech2Globe is our trusted partner for all our virtual assistant needs.
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong>- James Baker</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p>MD</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details">
                                          <p>Tech2Globe's virtual assistants have truly been a game-changer for our small business. Their professionalism and commitment to delivering high-quality work have allowed us to focus on our core activities while they handle tasks such as customer support, data entry, and research. We couldn't be happier with their services.
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong>- Raechel Bennette</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p>Co-Owner</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details">
                                          <p>As a busy entrepreneur, I was looking for a reliable virtual assistant service provider, and I found exactly what I needed with Tech2Globe. Their team is not only skilled but also efficient, ensuring that tasks are completed promptly and accurately. Tech2Globe has become an indispensable part of my business.
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong>- Louis Davis</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p>Operations Manager</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                                      <div class="details">
                                          <p>Tech2Globe Web Solutions has been instrumental in helping us scale our business operations. Their virtual assistants are not just assistants; they are a valuable extension of our team. Their professionalism and expertise in various tasks have consistently exceeded our expectations. Highly recommended!
                                          </p>
                                      </div>
                                      <div class="description">
                                          <div class="name">
                                              <strong>- Howard Roberts</strong>
                                          </div>
                                          <div class="designation my-2">
                                              <p>Department Manager</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </section>
                        <!-- testimonial end -->
                          
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
                 <div class="tab-pane fade show" id="custom-tabs-section7" role="tabpanel" aria-labelledby="custom-tabs-section7-tab">
                    <h3>Section 7</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                            <!-- contact us section-f start -->
                          <section class="section-f padding-block-container" id="our-contact">
                            <div class="container">
                                <h3 class="text-center text-white heading-3">Get Started with Remote Professionals Today</h3>
                                <span class="separator-line-horrizontal-medium-light2 bg-deep-pink d-table mx-auto w-200px"></span>

                                <div class="row">
                                    <div class="col-md-8 col-lg-7 col-sm-12 col-xs-12 m-auto">
                                        <?php $actual_link = str_replace('.php', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']); ?>
                                        <form class="shadow-sm p-4 d-flex justify-content-center align-items-center flex-column bg-white form-a" action="" method="post">
                                            <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                            <div class="row w-100 mb-3">
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" name="fname" required>
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" name="lname">
                                                </div>
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                    <input type="email" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Official Email" name="email" required>
                                                </div>
                                                <div id="flag-container-hire-virtual-assistant" class="col-xs-12 col-sm-6 col-md-6 col-lg-6 position-relative flag-ca">
                                                    <div class="select-box">
                                                        <div class="selected-option">
                                                            <div>
                                                                <span class="iconify" data-icon="flag:us-4x3"></span>
                                                                <strong>+1</strong>
                                                            </div>
                                                            <input type="tel" name="tel" placeholder="1111-000-1234" minlength="10" required id="phoneInput">
                                                        </div>
                                                        <div class="options">
                                                            <input type="text" class="search-box" placeholder="Search Country Name">
                                                            <ol>

                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <input type="text" class="form-control rounded-0" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Website* -- Ex: http://www.example.com" name="website" required>
                                                </div> -->

                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="Message" name="message" required></textarea>
                                                </div>
                                                <div class="col-xs-12">
                                                    <button type="submit" class="main-button rounded-0" name="contact_form_submit">Submit</button>
                                                </div>
                                            </div>


                                        </form>
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
                 <div class="tab-pane fade show" id="custom-tabs-section8" role="tabpanel" aria-labelledby="custom-tabs-section8-tab">
                    <h3>Section 8</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                           <!-- section-g start -->
                        <section class="section-g">
                          <div class="have-query-section">
                              <div class="container-fluid" id="have_queries">
                                  <div class="row">
                                      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                          <h3 class="text-capitalize text-extra-dark-gray mb-3 font-weight-700 md-w-100 d-block text-center text-white main-heading">have queries?</h3>
                                          <small class="text-white text-center w-100 d-block pb-5 text-capitalize">get a call back today!</small>

                                          <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-12">
                                              <form action="" method="post">
                                                  <input name="pagelinks" value="<?php echo $actual_link; ?>" type="hidden" />
                                                  <input type="text" placeholder="Name" name="name" required>
                                                  <input type="tel" placeholder="Phone Number" name="phone" required maxlength="15">
                                                  <input type="submit" value="submit" name="query_form">
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
                 <div class="tab-pane fade show" id="custom-tabs-section9" role="tabpanel" aria-labelledby="custom-tabs-section9-tab">
                    <h3>Section 9</h3>

                    <div class="row p-3" style="border: #FFFFFF solid 2px;">
                      <div class="col-md-12">
                        <p>Preview</p>
                        <div class="copyright-area">
                          <div class="container">
                              <div class="row">
                                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                                      <p>&copy; Copyright 2023 Tech2globe All rights reserved.</p>
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
