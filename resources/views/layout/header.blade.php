
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
                                <a class="navbar-brand" href="/"><img class="lozad" src="{{ url('images/logo/'.$sitelogo['name']) }}" class="brand-logo" alt="Tech 2 globe Logo"></a>
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
            <a class="navbar-brand" href="/"><img class="lozad" src="{{ url('images/logo/'.$sitelogo['name']) }}" class="brand-logo-mobile" alt="Tech 2 globe Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <img class="lozad" src="{{ url('images/logo/'.$sitelogo['name']) }}" class="brand-logo" alt="Tech 2 globe Logo">
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
                            
                        </div>
                    </div>
                </div>
                <hr>
                <form class="d-flex mt-2" role="search">
                    <a href="<?php echo $base_url . "/contact-us";  ?>" class="button-red" type="submit">REQUEST A QUOTE</a>
                </form>
                <div class="row align-items-center mt-5 sidebar-contact-details-container">
                    @foreach ($companyBranch as $row)
                        <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center indian-data-text">
                            <img class="lozad" src="{{ url('images/flag/'.$row["flag"].'') }}" class="flag-icon" alt="{{$row['name']}}" width="50px" height="40px">
                            <div class="ms-3">
                                <a href="tel:{{$row['phone']}}">{{$row['phone']}}</a>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="col-md-3 col-sm-6 py-1 mt-2 d-flex align-items-center">
                        <img class="lozad" src="{{ url('images/icons/skype.png') }}" class="icon" alt="Skype" width="28px" height="28px">
                        <div class="ms-3">
                            <a href="skype:{{$skypeId->link}}?call">{{$skypeId->link}}</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center">
                        <i class="fa-solid fa-envelope text-danger fs-3"></i>
                        <div class="ms-3">
                            <a href="mailto:{{$mailId->link}}">{{$mailId->link}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Mobile Navbar section end here -->
