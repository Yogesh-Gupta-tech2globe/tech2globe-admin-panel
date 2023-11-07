
<!-- Header section start here-->
<header class="display-none">

                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-5">
                                <img src="images/icons/26722.png" class="icon" alt="Skype">
                                <a href="skype:Info.tech2globe?call">Info.tech2globe</a>
                            </div>
                            <div class="col-md-3 col-sm-7">
                                <img src="images/icons/41904.png" class="icon" alt="Gmail">
                                <!-- <i class="fa-solid fa-envelope text-white pt-1"></i> -->
                                <a href="mailto:tech2globe@info.com">tech2globe@info.com</a>
                            </div>
                            <div class="col-md-7 col-sm-12">
                                <div class="link float-end">
                                    <a href="<?php echo $base_url . "data-management"; ?>">Portfolio</a>
                                    <a href="<?php echo $base_url . "contact-us"; ?>">Case Studies</a>
                                    <a href="<?php echo $base_url . "contact-us"; ?>">Blog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bottom-header">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-md-3 col-sm-12">
                                <div class="row">
                                    <nav class="navbar navbar-expand-lg header-location">
                                        <div class="container">
                                            <a class="navbar-brand" href="http://localhost:8000"><img src="images/logo/76239.jpg" class="brand-logo" alt="Tech 2 globe Logo"></a>
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mb-2 mb-lg-0">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link global-dropdown dropdown-toggle w-100" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="global">Global</span>
                                                        </a>
                                                        <ul class="dropdown-menu global-list"><li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/6139.png" alt="India"> India
                                                                        </div>
                                                                    </a>
                                                                </li><li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/81166.png" alt="Canada"> Canada
                                                                        </div>
                                                                    </a>
                                                                </li><li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/96695.png" alt="USA"> USA
                                                                        </div>
                                                                    </a>
                                                                </li><li><a target="_blank" class="dropdown-item" href="https://www.tech2globe.com/">
                                                                        <div class="global-icon">
                                                                            <img src="images/svgs/72531.png" alt="Canada"> Canada
                                                                        </div>
                                                                    </a>
                                                                </li></ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-8 offset-1 col-sm-12 mt-3 d-none d-lg-block">
                                <div class="row align-items-center"><div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/6139.png" alt="India">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:457896-7845-00">457896-7845-00</a>
                                        </div>
                                    </div><div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/81166.png" alt="Canada">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:457896-7845-00">457896-7845-00</a>
                                        </div>
                                    </div><div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/96695.png" alt="USA">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:7845-8585-6000">7845-8585-6000</a>
                                        </div>
                                    </div><div class="col-md-3 col-sm-6 d-flex align-items-center">
                                        <div class="flag-icon">
                                            <img src="images/svgs/72531.png" alt="Canada">
                                        </div>
                                        <div class="ms-3">
                                            <!-- <h6>Phone</h6> -->
                                            <a href="tel:4174851203">4174851203</a>
                                        </div>
                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>
</header>
<!-- Header section end here -->

<!-- START: RUBY HEADER -->
<div class="ruby-menu-demo-header bg-blue display-none">
  <!-- ########################### -->
  <!-- START: RUBY HORIZONTAL MENU -->
  <div class="container-fluid p-25">
      <div class="ruby-wrapper">

          <ul class="ruby-menu">

            @foreach ($mainMenu as $row)
                @if($row['status'] == 1)
                    <li class="ruby-menu-mega-blog"><a @if(!empty($row['page_url'])) href="{{ $row['page_url'] }}" @else href="javascript:void(0)" @endif>{{$row['categoryName']}}</a>

                        @foreach($allPages as $data)
                        @if($row['id'] == $data['category_id'])<div class="">@endif
                        @endforeach

                            <ul class="ruby-menu-mega-blog-nav">

                                @foreach ($subMenu as $item)
                                    @if($item['category_id'] == $row['id'] && $item['status'] == 1)
                                    <li><a @if(!empty($item['page_url'])) href="{{ $item['page_url'] }}" @else href="javascript:void(0)" @endif>{{ $item['subCategoryName'] }}</a>

                                        @foreach($allPages as $data)
                                        @if($row['id'] == $data['category_id'])
                                        <div class="ruby-grid ruby-grid-lined addMenuVisibility">
                                            <div class="ruby-row">
                                                <div class="ruby-col-3">

                                                @foreach ($allPages as $data)
                                                    @if ($data['category_id'] == $row['id'] && $data['sub_category_id'] == $item['id'])
                                                    
                                                        <div class="ruby-row">
                                                            <div class="ruby-col-11"><span class="ruby-c-title"><a href="<?php echo $base_url; ?>{{$data['page_url']}}">{{$data['page_name']}}</a></span></div>
                                                        </div>
                                                
                                                    @endif
                                                @endforeach

                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach

                                    </li>
                                    @endif
                                @endforeach

                            </ul>
                        @foreach($allPages as $data)
                        @if($row['id'] == $data['category_id'])</div>
                        <span class="ruby-dropdown-toggle"></span>
                        @endif
                        @endforeach
                        
                    </li>
                
              @endif
            @endforeach
          </ul>

          <form class="d-flex float-end" role="search">
              <a href="<?php echo $base_url . "/contact-us";  ?>" class="button-red" type="submit">REQUEST A QUOTE</a>
          </form>
      </div>
  </div>
  <!-- END:   RUBY HORIZONTAL MENU -->
  <!-- ########################### -->

</div>
<!-- END: RUBY HEADER -->

<!-- Mobile Navbar section start here -->
<nav class="navbar bg-light sticky-top display-mob-block mobile-nav">
  <div class="container">
      <div class="d-flex justify-content-between">
          <a class="navbar-brand" href="javascript:void(0)"><img src="images/tech2globe-logo.png" class="brand-logo-mobile" alt="Tech 2 globe Logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
          </button>
      </div>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
              <img src="images/tech2globe-logo.png" class="brand-logo" alt="Tech 2 globe Logo">
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
              <nav>
                  <div class="nav nav-tabs d-flex justify-content-between" id="nav-tab" role="tablist">
                      <button class="nav-link text-secondary active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">About</button>
                      <button class="nav-link text-secondary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Services</button>
                  </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                      <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/about-us";  ?>">About Tech2Globe </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/Infrastructure";  ?>">Infrastructure </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/our-values";  ?>">Our Values </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/associations-ascription";  ?>">Associations Ascription </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/clients";  ?>">Clients </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/csr-initiatives";  ?>">CSR Initiatives </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/5Years-milemakers";  ?>">5 Years Milemakers </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/our-team";  ?>">Our Team </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/life-at-tech2globe";  ?>">Life@Tech2globe </a>
                                  </button>
                              </h2>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <a class="dropdown-item" href="<?php echo $base_url . "/career";  ?>">Career </a>
                                  </button>
                              </h2>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                      <div class="accordion" id="accordionExample">
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Amazon Consulting</strong></a>
                                  </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="<?php echo $base_url . "/amazon-dropshipping";  ?>">Amazon Dropshipping </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-fba-consulting";  ?>">Amazon FBA Consulting </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-sell-global-services";  ?>">Amazon Global Business </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-virtual-assistance";  ?>">Amazon Virtual Assistance </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-transparency-program";  ?>"> Amazon Transpanrency Services </a></li>
                                          <li><a href="<?php echo $base_url . "/seller-reinstatement";  ?>">Seller Account Reinstatement </a></li>
                                          <li><a href="<?php echo $base_url . "/vendor-account-management";  ?>">Vendor Account Management </a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Amazon Sales Boost</strong></a>
                                  </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="<?php echo $base_url . "/amazon-dsp";  ?>">Amazon Dsp</a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-marketing-services";  ?>">Amazon Marketing Services </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-advertising-services";  ?>">Amazon Advertising Services </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-product-pricing-strategy";  ?>">Amazon Product & Pricing </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-account-management";  ?>">Amazon Account Management </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-ppc-services";  ?>">Amazon PPC Services </a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <strong>Amazon Graphics</strong>
                                  </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="<?php echo $base_url . "/store-creation";  ?>">Store Creation </a></li>
                                          <li><a href="<?php echo $base_url . "/enhanced-brand-content";  ?>">Enhanced Brand Content </a></li>
                                          <li><a href="<?php echo $base_url . "/image-editing-services";  ?>">Amazon Image Editing Services </a></li>
                                          <li><a href="<?php echo $base_url . "/premium-plus-content-services";  ?>">Premium A+ Content </a></li>
                                          <li><a href="<?php echo $base_url . "/aplus-catalog";  ?>">A+ Cataloging </a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="accordion-item">
                              <h2 class="accordion-header">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      <strong>Amazon Product</strong>
                                  </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                  <div class="accordion-body">
                                      <ul>
                                          <li><a href="<?php echo $base_url . "/amazon-copywriting";  ?>">Amazon Copywriting </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-product-catalog";  ?>">Amazon Seller Product Cataloging </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-product-translation";  ?>">Amazon Product Translation </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-review-rating";  ?>">Amazon Review & Rating </a></li>
                                          <li><a href="<?php echo $base_url . "/amazon-seo-listing-optimization";  ?>">Amazon SEO & Listing Optimization </a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <hr>
              <form class="d-flex mt-2" role="search">
                  <a href="<?php echo $base_url . "/contact-us";  ?>" class="button-red" type="submit">REQUEST A QUOTE</a>
              </form>
              <div class="row align-items-center mt-5">
                  <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                      <img src="images/svgs/bharat-flag-icon.svg" class="flag-icon" alt="India">
                      <div class="ms-3">
                          <a href="tel:011-430-10-700">011-430-10-700</a>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                      <img src="images/svgs/united-state-flag-icon.svg" class="flag-icon" alt="America">
                      <div class="ms-3">
                          <a href="tel:1-516-858-5840">+1-516-858-5840</a>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                      <img src="images/svgs/canada-flag-icon.svg" class="flag-icon" alt="India">
                      <div class="ms-3">
                          <a href="tel:1-250-206-8787">+1-250-206-8787</a>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center mb-3">
                      <img src="images/svgs/canada-flag-icon.svg" class="flag-icon" alt="America">
                      <div class="ms-3">
                          <a href="tel:1-516-858-5840">+1-516-858-5840</a>
                      </div>
                  </div>
                  <hr>
                  <div class="col-md-3 col-sm-6 py-1 mt-2 d-flex align-items-center">
                      <img src="images/icons/skype.png" class="icon" alt="Skype">
                      <div class="ms-3">
                          <a href="mailto:info.tech2globe">Info.tech2globe</a>
                      </div>
                  </div>
                  <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                      <i class="fa-solid fa-envelope text-danger"></i>
                      <div class="ms-3">
                          <a href="mailto:info@tech2globe.com">Info@tech2globe.com</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</nav>
<!-- Mobile Navbar section end here -->