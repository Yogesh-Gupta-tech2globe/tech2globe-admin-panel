@extends('admin.layout.layout')
@section('content')

<style>
  /* Header section start here */
.top-header {background-color: var(--black);padding: 6px 0;}
.top-header a {color: var(--white);padding: 0px 5px;font-size: 14px;}
.top-header .link a:not(:last-child) {border-right: 1px solid #eee;}
.top-header .col-md-3 svg {font-size: 16px;position: relative;top: 1px;}
.icon {width: 16px;}
.link a {color: var(--white);}
.bottom-header {padding: 2px 0;}
.bottom-header a {font-size: 14px;}
.bottom-header h6, .bottom-header a {color: var(--blue);}
.brand-logo {width: 100%;}
.flag-icon {width: 35px;height: 26px;object-fit: cover;border-radius: 4px;}
.flag-icon img {width: 35px;height: 26px;object-fit: cover;}
.top-header i {font-size: 16px;}
.flag-icon-1 {padding: 0;margin: 0;height: 26px;}
.flag-icon-1 .flag-icons {height: 100%;padding: 0;margin: 0;}
.flag-icon-1 .flag-icons img {object-fit: cover;height: 26px;width: 35px;}
.dropdown-menu[data-bs-popper] {top: 100%;left: 0;margin-top: var(--bs-dropdown-spacer);z-index: 999999;}
.global {font-size: 22px ;font-weight: 600;color: var(--red);position: relative;}
.global::before {content: '';position: absolute;width: 2px;height: 32px;background-color: var(--light-gray);right: 86px;}
.global-list {width: 185px;height: 180px;}
.global-list .dropdown-item {padding: 6px 12px;}
.global-dropdown.dropdown-toggle::after {opacity: 1;}
.global-icon img {margin-right: 10px;border: 1px solid rgba(0, 0, 0, 0.1);object-fit: cover;width: 22px;height: 18px;}
/* Header section end here */

/* Navbar section start here */
.nav-link {color: var(--white);}
.nav-link:hover {color: var(--red);}
.navbar {height: 65px;}
nav.navbar.bg-light.sticky-top.display-mob-block.mobile-nav {height: auto;}
/* Navbar section end here */
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tech2Globe Header</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/tech2globe-layout">Tech2globe Layout</a></li>
              <li class="breadcrumb-item active">Header</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
      <div class="row">
          <div class="col-12" id="accordion">

            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseFour">
                  <h4 class="card-title">
                      Black Top Navbar
                  </h4>
                </a>
              </div>
              <div id="collapseFour" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <div class="row p-3" style="border: #FFFFFF solid 2px;">
                    <div class="col-md-12">
                      <p>Preview</p>

                      <div class="top-header" style="background-color: #000000;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-5">
                                    <img @if(!empty($topNavbar['socialLink1Icon'])) src="{{ url('images/icons/'.$topNavbar['socialLink1Icon'].'') }}" @else src="{{ url('images/icons/skype.png') }}" @endif id="outputSocialLink1Icon" class="icon" alt="Skype">
                                    <a href="skype:info.tech2globe?call" id="outputSocialLink1Text">@if(!empty($topNavbar['socialLink1Text'])) {{$topNavbar['socialLink1Text']}} @else Info.tech2globe @endif</a>
                                </div>
                                <div class="col-md-3 col-sm-7">
                                    <img @if(!empty($topNavbar['socialLink2Icon'])) src="{{ url('images/icons/'.$topNavbar['socialLink2Icon'].'') }}" @else src="{{ url('images/icons/gmail.png') }}" @endif id="outputSocialLink2Icon" class="icon" alt="Gmail">
                                    {{-- <i class="fas fa-envelope text-white pt-1"></i> --}}
                                    <a href="mailto:info@tech2globe.com" id="outputSocialLink2Text">@if(!empty($topNavbar['socialLink2Text'])) {{$topNavbar['socialLink2Text']}} @else Info@tech2globe.com @endif</a>
                                </div>
                                <div class="col-md-7 col-sm-12">
                                    <div class="link float-end" style="margin-left: 350px;">
                                        <a href="" id="outputInnerPage1Text">@if(!empty($topNavbar['innerPage1Text'])) {{$topNavbar['innerPage1Text']}} @else Case Studies @endif</a>
                                        <a href="" id="outputInnerPage2Text">@if(!empty($topNavbar['innerPage2Text'])) {{$topNavbar['innerPage2Text']}} @else Portfolio @endif</a>
                                        <a href="" id="outputInnerPage3Text">@if(!empty($topNavbar['innerPage3Text'])) {{$topNavbar['innerPage3Text']}} @else Blogs @endif</a>
                                    </div>
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
                            <h3 class="card-title">Update Top Navbar</h3>
                            {{-- @if($landingPage['section1_id']!="")
                              @if ($landingPage['status1']==1)
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-1" layout_id="{{$layout['id']}}" section_id="1" href="javascript:void(0)"><i class="fas fa-toggle-on fa-lg" status="Active">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Active</span></i></a>
                              @else
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-1" layout_id="{{$layout['id']}}" section_id="1" style="color: yellow;" href="javascript:void(0)"><i class="fas fa-toggle-off fa-lg" status="Inactive">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Inactive</span></i></a>
                              @endif
                            @endif --}}

                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/tech2globe-layout/header') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="socialLink1">Social Link 1</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="file" name="socialLink1Icon" id="socialLink1Icon" class="form-control">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" id="socialLink1Text" name="socialLink1Text" placeholder="Enter Social Link Content" @if(!empty($topNavbar['socialLink1Text'])) value="{{$topNavbar['socialLink1Text']}}" @else value="Info.tech2globe" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="menu2">Social Link 2</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="file" name="socialLink2Icon" id="socialLink2Icon" class="form-control">
                                  </div>
                                  <div class="col-md-6">
                                    <input type="text" class="form-control" id="socialLink2Text" name="socialLink2Text" placeholder="Enter Social Link Content" @if(!empty($topNavbar['socialLink2Text'])) value="{{$topNavbar['socialLink2Text']}}" @else value="Info@tech2globe.com" @endif>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="innerPage1">Inner Page 1</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <input type="text" name="innerPage1Text" id="innerPage1Text" class="form-control" placeholder="Enter Inner Page Name" @if(!empty($topNavbar['innerPage1Text'])) value="{{$topNavbar['innerPage1Text']}}" @else value="Case Studies" @endif>
                                    </div>
                                    <div class="col-md-6">
                                      <select class="form-control" name="innerPage1Link">
                                        <option value="">Select Page</option>
                                        @foreach ($allPagesData as $row)
                                        
                                          @if(!empty($row->categoryName1))<option value="{{$row->pageUrl1}}" @if(!empty($row) && !empty($row->pageUrl1) && !empty($topNavbar['innerPage1Link'])) @if($row->pageUrl1 === $topNavbar['innerPage1Link']) selected @endif @endif>Main Menu / {{$row->categoryName1}}</option> @endif
                                          @if(!empty($row->categoryName2))<option value="{{$row->pageUrl2}}" @if(!empty($row) && !empty($row->pageUrl2) && !empty($topNavbar['innerPage1Link'])) @if($row->pageUrl2 === $topNavbar['innerPage1Link']) selected @endif @endif>Sub Menu / {{$row->categoryName2}}</option>@endif
                                          @if(!empty($row->pageName))<option value="{{$row->pageUrl}}" @if(!empty($row) && !empty($row->pageUrl) && !empty($topNavbar['innerPage1Link'])) @if($row->pageUrl === $topNavbar['innerPage1Link']) selected @endif @endif>Inner Pages / {{$row->pageName}}</option>@endif
                                        @endforeach
                                        
                                      </select>
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="innerPage2">Inner Page 2</label>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <input type="text" name="innerPage2Text" id="innerPage2Text" class="form-control" placeholder="Enter Inner Page Name" @if(!empty($topNavbar['innerPage2Text'])) value="{{$topNavbar['innerPage2Text']}}" @else value="Portfolio" @endif>
                                    </div>
                                    <div class="col-md-6">
                                      <select class="form-control" name="innerPage2Link">
                                        <option value="">Select Page</option>
                                        @foreach ($allPagesData as $row)
                                        
                                          @if(!empty($row->categoryName1))<option value="{{$row->pageUrl1}}" @if(!empty($row) && !empty($row->pageUrl1) && !empty($topNavbar['innerPage2Link'])) @if($row->pageUrl1 === $topNavbar['innerPage2Link']) selected @endif @endif>Main Menu / {{$row->categoryName1}}</option>@endif
                                          @if(!empty($row->categoryName2))<option value="{{$row->pageUrl2}}" @if(!empty($row) && !empty($row->pageUrl2) && !empty($topNavbar['innerPage2Link'])) @if($row->pageUrl2 === $topNavbar['innerPage2Link']) selected @endif @endif>Sub Menu / {{$row->categoryName2}}</option>@endif
                                          @if(!empty($row->pageName))<option value="{{$row->pageUrl}}" @if(!empty($row) && !empty($row->pageUrl) && !empty($topNavbar['innerPage2Link'])) @if($row->pageUrl === $topNavbar['innerPage2Link']) selected @endif @endif>Inner Pages / {{$row->pageName}}</option>@endif
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                              </div> 
                              <div class="form-group">
                                <label for="innerPage3">Inner Page 3</label>
                                <div class="row">
                                  <div class="col-md-6">
                                    <input type="text" name="innerPage3Text" id="innerPage3Text" class="form-control" placeholder="Enter Inner Page Name" @if(!empty($topNavbar['innerPage3Text'])) value="{{$topNavbar['innerPage3Text']}}" @else value="Blogs" @endif>
                                  </div>
                                  <div class="col-md-6">
                                    <select class="form-control" name="innerPage3Link">
                                      <option value="">Select Page</option>
                                        @foreach ($allPagesData as $row)
                                        
                                          @if(!empty($row->categoryName1))<option value="{{$row->pageUrl1}}" @if(!empty($row) && !empty($row->pageUrl1) && !empty($topNavbar['innerPage3Link'])) @if($row->pageUrl1 === $topNavbar['innerPage3Link']) selected @endif @endif>Main Menu / {{$row->categoryName1}}</option>@endif
                                          @if(!empty($row->categoryName2))<option value="{{$row->pageUrl2}}" @if(!empty($row) && !empty($row->pageUrl2) && !empty($topNavbar['innerPage3Link'])) @if($row->pageUrl2 === $topNavbar['innerPage3Link']) selected @endif @endif>Sub Menu / {{$row->categoryName2}}</option>@endif
                                          @if(!empty($row->pageName))<option value="{{$row->pageUrl}}" @if(!empty($row) && !empty($row->pageUrl) && !empty($topNavbar['innerPage3Link'])) @if($row->pageUrl === $topNavbar['innerPage3Link']) selected @endif @endif>Inner Pages / {{$row->pageName}}</option>@endif
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>                 
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary" name="topNavbar">Submit</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.card -->
            
                      </div>
                      <!--/.col (left) -->
                  </div>
                </div>
              </div>
            </div> 
            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseFive">
                  <h4 class="card-title">
                      Logo Middle Navbar
                  </h4>
                </a>
              </div>
              <div id="collapseFive" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                  <?php
                  $explodeCountryFlag = explode(",",$middleNavbar['countryFlag']);
                  $explodeBranchNumber = explode(",",$middleNavbar['branchNumber']);
                  $explodeBranchCountry = explode(",",$middleNavbar['branchCountry']);
                  $explodeBranchAddress = explode("+++",$middleNavbar['branchAddress']);
                  $explodeBranchWebsite = explode(",",$middleNavbar['branchWebsite']);
                  ?>
                  <div class="row p-3" style="border: #FFFFFF solid 2px;">
                    <div class="col-md-12">
                      <p>Preview</p>

                      <div class="bottom-header" style="background-color: #FFFFFF;">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-md-3 col-sm-12">
                                    <div class="row">
                                        <nav class="navbar navbar-expand-lg header-location">
                                            <div class="container">
                                                <a class="navbar-brand" href=""><img @if(!empty($middleNavbar['websiteLogo'])) src="{{ url('images/logo/'.$middleNavbar['websiteLogo'].'') }}" @else src="{{ url('images/tech2globe-logo.jpg') }}" @endif class="brand-logo" id="outputWebsiteLogo" alt="Tech2globe Logo" width="auto" height="35px"></a>
                                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                    <ul class="navbar-nav mb-2 mb-lg-0">
                                                        <li class="nav-item dropdown">
                                                            <a class="nav-link global-dropdown dropdown-toggle w-100" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <span class="global">Global</span>
                                                            </a>
                                                            <ul class="dropdown-menu global-list">
                                                                <li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="{{ url('images/svgs/united-state-flag-icon.svg') }}" alt="America"> United States
                                                                        </div>
                                                                </a></li>
                                                                <li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                  <div class="global-icon">
                                                                      <img src="{{ url('images/svgs/united-state-flag-icon.svg') }}" alt="America"> United States
                                                                  </div>
                                                                </a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-md-8 offset-1 col-sm-12 mt-3 d-none d-lg-block">
                                    <div class="row align-items-center" id="outptCompanyBranch">
                                      @for($i = 0; $i < count($explodeCountryFlag); $i++)
                                        <div class="col-md-3 col-sm-6 d-flex align-items-center" id="outputBranch{{$i+1}}">
                                            <div class="flag-icon">
                                                <img src="{{ url('images/svgs/'.$explodeCountryFlag[$i].'') }}" id="outputCountryFlag{{$i+1}}" alt="India">
                                            </div>
                                            <div class="ms-3">
                                                <!-- <h6>Phone</h6> -->
                                                <a href="tel:011-430-10-700" id="outputBranchNumber{{$i+1}}">{{$explodeBranchNumber[$i]}}</a>
                                            </div>
                                        </div>
                                      @endfor
                                    </div>
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
                            <h3 class="card-title">Update Middle Navbar</h3>
                            {{-- @if($landingPage['section1_id']!="")
                              @if ($landingPage['status1']==1)
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-1" layout_id="{{$layout['id']}}" section_id="1" href="javascript:void(0)"><i class="fas fa-toggle-on fa-lg" status="Active">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Active</span></i></a>
                              @else
                                <a class="updateLandingPageSectionStatus" id="landingPage-section-1" layout_id="{{$layout['id']}}" section_id="1" style="color: yellow;" href="javascript:void(0)"><i class="fas fa-toggle-off fa-lg" status="Inactive">&nbsp;&nbsp;<span style="font-size: 16px;">Section is Inactive</span></i></a>
                              @endif
                            @endif --}}

                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form action="{{ url('admin/tech2globe-layout/header') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="websiteLogo">Website Logo</label>
                                <input type="file" class="form-control" id="websiteLogo" name="websiteLogo">
                              </div>
                              <div id="companyBranch">
                                @if(!empty($middleNavbar['countryFlag']))
                                <?php $i = 0; ?>
                                  @for (; $i < count($explodeCountryFlag); $i++)
                                  <div class="card card-info card-outline" id="branch{{$i+1}}">
                                    <div class="card-header d-flex justify-content-between">
                                      <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapse{{$i+1}}">
                                        <h4 class="card-title">
                                            Branch {{$i+1}}
                                        </h4>
                                      </a>
                                      <a class="d-inline-block w-auto border-0 branchRemoveButton" branchId="{{$i+1}}" href="javascript:void(0)">
                                        <i class="fas fa-times"></i>
                                      </a>
                                    </div>
                                    
                                    <div id="collapse{{$i+1}}" class="collapse" data-parent="#companyBranch">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="countryFlag{{$i+1}}">Country Flag</label>
                                                <input type="file" class="form-control" name="countryFlag{{$i+1}}" id="countryFlag{{$i+1}}">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="branchNumber{{$i+1}}">Branch Contact Number</label>
                                                <input type="text" class="form-control" name="branchNumber{{$i+1}}" id="branchNumber{{$i+1}}" placeholder="Enter Branch Contact Number" value="{{$explodeBranchNumber[$i]}}">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="branchCountry{{$i+1}}">Branch Country</label>
                                                <input type="text" class="form-control" name="branchCountry{{$i+1}}" id="branchCountry{{$i+1}}" placeholder="Enter Branch Country" value="{{$explodeBranchCountry[$i]}}">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="branchAddress{{$i+1}}">Branch Address</label>
                                                <input type="text" class="form-control" name="branchAddress{{$i+1}}" id="branchAddress{{$i+1}}" placeholder="Enter Branch Address" @if(!empty($explodeBranchAddress[$i]) ) value="{{$explodeBranchAddress[$i]}}" @endif>
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group">
                                                <label for="branchWebsite{{$i+1}}">Branch Website url</label>
                                                <input type="url" class="form-control" name="branchWebsite{{$i+1}}" id="branchWebsite{{$i+1}}" placeholder="Enter Branch Website Url" @if(!empty($explodeBranchWebsite[$i])) value="{{$explodeBranchWebsite[$i]}}" @endif>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>
                                  @endfor
                                    
                                @else
                                  
                                  <div class="card card-info card-outline" id="branch1">
                                    <div class="card-header d-flex justify-content-between">
                                      <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapse1">
                                        <h4 class="card-title">
                                            Branch 1
                                        </h4>
                                      </a>
                                      {{-- <a class="d-inline-block w-auto border-0 serviceRemoveButton" serviceId="1" layout_id="{{$landingPage['layout_id']}}" href="javascript:void(0)"> --}}
                                        <i class="fas fa-times"></i>
                                      </a>
                                    </div>
                                    
                                    <div id="collapse1" class="collapse show" data-parent="#companyBranch">
                                        <div class="card-body">
                                          <div class="row">
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="countryFlag1">Country Flag</label>
                                                <input type="file" class="form-control" name="countryFlag1" id="countryFlag1">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="branchNumber1">Branch Contact Number</label>
                                                <input type="text" class="form-control" name="branchNumber1" id="branchNumber1" placeholder="Enter Branch Contact Number" value="011-430-10-700">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-group">
                                                <label for="branchCountry1">Branch Country</label>
                                                <input type="text" class="form-control" name="branchCountry1" id="branchCountry1" placeholder="Enter Branch Country" value="India">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </div>

                                 @endif
                               
                              </div>
                              <input type="button" class="btn btn-info" id="branchAddButton" branch_number="<?php echo $i; ?>" value="+ Click to add Branch Details">               
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary" name="middleNavbar">Submit</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.card -->
            
                      </div>
                      <!--/.col (left) -->
                  </div>
                </div>
              </div>
            </div> 
            <div class="card card-primary card-outline"> 
                <div class="card-header d-flex justify-content-between">
                  <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseOne">
                    <h4 class="card-title">
                        Main Menu
                    </h4>
                  </a>
                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                    <a href="{{ url('admin/tech2globe-layout/add-edit-main-menu') }}" class="d-inline-block w-25 border-0 btn btn-primary">Add Menu</a>
                  @endif
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="mainMenu" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>S.No</th>
                          <th>Menu</th>
                          <th>View Page</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php $i=1;?>
                            @foreach($mainMenu as $row)
                              <tr>
                                <td>{{ $i++; }}</td>
                                <td>{{ $row['categoryName'] }}</td>
                                <td>@if(!empty($row['page_url']))<a target="blank" href="{{ $row['page_url'] }}">View Page</a>@endif</td>
                                <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                                <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                                <td>
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    @if ($row['status']==1)
                                      <a class="updateMainMenuStatus" id="mainMenu-{{ $row['id'] }}" mainMenu_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                    @else
                                      <a class="updateMainMenuStatus" id="mainMenu-{{ $row['id'] }}" mainMenu_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                    @endif
                                    &nbsp;&nbsp;
                                  @endif
                                  @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                    <a href="{{ url('admin/tech2globe-layout/add-edit-main-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                    &nbsp;&nbsp;
                                  @endif
                                  @if ($pagesModule['full_access']==1)
                                    <a class="confirmDelete" name="MainMenu" title="Delete Main Menu" href="javascript:void(0)" record="mainMenu" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                                  @endif
                                </td>
                              </tr>
                            @endforeach
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
            </div> 
            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseTwo">
                  <h4 class="card-title">
                      Sub Menu
                  </h4>
                </a>
                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                  <a href="{{ url('admin/tech2globe-layout/add-edit-sub-menu') }}" class="d-inline-block w-25 border-0 btn btn-primary">Add Sub Menu</a>
                @endif
              </div>
              <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="subMenu" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Sub Menu</th>
                        <th>Main Menu</th>
                        <th>View Page</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                          @foreach($subMenu as $row)
                            <tr>
                              <td>{{ $i++; }}</td>
                              <td>{{ $row['subCategoryName'] }}</td>
                              <td>
                                @foreach ($mainMenu as $item)
                                    @if($item['id'] == $row['category_id']) {{ $item['categoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>@if(!empty($row['page_url']))<a target="blank" href="{{ $row['page_url'] }}">View Page</a>@endif</td>
                              <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                              <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                              <td>
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  @if ($row['status']==1)
                                    <a class="updateSubMenuStatus" id="subMenu-{{ $row['id'] }}" subMenu_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                  @else
                                    <a class="updateSubMenuStatus" id="subMenu-{{ $row['id'] }}" subMenu_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                  @endif
                                  &nbsp;&nbsp;
                                @endif
                                @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  <a href="{{ url('admin/tech2globe-layout/add-edit-sub-menu/'.$row['id']) }}"><i class="fas fa-edit"></i></a>
                                  &nbsp;&nbsp;
                                @endif
                                @if ($pagesModule['full_access']==1)
                                  <a class="confirmDelete" name="subMenu" title="Delete Sub Menu" href="javascript:void(0)" record="subMenu" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div> 
            <div class="card card-primary card-outline"> 
              <div class="card-header d-flex justify-content-between">
                <a class="d-inline-block w-100 border-0" data-toggle="collapse" href="#collapseThree">
                  <h4 class="card-title">
                      All Pages
                  </h4>
                </a>
              </div>
              <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="allPages" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Menu</th>
                        <th>Sub Menu</th>
                        <th>Page Name</th>
                        <th>View Page</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $i=1;?>
                          @foreach($allPages as $row)
                            <tr>
                              <td>{{ $i++; }}</td>
                              <td>
                                @foreach ($mainMenu as $item)
                                    @if($item['id'] == $row['category_id']) {{ $item['categoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>
                                @foreach ($subMenu as $item)
                                    @if($item['id'] == $row['sub_category_id']) {{ $item['subCategoryName'] }} @endif
                                @endforeach
                              </td>
                              <td>{{$row['page_name']}}</td>
                              <td>@if(!empty($row['page_url']))<a target="blank" href="http://localhost:8000/{{ $row['page_url'] }}">View Page</a>@endif</td>
                              <td>{{ date('d-m-Y', strtotime($row['created_at'])) }}</td>
                              <td>{{ date('d-m-Y', strtotime($row['updated_at'])) }}</td>
                              <td>
                                {{-- @if ($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                  @if ($row['status']==1)
                                    <a class="updatePortfolioStatus" id="portfolio-{{ $row['id'] }}" portfolio_id="{{ $row['id'] }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                  @else
                                    <a class="updatePortfolioStatus" id="portfolio-{{ $row['id'] }}" portfolio_id="{{ $row['id'] }}" style="color: grey;" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                  @endif
                                  &nbsp;&nbsp;
                                @endif --}}
                                {{-- @if ($pagesModule['full_access']==1)
                                  <a class="confirmDelete" name="Portfolio" title="Delete Portfolio" href="javascript:void(0)" record="portfolio" recordid="{{ $row['id'] }}"><i class="fas fa-trash"></i></a>
                                @endif --}}
                              </td>
                            </tr>
                          @endforeach
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>     
          </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
