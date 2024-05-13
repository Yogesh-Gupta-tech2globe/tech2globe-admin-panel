
<style>
    .offcanvas-body-scrollbar::-webkit-scrollbar {
        background-color: #d8d8d8;
        width: 5px;
    }

    .offcanvas-body-scrollbar::-webkit-scrollbar-thumb {
        background-color: #c01f29;
        border-radius: 10px;
    }

    .hovered li:first-child>a {

        background-color: #efefef !important;
    }
</style>
<!-- Header section start here-->
<header class="display-none header-topbar-main">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-5">
                    <img src="{{ url('images/icons/skype.png') }}" class="icon" alt="Skype">
                    <a href="skype:{{$skypeId->link}}?call">{{$skypeId->link}}</a>
                </div>
                <div class="col-md-3 col-sm-7">
                    <!-- <img class="lozad" src="images/new-page-images/icons/gmail.png" class="icon" alt="Gmail"> -->
                    <i class="fa-solid fa-envelope text-white pt-1"></i>
                    <a href="mailto:{{$mailId->link}}">{{$mailId->link}}</a>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="link float-end">
                        <a href="<?php echo $base_url ; ?>">Case Studies</a>
                        <a href="<?php echo $base_url ; ?>">Portfolio</a>
                        <a href="https://blog.tech2globe.com/">Blogs</a>
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
                                <a class="navbar-brand" href="<?php echo $base_url; ?>"><img class="lozad" src="{{ url('images/tech2globe-logo.png') }}" class="brand-logo" alt="Tech 2 globe Logo"></a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-md-8 offset-1 col-sm-12 mt-3 d-none d-lg-block">
                    <div class="row align-items-center">
                        <ul class="d-flex mb-0 ps-0 justify-content-end">
                            @foreach ($companyBranch as $row)  
                           
                                <li class="d-flex me-3">
                                    <div class="flag-icon">
                                        <img class="lozad" src="{{ url('images/flag/'.$row["flag"].'') }}" alt="{{$row['name']}}">
                                    </div>
                                    <div class="ms-2">
                                        <!-- <h6>Phone</h6> -->
                                        <a href="tel:{{$row['phone']}}">{{$row['phone']}}</a>
                                    </div>
                                </li>

                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Google Tag Manager -->
    {{-- <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NNKV63RF');
    </script> --}}
    <!-- End Google Tag Manager -->

    <!-- the Google conversion action tracking code  -->
    {{-- <script>
        gtag('event', 'conversion', {
            'send_to': 'AW-11289383191/E75ZCJnZk6AZEJeimYcq'
        });
    </script> --}}

    <!-- Facebook Pixel Code -->
    {{-- <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '198071485682730');
        fbq('track', 'PageView');
    </script> --}}
    {{-- <noscript><img class="lozad" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=198071485682730&ev=PageView&noscript=1" /></noscript> --}}
    <!-- End Facebook Pixel Code -->
    <!--<link href="css/cookies/cookies-message.min.css" rel="stylesheet" async>
<script src="/cookies/cookies-message.min.js" async></script>-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-51012394-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-51012394-1');
        var console = {};
        console.log = function() {};
    </script> --}}
    <!-- Google tag (gtag.js) -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-972611168"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'AW-972611168');
    </script> --}}
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
                      <li class="ruby-menu-mega-blog"><a @if(!empty($row['page_url'])) href="{{ $row['page_url'] }}" @else href="javascript:void(0)" @endif>{{$row['categoryName']}}</a>
  
                          @foreach($allPages as $data)
                          @if($row['id'] == $data['category_id'])<div class="">@break @endif
                          @endforeach
  
                              <ul class="ruby-menu-mega-blog-nav">
  
                                  @foreach ($subMenu as $item)
                                      @if($item['category_id'] == $row['id'])

                                        <li><a @if(!empty($item['page_url'])) href="{{ $item['page_url'] }}" @else href="javascript:void(0)" @endif>{{ $item['subCategoryName'] }}</a>
    
                                            @foreach($allPages as $data)
                                                @if($row['id'] == $data['category_id'])
                                                    <div class="ruby-grid ruby-grid-lined addMenuVisibility">
                                                        <div class="ruby-row">
                                                            
                                                            @foreach($pageCategory as $pagecat)
                                                                @if($pagecat['sub_category_id'] == $item['id'])
                                                                    <div class="ruby-col-3">
                                                                        <span class="ruby-c-title menu-heading"><a @if(!empty($pagecat['page_url'])) href="{{ $pagecat['page_url'] }}" @else href="javascript:void(0)" @endif"><strong>{{$pagecat['name']}}</strong></a></span>
                                                                        @foreach ($allPages as $data)
                                                                            @if ($data['category_id'] == $row['id'] && $data['sub_category_id'] == $item['id'] && $data['page_category_id'] == $pagecat['id'])
                                                                                
                                                                                <div class="ruby-row">
                                                                                    <div class="ruby-col-11"><span class="ruby-c-title"><a href="/{{$data['page_url']}}">{{$data['page_name']}}</a></span></div>
                                                                                </div>
                                                                        
                                                                            @endif
                                                                        @endforeach
                    
                                                                    </div>
                                                                @endif
                                                            @endforeach

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
                          @break
                          @endif
                          @endforeach
                          
                      </li>
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
            <a class="navbar-brand" href="<?php echo $base_url; ?>"><img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/tech2globe-logo.png" class="brand-logo-mobile" alt="Tech 2 globe Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/tech2globe-logo.png" class="brand-logo" alt="Tech 2 globe Logo">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body offcanvas-body-scrollbar">
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
                                    <button class="accordion-button py-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                                        <a class="dropdown-item" href="<?php echo $base_url . "/about-us";  ?>">About Tech2Globe </a>
                                    </button>
                                </h2>
                                <div id="collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/Infrastructure";?>">Infrastructure</a></li>
                                            <li><a href="<?php echo $base_url . "/our-values";?>">Our Values</a></li>
                                            <li><a href="<?php echo $base_url . "/associations-ascription"; ?>">Associations Ascription</a>
                                            </li>
                                            <li><a href="<?php echo $base_url . "/clients"; ?>">Clients</a></li>
                                            <li><a href="<?php echo $base_url . "/csr-initiatives";?>">CSR Initiatives</a></li>
                                            <li><a href="<?php echo $base_url . "/5Years-milemakers";?>">5 Years Milemakers </a></li>
                                            <li><a href="<?php echo $base_url . "/our-team";?>">Our Team </a></li>
                                            <li><a href="<?php echo $base_url . "/career";?>">Career </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button py-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo">
                                        <a class="dropdown-item" href="<?php echo $base_url . "/Resources";  ?>">Resources</a>
                                    </button>
                                </h2>
                                <div id="collapseTwo2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/faq";?>">FAQ</a></li>
                                            <li><a href="<?php echo $base_url . "/testimonial";?>">Testimonial</a></li>
                                            <li><a href="<?php echo $base_url . "/case-studies.php"; ?>">Case Studies</a></li>
                                            <li><a href="<?php echo $base_url . "/portfolio"; ?>">Portfolio</a> </li>
                                            <li><a href="https://blog.tech2globe.com/">Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="bg-white text-dark mR-btn" type="button">
                                        <a class="" href="<?php echo $base_url . "/startup-consulting";  ?>">Start up Consulting</a>
                                    </button>
                                </h2>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="bg-white text-dark mR-btn" type="button">
                                        <a class="" href="<?php echo $base_url . "/contact-us";  ?>">Contact</a>
                                    </button>
                                </h2>
                            </div>


                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <div class="accordion" id="accordionNavProfile">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne01.1" aria-expanded="true" aria-controls="collapseOne01.1">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Amazon Consulting</strong></a>
                                    </button>
                                </h2>
                                <div id="collapseOne01.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                <a href="<?php echo $base_url . "/amazon-consulting-services";  ?>">Amazon Consulting Service </a>
                                            </li>
                                            <li><a href="<?php echo $base_url . "/amazon-fba-consulting";  ?>">Amazon Sales Boost </a></li>
                                            <li><a href="<?php echo $base_url . "/amazon-sell-global-services";  ?>">Amazon Graphics</a></li>
                                            <li><a href="<?php echo $base_url . "/amazon-virtual-assistance";  ?>">Amazon Product</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo2.2" aria-expanded="false" aria-controls="collapseTwo2.2">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Ecommerce</strong></a>
                                    </button>
                                </h2>
                                <div id="collapseTwo2.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/magento-product-upload-services";  ?>">Product Uploading</a></li>
                                            <li><a href="<?php echo $base_url . "/nop-commerce-development";  ?>">Web Stores</a></li>
                                            <li><a href="<?php echo $base_url . "/online-business-management-flipkart";  ?>">Indian Ecommerce</a></li>
                                            <li><a href="<?php echo $base_url . "/amazon-consulting-services";  ?>">International Ecommerce </a></li>
                                            <li><a href="<?php echo $base_url . "/woocommerce-product-upload-services";  ?>">WooCommerce</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree3.3" aria-expanded="false" aria-controls="collapseThree3.3">
                                        <strong>Data Management</strong>
                                    </button>
                                </h2>
                                <div id="collapseThree3.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/data-entry-services";  ?>">Data Entry</a></li>
                                            <li><a href="<?php echo $base_url . "/business-research-services";  ?>">Data Intelligence Services</a></li>
                                            <li><a href="<?php echo $base_url . "/data-management-services";  ?>">Data Management </a></li>
                                            <li><a href="<?php echo $base_url . "/data-marketing-services";  ?>">Data Marketing</a></li>
                                            <li><a href="<?php echo $base_url . "/data-mining-services";  ?>">Data Mining</a></li>
                                            <li><a href="<?php echo $base_url . "/data-cleansing-services";  ?>">Data Cleansing</a></li>
                                            <li><a href="<?php echo $base_url . "/data-processing-services";  ?>">Data Processing</a></li>
                                            <li><a href="<?php echo $base_url . "/transcription-services";  ?>">Transcription</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour4.4" aria-expanded="false" aria-controls="collapseFour4.4">
                                        <strong>BPO - KPO</strong>
                                    </button>
                                </h2>
                                <div id="collapseFour4.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/inbound-call-center";  ?>">Inbound Call Center</a></li>
                                            <li><a href="<?php echo $base_url . "/outbound-call-center-solutions";  ?>">Outbound Call Center</a></li>
                                            <li><a href="<?php echo $base_url . "/telemarketing-services";  ?>">Telemarketing Services</a></li>
                                            <li><a href="<?php echo $base_url . "/lead-generation-services";  ?>">Lead Generation Services</a></li>
                                            <li><a href="<?php echo $base_url . "/virtual-assistant-services";  ?>">Virtual Assistant Services</a></li>
                                            <li><a href="<?php echo $base_url . "/call-center-monitoring";  ?>">Call Center Monitoring</a></li>
                                            <li><a href="<?php echo $base_url . "/cctv-monitoring-services";  ?>">CCTV Monitoring</a></li>
                                        </ul>
                                        
                                        
                                    </div>
                                </div>
                               
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour4.01" aria-expanded="false" aria-controls="collapseFour4.01">
                                        <strong>Data Services for AI Software</strong>
                                    </button>
                                </h2>
                                <div id="collapseFour4.01" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/data-support-kpo-ai-services";  ?>">AI Data Support for KPO Services
                                                </a></li>
                                            <li><a href="<?php echo $base_url . "/data-support-ai-services";  ?>">AI Data Support Services</a></li>
                                            <li><a href="<?php echo $base_url . "/chat-support-services";  ?>">Chat Support Services For AI Products</a></li>
                                            <li><a href="<?php echo $base_url . "/customer-data-migration-services";  ?>">Customer Data Migration Services</a></li>
                                            <li><a href="<?php echo $base_url . "/customer-onboarding-services";  ?>">Customer Onboarding Services</a></li>
                                            <li><a href="<?php echo $base_url . "/project-implementation-services";  ?>">Project Implementation Services
                                                </a></li>
                                            <li><a href="<?php echo $base_url . "/reporting-and-analytics";  ?>">Reporting And Analytics
                                                </a></li>
                                            <li><a href="<?php echo $base_url . "/virtual-assistant-services";  ?>">Virtual Assistant Services</a></li>
                                            <li><a href="<?php echo $base_url . "/voice-support-for-ai-products";  ?>">Voice Support For AI Products
                                                </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive5.5" aria-expanded="false" aria-controls="collapseFive5.5">
                                        <strong>Finance & Accounting</strong>
                                    </button>
                                </h2>
                                <div id="collapseFive5.5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/bookkeeping-services";  ?>">Book Keeping Services</a></li>
                                            <li><a href="<?php echo $base_url . "/accounting-services";  ?>">Accounting Services</a></li>
                                            <li><a href="<?php echo $base_url . "/accounts-payable-services";  ?>">Accounts Payable</a></li>
                                            <li><a href="<?php echo $base_url . "/accounts-receivable-services";  ?>">Accounts Receivable</a></li>
                                            <li><a href="<?php echo $base_url . "/tax-preparation";  ?>">Tax Preparation</a></li>
                                            <li><a href="<?php echo $base_url . "/financial-analysis-services";  ?>">Financial Analysis</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix6.6" aria-expanded="false" aria-controls="collapseSix6.6">
                                        <strong>Digital Marketing</strong>
                                    </button>
                                </h2>
                                <div id="collapseSix6.6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/digital-marketing-services";  ?>">Online Marketing</a></li>
                                            <li><a href="<?php echo $base_url . "/paid-search-advertising-services";  ?>">Paid Marketing</a></li>
                                            <li><a href="<?php echo $base_url . "/digital-marketing-packages";  ?>">Digital Marketing Packages</a></li>
                                            <li><a href="<?php echo $base_url . "/brand-reputation-management";  ?>">ORM</a></li>
                                            <li><a href="<?php echo $base_url . "/email-marketing-services";  ?>">Email Marketing</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven7.7" aria-expanded="false" aria-controls="collapseSeven7.7">
                                        <strong>Web & Mobile Development</strong>
                                    </button>
                                </h2>
                                <div id="collapseSeven7.7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/software-development";  ?>">Software Development</a></li>
                                            <li><a href="<?php echo $base_url . "/mobile-app-development";  ?>">Mobile App Development </a></li>
                                            <li><a href="<?php echo $base_url . "/oracle-applications";  ?>">Database Competencies</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight8.8" aria-expanded="false" aria-controls="collapseEight8.8">
                                        <strong>Graphic & Video Editing</strong>
                                    </button>
                                </h2>
                                <div id="collapseEight8.8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/photo-editing-services";  ?>">Photo Editing Services</a></li>
                                            <li><a href="<?php echo $base_url . "/image-enhancement";  ?>">Image Enhancement</a></li>
                                            <li><a href="<?php echo $base_url . "/image-clipping";  ?>">Image Clipping</a></li>
                                            <li><a href="<?php echo $base_url . "/real-estate-image-processing";  ?>">Real Estate</a></li>
                                            <li><a href="<?php echo $base_url . "/bulk-image-conversion";  ?>">Special Service</a></li>
                                            <li><a href="<?php echo $base_url . "/amazon-ebc-services";  ?>">Graphic Services</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine9.9" aria-expanded="false" aria-controls="collapseNine9.9">
                                        <strong>Custom Web Development</strong>
                                    </button>
                                </h2>
                                <div id="collapseNine9.9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/web-development";  ?>">Web Development</a></li>
                                            <li><a href="<?php echo $base_url . "/laravel-development-services";  ?>">Framework Development </a></li>
                                            <li><a href="<?php echo $base_url . "/Joomla-development";  ?>">Open Source Development</a></li>
                                            <li><a href="<?php echo $base_url . "/dot-net-development-services";  ?>">Microsoft Technology </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen10.0" aria-expanded="false" aria-controls="collapseTen10.0">
                                        <strong>Ecommerce Solutions</strong>
                                    </button>
                                </h2>
                                <div id="collapseTen10.0" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/magento-development-company";  ?>">Magento </a></li>
                                            <li><a href="<?php echo $base_url . "/woocommerce-development";  ?>">WooCommerce</a></li>
                                            <li><a href="<?php echo $base_url . "/shopify-development-company";  ?>">Shopify</a></li>
                                            <li><a href="<?php echo $base_url . "/volusion-development-services";  ?>">Volusion </a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven11.1" aria-expanded="false" aria-controls="collapseEleven11.1">
                                        <strong>Mobile Application Solution</strong>
                                    </button>
                                </h2>
                                <div id="collapseEleven11.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/react-native-app-development";  ?>">React Native App </a></li>
                                            <li><a href="<?php echo $base_url . "/ionic-app-development-company";  ?>">Ionic App</a></li>
                                            <li><a href="<?php echo $base_url . "/flutter-app-development-services";  ?>">Flutter App</a></li>
                                            <li><a href="<?php echo $base_url . "/kotlin-app-development";  ?>">Kotlin App</a></li>
                                            <li><a href="<?php echo $base_url . "/phonegap-app-development-service";  ?>">PhoneGap App</a></li>
                                            <li><a href="<?php echo $base_url . "/xamarin-mobile-app-development";  ?>">Xamarin App</a></li>
                                            <li><a href="<?php echo $base_url . "/hybrid-mobile-app-development";  ?>">Hybrid App</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve12.2" aria-expanded="false" aria-controls="collapseTwelve12.2">
                                        <strong>Emerging Technologies</strong>
                                    </button>
                                </h2>
                                <div id="collapseTwelve12.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/ai-chatbot-development";  ?>">AI Chatbot Development</a></li>
                                            <li><a href="<?php echo $base_url . "/ar-vr-app-development-company";  ?>">AR/VR Development</a></li>
                                            <li><a href="<?php echo $base_url . "/aws-development-services";  ?>">AWS Development</a></li>
                                            <li><a href="<?php echo $base_url . "/blockchain-development-services";  ?>">BlockChain Development </a></li>
                                            <li><a href="<?php echo $base_url . "/iot-development-services";  ?>">IOT Development</a></li>
                                            <li><a href="<?php echo $base_url . "/iwatch-application-development-services";  ?>">IWatch App Development</a></li>
                                            <li><a href="<?php echo $base_url . "/wearable-app-development-services";  ?>">Wearable App Development </a></li>
                                            <li><a href="<?php echo $base_url . "/machine-learning-services-and-consultation";  ?>">Machine Learning </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen13.3" aria-expanded="false" aria-controls="collapseThirteen13.3">
                                        <strong>UI/UX Design</strong>
                                    </button>
                                </h2>
                                <div id="collapseThirteen13.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/web-development";  ?>">Responsive Web Designing</a></li>
                                            <li><a href="<?php echo $base_url . "/graphic-design-services";  ?>">Graphic Design </a></li>
                                            <li><a href="<?php echo $base_url . "/corporate-branding";  ?>">Corporate Branding</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFouteen14.4" aria-expanded="false" aria-controls="collapseFouteen14.4">
                                        <strong>Web & Mobile Testing</strong>
                                    </button>
                                </h2>
                                <div id="collapseFouteen14.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li><a href="<?php echo $base_url . "/automation-testing-services";  ?>">Automation Testing</a></li>
                                            <li><a href="<?php echo $base_url . "/manual-testing-services";  ?>">Manual Testing</a></li>
                                            <li><a href="<?php echo $base_url . "/ecommerce-testing-services";  ?>">Ecommerce Testing</a></li>
                                            <li><a href="<?php echo $base_url . "/selenium-testing-services";  ?>">Selenium Testing</a></li>

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
                <div class="row align-items-center mt-5 sidebar-contact-details-container">
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center indian-data-text">
                        <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/svgs/bharat-flag-icon.svg" class="flag-icon" alt="India">
                        <div class="ms-3">
                            <a href="tel:+91-9899675039">+91-9899675039</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                        <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/svgs/canada-flag-icon.svg" class="flag-icon" alt="Canada">
                        <div class="ms-3">
                            <a href="tel:1-778-382-9628">+1-778-382-9628</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                        <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/svgs/united-state-flag-icon.svg" class="flag-icon" alt="United States of America">
                        <div class="ms-3">
                            <a href="tel:1-516-858-4836">+1-516-858-4836</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center mb-3">
                        <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/svgs/united-state-flag-icon.svg" class="flag-icon" alt="United States of America">
                        <div class="ms-3">
                            <a href="tel:1-516-858-5840">+1-516-858-5840</a>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-3 col-sm-6 py-1 mt-2 d-flex align-items-center">
                        <img class="lozad" src="<?php echo $base_url ?>/images/new-page-images/icons/skype.png" class="icon" alt="Skype">
                        <div class="ms-3">
                            <a href="mailto:info.tech2globe">Info.tech2globe</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                        <i class="fa-solid fa-envelope text-danger fs-3"></i>
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
