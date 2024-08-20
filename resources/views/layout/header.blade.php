
<style>
    .offcanvas-body-scrollbar::-webkit-scrollbar {
        background: none;
        width: 3px;
    }

    .dropdown__services__for__mobile .accordion-item {
        background: #f4f3f2;
    }

    .accordion__item__megamenu .accordion-collapse ul li {
        line-height: 1rem;
    }

    .dropdown__services__for__mobile .accordion__item__megamenu a {
        background: none;
    }

    .offcanvas-body-scrollbar::-webkit-scrollbar-thumb {
        background-color: #c01f29;
        border-radius: 10px;
    }

    .hovered li:first-child>a {

        background-color: #efefef !important;
    }

    /* newsletter__mob */
    .newsletter__container__mobile p {
        margin-block: 7px;
    }

    .newsletter__container__mobile input.w-100 {
        background: rgb(224 224 224 / 65%);
        border: 1px solid #141e4630;
        padding: 6px 10px;
        font-size: 14px;
        height: 38px;
        padding-left: 9px;
    }
    form#subscriber_form {
    display: flex;
}

    .newsletter__container__mobile button.btn__subscribe__mob {
        background: #c01f29;
        border-radius: 2px;
        font-weight: 500;
        border: 1px solid #c01f29;
        width: 100%;
        font-size: 12px;
        height: 38px;
        display: flex;
        place-content: center;
        align-items: center;
    }

    .newsletter__container__mobile {
        margin-block: 8px;
    }


    /* newsletter__mob */



    /* review__start */
    .brands__logs__container> {
        padding-inline: 0;
    }

    .brands__logs__container .img__container {
        height: auto;
        width: 65%;
        margin: 3px auto;
    }

    .brands__logs__container {
        background: rgb(221 219 215 / 33%);
        padding-block: 4px;
        padding-inline: 0;
        border-radius: 4px;
        margin-inline: 1px !important;
        border: 1px dashed rgb(207 205 201 / 64%);
    }

    .brands__logs__container .sub__star__container {
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .brands__logs__container .review__counter {
        text-align: center;
        font-weight: 600;
    }

    .brands__logs__container .review__counter p {
        margin-block: 2px;
        font-size: 12px;
        text-align: center;
    }

    .brands__logs__container .sub__star__container svg {
        font-size: 8px;
        padding: 1px;
    }

    .brands__logs__container .sub__star__container span.review__num {
        padding: 0px;
        color: #323232;
        font-size: 12px !important;
    }

    .brands__logs__container .sub__star__container1 svg {
        color: #cb010d;
        padding: 0px;
    }

    .brands__logs__container .sub__star__container2 svg {
        color: #fbbe05;
        padding: 0px;
    }

    .brands__logs__container .sub__star__container3 svg {
        color: #ffffff;
        border: 1px solid;
        background: #00b67a;
    }

    .mob__client__logos__container {
        position: relative;
        margin-top: -10px;
    }

    .logs__client__close__btn {
        position: absolute;
        top: 22px;
        right: 0px;
        width: 25px;
        height: 25px;
        left: -33px;
        border-radius: 0;
    }

    .dropdown__services__for__mobile .nav-tabs button.active {
        background: none !important;
        border-bottom: 2px solid #c01f29;
    }

    .dropdown__services__for__mobile #nav-home-tab.active,
    #nav-profile-tab.active {
        color: #c01f29 !important;
    }

    .dropdown__services__for__mobile button#nav-home-tab:focus-visible,
    .dropdown__services__for__mobile button#nav-profile-tab:focus-visible {
        border-radius: 0;
        box-shadow: none;
    }

    .dropdown__services__for__mobile .accordion-button::after {
        font-weight: 600;
        content: "\f107";
        font-family: "FontAwesome";
        /* content: "\2b"; */
        font-size: 18px;
        background: none;
        color: #474747 !important;
        text-align: right;
    }

    .dropdown__services__for__mobile .accordion-button:not(.collapsed)::after {
        /* content: "\f068" !important; */
        content: "\f107";
        font-family: "FontAwesome";
        font-weight: 100;
        font-size: 18px;
        display: flex;
        align-items: center;
        color: #000 !important;
    }

    .dropdown__services__for__mobile .accordion-button:not(.collapsed) {
        color: #000000;
        background-color: #f4f3f2;
        border-radius: 0px;
    }

    .dropdown__services__for__mobile .global-list .dropdown-item.active,
    .dropdown__services__for__mobile .dropdown-item:active {
        background: none !important;
        outline: none;
        border: none;
    }

    .dropdown__services__for__mobile .nav-link:hover,
    .dropdown__services__for__mobile .nav-link:focus {
        border-color: white;
    }


    .dropdown__services__for__mobile .accordion-button:not(.collapsed) a {
        color: #000;
    }

    .dropdown__services__for__mobile .accordion__item__megamenu a {
        padding-left: 0;
        padding-right: 0;
        padding-block: 3px;
        font-size: 14px;
    }

    #nav-tabContent .accordion-body ul li a {
        font-size: 14px;
    }

    .dropdown__services__for__mobile .accordion__item__megamenu div ul li {
        padding: 7px 0;
    }

    .dropdown__services__for__mobile button.accordion-button {
        padding-block: 12px;
    }

    #accordionNavProfile .accordion__item__megamenu .accordion-button:not(.collapsed) {
        background-color: none;
        border-radius: 0px;
        font-weight: 600;
    }

    .accordion__item__megamenu .accordion-button {
        color: #272727;
    }

    .accordion__item__megamenu .accordion-button:not(.collapsed)::after {
        color: #c01f29 !important;
    }

    .dropdown__services__for__mobile .accordion__item__megamenu .accordion-button:not(.collapsed) {
        color: #c01f29 !important;
        background: none !important;
    }

    @media(max-width:768px) {
        button#nav-home-tab {
            width: 25%;
        }

        button#nav-profile-tab {
            width: 30%;
        }

        button#nav-technologies-tab {width: 40%;}
    }

    @media(max-width:465px) {
        .offcanvasmobilecontainer {
            max-width: 85% !important;
        }

        .brands__logs__container .review__counter p {
            font-size: 11px;
        }

        .dropdown__services__for__mobile button.accordion-button {
            padding-inline: 6px;
        }

        #nav-tab {
            justify-content: unset;
        }

    }

    /* review__end */
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
                        <a href="{{ url('case-studies') }}">Case Studies</a>
                        <a href="{{ url('portfolio') }}">Portfolio</a>
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
                      <li class="ruby-menu-mega-blog"><a @if(!empty($row['page_url'])) href="{{ url($row['page_url']) }}" @else href="javascript:void(0)" @endif>{{$row['categoryName']}}</a>
  
                          @foreach($allPages as $data)
                          @if($row['id'] == $data['category_id'])<div class="">@break @endif
                          @endforeach
  
                              <ul class="ruby-menu-mega-blog-nav">
  
                                  @foreach ($subMenu as $item)
                                      @if($item['category_id'] == $row['id'])

                                        <li><a @if(!empty($item['page_url'])) href="{{ url($item['page_url']) }}" @else href="javascript:void(0)" @endif>{{ $item['subCategoryName'] }}</a>
    
                                            @foreach($allPages as $data)
                                                @if($row['id'] == $data['category_id'])
                                                    <div class="ruby-grid ruby-grid-lined addMenuVisibility">
                                                        <div class="ruby-row">
                                                            
                                                            @foreach($pageCategory as $pagecat)
                                                                @if($pagecat['sub_category_id'] == $item['id'])
                                                                    <div class="ruby-col-3">
                                                                        <span class="ruby-c-title menu-heading"><a @if(!empty($pagecat['page_url'])) href="{{ url($pagecat['page_url']) }}" @else href="javascript:void(0)" @endif"><strong>{{$pagecat['name']}}</strong></a></span>
                                                                        @foreach ($allPages as $data)
                                                                            @if ($data['category_id'] == $row['id'] && $data['sub_category_id'] == $item['id'] && $data['page_category_id'] == $pagecat['id'])
                                                                                
                                                                                <div class="ruby-row">
                                                                                    <div class="ruby-col-11"><span class="ruby-c-title"><a href="{{ url($data['page_url']) }}">{{$data['page_name']}}</a></span></div>
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
                <a href="{{ url('contact-us') }}" class="button-red" type="submit">REQUEST A QUOTE</a>
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
        <div class="offcanvas offcanvas-end offcanvasmobilecontainer" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header mob__client__logos__container row">
                <button type="button" class="btn-close logs__client__close__btn" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                <div class="row brands__logs__container d-flex justify-content-center">
                    <div class="col-4">
                        <div class="rating__content__container">
                            <div class="img__container">
                                <img src="/images/clutch-review.png" alt="" class="w-100">
                            </div>
                            <div class="star__container">

                                <div class="sub__star__container sub__star__container1">
                                    <span class="review__num">5.0</span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <div class="review__counter">
                                    <p>20+ Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="rating__content__container">
                            <div class="img__container">
                                <img src="/images/google-review.png" alt="" class="w-100">
                            </div>
                            <div class="star__container">

                                <div class="sub__star__container sub__star__container2">
                                    <span class="review__num">4.0</span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <div class="review__counter">
                                    <p>390+ Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="rating__content__container">
                            <div class="img__container">
                                <img src="/images/trustpilot-review.png" alt="" class="w-100">
                            </div>
                            <div class="star__container">

                                <div class="sub__star__container sub__star__container3">
                                    <span class="review__num">4.2</span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-regular fa-star"></i>

                                </div>
                                <div class="review__counter">
                                    <p>5+ Reviews</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="offcanvas-body offcanvas-body-scrollbar dropdown__services__for__mobile">
                <nav>
                    <div class="nav nav-tabs d-flex justify-content-between mobiletabcontainer" id="nav-tab" role="tablist">
                        <button class="nav-link text-secondary active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">About</button>
                        <button class="nav-link text-secondary" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Services</button>
                        <button class="nav-link text-secondary" id="nav-technologies-tab" data-bs-toggle="tab" data-bs-target="#nav-technologies" type="button" role="tab" aria-controls="nav-technologies" aria-selected="false">Technologies</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="accordion" id="accordionNavProfile">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAboutOne" aria-expanded="false" aria-controls="collapseAboutOne">
                                        <a class="nav-link dropdown-toggle" href="/about-us" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>About Tech2Globe</strong></a>
                                    </button>
                                </h2>

                                <div id="collapseAboutOne" class="accordion-collapse collapse" data-bs-parent="#accordionNavProfile">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li><a href="/Infrastructure">Infrastructure</a></li>
                                            <li><a href="/our-values">Our Values</a></li>
                                            <li><a href="/associations-ascription">Associations Ascription</a>
                                            </li>
                                            <li><a href="/clients">Clients</a></li>
                                            <li><a href="/csr-initiatives">CSR Initiatives</a></li>
                                            <li><a href="/5Years-milemakers">5 Years Milemakers </a></li>
                                            <li><a href="/our-team">Our Team </a></li>
                                            <li><a href="/life-at-tech2globe">Life at Tech2Globe </a></li>
                                            <li><a href="/career">Career </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseResources1.1" aria-expanded="false" aria-controls="collapseResources1.1">
                                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Resources</strong></a>
                                    </button>
                                </h2>

                                <div id="collapseResources1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body py-0">
                                        <ul>
                                            <li><a href="/faq">FAQ</a></li>
                                            <li><a href="/testimonial">Testimonials</a></li>
                                            <li><a href="/case-studies.php">Case Studies</a></li>
                                            <li><a href="/portfolio">Portfolio</a> </li>
                                            <li><a href="https://blog.tech2globe.com/">Blogs</a></li>
                                            <li><a href="/startup-consulting">Startup Consulting</a> </li>
                                            <li><a href="/contact-us">Contact</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                        <div class="accordion" id="accordionNavProfile">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne" aria-expanded="false" aria-controls="amazonConsultingOne">
                                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Amazon Consulting</strong></a>
                                    </button>
                                </h2>
                                <div id="amazonConsultingOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/amazon-consulting-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne1.1" aria-expanded="false" aria-controls="amazonConsultingOne1.1">Amazon Consulting Service </a>

                                                    <div id="amazonConsultingOne1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/amazon-consulting-services";  ?>">Amazon Consulting </a></li>
                                                            <li><a href="/amazon-dropshipping";  ?>">Amazon Dropshipping</a></li>
                                                            <li><a href="/amazon-fba-consulting";  ?>">Amazon FBA Consulting</a></li>
                                                            <li><a href="/amazon-sell-global-services";  ?>">Amazon Global Business</a></li>
                                                            <li><a href="/amazon-virtual-assistance";  ?>">Amazon Virtual Assistance</a></li>
                                                            <li><a href="/amazon-transparency-program";  ?>">Amazon Transparency Services</a></li>
                                                            <li><a href="/seller-reinstatement";  ?>">Seller Account Reinstatement</a></li>
                                                            <li><a href="/vendor-account-management";  ?>">Vendor Account Management</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/amazon-sales-boost-strategy";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne1.2" aria-expanded="false" aria-controls="amazonConsultingOne1.2">Amazon Sales Boost </a>

                                                    <div id="amazonConsultingOne1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/amazon-sales-boost-strategy";  ?>">Amazon Sales Boost</a></li>
                                                            <li><a href="/amazon-dsp";  ?>">Amazon DSP </a></li>
                                                            <li><a href="/amazon-marketing-services";  ?>">Amazon Marketing Services</a></li>
                                                            <li><a href="/amazon-advertising-services";  ?>">Amazon Advertising Services</a></li>
                                                            <li><a href="/amazon-product-pricing-strategy";  ?>">Amazon Product & Pricing</a></li>
                                                            <li><a href="/amazon-account-management";  ?>">Amazon Account Management</a></li>
                                                            <li><a href="/amazon-ppc-services";  ?>">Amazon PPC Services</a></li>
                                                            <li><a href="/ecommerce-social-media-marketing";  ?>">Ecommerce Social Media Marketing</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/amazon-sell-global-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne1.3" aria-expanded="false" aria-controls="amazonConsultingOne1.3">Amazon Graphics </a>

                                                    <div id="amazonConsultingOne1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/store-creation";  ?>">Store Creation </a></li>
                                                            <li><a href="/enhanced-brand-content";  ?>">Enhanced Brand Content</a></li>
                                                            <li><a href="/image-editing-services";  ?>">Amazon Image Editing Services</a></li>
                                                            <li><a href="/premium-plus-content-services";  ?>">Premium A+ Content</a></li>
                                                            <li><a href="/aplus-cataloging";  ?>">A+ Cataloging</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/amazon-virtual-assistance";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne1.4" aria-expanded="false" aria-controls="amazonConsultingOne1.4">Amazon Product </a>

                                                    <div id="amazonConsultingOne1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/amazon-copywriting";  ?>">Amazon Copywriting </a></li>
                                                            <li><a href="/amazon-product-catalog";  ?>">Amazon Seller Product Cataloging</a></li>
                                                            <li><a href="/amazon-product-translation";  ?>">Amazon Product Translation</a></li>
                                                            <li><a href="/amazon-review-rating";  ?>">Amazon Review & Rating</a></li>
                                                            <li><a href="/amazon-seo-listing-optimization";  ?>">Amazon SEO & Listing Optimization</a></li>
                                                        </ul>
                                                    </div>
                                                </div>


                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/ecommerce-marketplace-management";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne2.1" aria-expanded="false" aria-controls="amazonConsultingOne2.1">Product Uploading </a>

                                                    <div id="amazonConsultingOne2.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/ecommerce-marketplace-management";  ?>">Product Uploading </a></li>
                                                            <li><a href="/magento-product-upload-services";  ?>">Magento</a></li>
                                                            <li><a href="/bigcommerce-product-upload-services";  ?>">Bigcommerce</a></li>
                                                            <li><a href="/jet-product-upload-services";  ?>">Jet.Com</a></li>
                                                            <li><a href="/woocommerce-product-upload-services";  ?>">WooCommerce</a></li>
                                                            <li><a href="/shopify-product-upload-services";  ?>">Shopify</a></li>
                                                            <li><a href="/walmart-product-upload-services";  ?>">Walmart</a></li>
                                                            <li><a href="/cdiscount-product-upload-services";  ?>">CDiscount</a></li>
                                                            <li><a href="/prestashop-product-upload-services";  ?>">Prestashop</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/nop-commerce-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne2.2" aria-expanded="false" aria-controls="amazonConsultingOne2.2">Web Stores </a>

                                                    <div id="amazonConsultingOne2.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/nop-commerce-development-services";  ?>">NopCommerce</a></li>
                                                            <li><a href="/magento-development-company";  ?>">Magento</a></li>
                                                            <li><a href="/shopify-development-company";  ?>">Shopify</a></li>
                                                            <li><a href="/WooCommerce-development-services";  ?>">WooCommerce</a></li>
                                                            <li><a href="/ebay-store-design-services";  ?>">EBay Store Design</a></li>
                                                            <li><a href="/bigcommerce-development-services";  ?>">BigCommerce</a></li>
                                                            <li><a href="/volusion-development-services";  ?>">Volusion</a></li>
                                                            <li><a href="/3dcart-development-services";  ?>">3Dcart</a></li>
                                                            <li><a href="/open-cart-development-services";  ?>">Opencart</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/online-business-management-flipkart";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne2.3" aria-expanded="false" aria-controls="amazonConsultingOne2.3">Indian Ecommerce</a>

                                                    <div id="amazonConsultingOne2.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/online-business-management-flipkart";  ?>">Flipkart</a></li>
                                                            <li><a href="/online-business-management-amazon-in";  ?>">Amazon India</a></li>
                                                            <li><a href="/eBay-management";  ?>">EBay India</a></li>
                                                            <li><a href="/online-business-management-snapdeal";  ?>">Snapdeal</a></li>
                                                            <li><a href="/online-business-management-shopclues";  ?>">ShopClues</a></li>
                                                            <li><a href="/online-business-management-paytm";  ?>">Paytmmall</a></li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#amazonConsultingOne2.4" aria-expanded="false" aria-controls="amazonConsultingOne2.4">International Ecommerce </a>

                                                    <div id="amazonConsultingOne2.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/amazon-consulting-services";  ?>">Amazon Consulting</a></li>
                                                            <li><a href="/online-business-management-amazon-com";  ?>">Amazon Marketplaces</a></li>
                                                            <li><a href="/online-business-management-ebay-com";  ?>">EBay Marketplaces</a></li>
                                                            <li><a href="/online-business-management-sears";  ?>">Sears</a></li>
                                                            <li><a href="/online-business-management-newegg";  ?>">Newegg</a></li>
                                                            <li><a href="/online-business-management-rakuten";  ?>">Rakuten</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-entry-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.1" aria-expanded="false" aria-controls="dataManagement1.1">Data Entry </a>

                                                    <div id="dataManagement1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-entry-services";  ?>">Data Entry </a></li>
                                                            <li><a href="/accounting-data-entry-services";  ?>">Accounting Data Entry</a></li>
                                                            <li><a href="/financial-data-entry";  ?>">Financial Data Entry</a></li>
                                                            <li><a href="/logistics-services";  ?>">Logistics Services</a></li>
                                                            <li><a href="/image-data-entry-services";  ?>">Image Data Entry</a></li>
                                                            <li><a href="/insurance-claims-data-entry-services";  ?>">Insurance Claims Data Entry</a></li>
                                                            <li><a href="/offline-data-entry-services";  ?>">Offline Data Entry</a></li>
                                                            <li><a href="/online-data-entry-services";  ?>">Online Data Entry</a></li>
                                                            <li><a href="/pdf-data-entry-services";  ?>">PDF Data Entry</a></li>
                                                            <li><a href="/product-data-entry-services";  ?>">Product Data Entry</a></li>
                                                            <li><a href="/yellow-and-white-pages-data-entry-services";  ?>">Yellow & White Pages Data Entry</a></li>
                                                            <li><a href="/medical-data-entry-services";  ?>">Medical Data Entry Services</a></li>
                                                        </ul>

                                                    </div>
                                                </div>


                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/business-research-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.2" aria-expanded="false" aria-controls="dataManagement1.2">Data Intelligence Services</a>

                                                    <div id="dataManagement1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/business-research-services";  ?>">Business Research</a></li>
                                                            <li><a href="/dashboard-design-services";  ?>">Dashboard Design</a></li>
                                                            <li><a href="/virtual-assistant-services";  ?>">Virtual Assistant Services</a></li>
                                                            <li><a href="/chat-support-services";  ?>">Chat Support Services</a></li>
                                                            <li><a href="/lead-generation-services";  ?>">Lead Generation Services</a></li>
                                                            <li><a href="/banking-data-entry-services";  ?>">Banking Data Entry Services</a></li>
                                                            <li><a href="/data-analytics-services";  ?>">Data Analysis</a></li>
                                                            <li><a href="/microsoft-power-bi-consulting-services";  ?>">Microsoft Power BI Consulting</a></li>
                                                            <li><a href="/reporting-and-analysis-services";  ?>">Reporting And Analysis</a></li>
                                                            <li><a href="/e-commerce-support-services";  ?>">E-Commerce Support</a></li>
                                                            <li><a href="/donor-research-data-analytics-services";  ?>">Donor Research Data Analytics</a></li>
                                                            <li><a href="/automation-through-vba-macros-services";  ?>">Automation Through VBA Macros</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-management-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.3" aria-expanded="false" aria-controls="dataManagement1.3">Data Management</a>

                                                    <div id="dataManagement1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-management-services";  ?>">Data Management</a></li>
                                                            <li><a href="/bulk-product-upload-services";  ?>">Bulk Product Upload</a></li>
                                                            <li><a href="/catalog-management-services";  ?>">Catalog Management</a></li>
                                                            <li><a href="/data-analytics-services";  ?>">Data Analytics</a></li>
                                                            <li><a href="/indexing-services";  ?>">Indexing</a></li>
                                                            <li><a href="/restaurant-menu-entry-services";  ?>">Restaurant Menu Entry</a></li>
                                                            <li><a href="/sales-support-services";  ?>">Sales Support</a></li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-marketing-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.4" aria-expanded="false" aria-controls="dataManagement1.4">Data Marketing</a>

                                                    <div id="dataManagement1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-marketing-services";  ?>">Data Marketing </a></li>
                                                            <li><a href="/custom-list-building-services";  ?>">Custom List Building</a></li>
                                                            <li><a href="/event-data-management-services";  ?>">Event Data Management</a></li>
                                                            <li><a href="/insurance-data-collection-services";  ?>">Insurance Data Collection</a></li>
                                                            <li><a href="/lead-qualification-services";  ?>">Lead Qualification</a></li>
                                                            <li><a href="/product-research-services";  ?>">Product Research</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-mining-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.5" aria-expanded="false" aria-controls="dataManagement1.5">Data Mining</a>

                                                    <div id="dataManagement1.5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-mining-services";  ?>">Data Mining </a></li>
                                                            <li><a href="/web-research-services";  ?>">Web Research</a></li>
                                                            <li><a href="/healthcare-data-mining-services";  ?>">Healthcare Data Minings</a></li>
                                                            <li><a href="/social-media-research-services";  ?>">Social Media Research</a></li>
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-cleansing-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.6" aria-expanded="false" aria-controls="dataManagement1.6">Data Cleansing</a>

                                                    <div id="dataManagement1.6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-cleansing-services";  ?>">Data Cleansing</a></li>
                                                            <li><a href="/data-de-duplication-services";  ?>">Data De-Duplication</a></li>
                                                            <li><a href="/data-standardization-services";  ?>">Data Standardization</a></li>
                                                            <li><a href="/data-scrubbing-services";  ?>">Data Scrubbing</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/data-processing-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.7" aria-expanded="false" aria-controls="dataManagement1.7">Data Processing</a>

                                                    <div id="dataManagement1.7" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-processing-services";  ?>">Data Processing</a></li>
                                                            <li><a href="/catalog-processing-services";  ?>">Catalog Processing</a></li>
                                                            <li><a href="/data-conversion-services";  ?>">Data Conversion</a></li>
                                                            <li><a href="/data-extraction-services";  ?>">Data Extraction</a></li>
                                                            <li><a href="/document-processing-services";  ?>">Document Processing</a></li>
                                                            <li><a href="/forms-processing-services";  ?>">Forms Processing</a></li>
                                                            <li><a href="/insurance-claims-processing-services";  ?>">Insurance Claims Processing</a></li>
                                                            <li><a href="/invoice-processing-services";  ?>">Invoice Processing</a></li>
                                                            <li><a href="/order-processing-services";  ?>">Order Processing</a></li>
                                                            <li><a href="/survey-forms-processing";  ?>">Survey Forms Processing</a></li>
                                                            <li><a href="/web-scraping-services";  ?>">Web Scraping</a></li>
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/transcription-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dataManagement1.8" aria-expanded="false" aria-controls="dataManagement1.8">Transcription</a>

                                                    <div id="dataManagement1.8" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/transcription-services";  ?>">Transcription</a></li>
                                                            <li><a href="/audio-transcription-services";  ?>">Audio Transcription</a></li>
                                                            <li><a href="/youtube-transcription-services";  ?>">YouTube Transcription</a></li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/digital-marketing-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#digitalMarketing1.1" aria-expanded="false" aria-controls="digitalMarketing1.1">Online Marketing</a>

                                                    <div id="digitalMarketing1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/digital-marketing-services";  ?>">Online Marketing</a></li>
                                                            <li><a href="/link-building-services";  ?>">Link Building Services</a></li>
                                                            <li><a href="/local-seo";  ?>">Local SEO</a></li>
                                                            <li><a href="/mobile-seo-services";  ?>">Mobile SEO Services</a></li>
                                                            <li><a href="/seo-services";  ?>">Search Engine Optimization</a></li>
                                                            <li><a href="/seo-by-industry";  ?>">SEO by Industry</a></li>
                                                            <li><a href="/seo-for-small-business";  ?>">SEO for small business</a></li>
                                                            <li><a href="/technical-seo";  ?>">Technical SEO</a></li>
                                                            <li><a href="/ecommerce-seo-services";  ?>">Ecommerce SEO Services</a></li>
                                                            <li><a href="/guest-posting-services";  ?>">Guest Posting Services</a></li>
                                                            <li><a href="/content-marketing-services";  ?>">Content Marketing Services</a></li>
                                                            <li><a href="/smo-services";  ?>">Social Media Optimization</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#digitalMarketing1.2" aria-expanded="false" aria-controls="digitalMarketing1.2">Paid Marketing</a>

                                                    <div id="digitalMarketing1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/paid-search-advertising-services";  ?>">Paid Search Advertising Services</a></li>
                                                            <li><a href="/ppc-services";  ?>">Pay Per Click (PPC)</a></li>
                                                            <li><a href="/remarketing-services";  ?>">Remarketing Services</a></li>
                                                            <li><a href="/shopping-ads-services";  ?>">Shopping Ads Services</a></li>
                                                            <li><a href="/social-media-marketing";  ?>">Social Media Marketing</a></li>
                                                            <li><a href="/youtube-advertising-services";  ?>">YouTube Advertising Services</a></li>
                                                            <li><a href="/ecommerce-social-media-marketing";  ?>">Ecommerce Social Media Marketing</a></li>
                                                            <li><a href="/display-advertising-services";  ?>">Display Advertising Services</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#digitalMarketing1.3" aria-expanded="false" aria-controls="digitalMarketing1.3">Digital Marketing Packages</a>

                                                    <div id="digitalMarketing1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/digital-marketing-packages";  ?>">Digital Marketing Packages</a></li>
                                                            <li><a href="/influencer-marketing-package";  ?>">Influencer Marketing Packages</a></li>
                                                            <li><a href="/seo-packages";  ?>">SEO Packages</a></li>
                                                            <li><a href="/social-media-marketing-packages";  ?>">Social Media Marketing Packages</a></li>
                                                            <li><a href="/guest-posting-packages";  ?>">Guest Posting Packages</a></li>
                                                            <li><a href="/ppc-packages";  ?>">PPC Packages</a></li>
                                                            <li><a href="/smo-packages";  ?>">SMO Packages</a></li>
                                                            <li><a href="/performance-marketing-packages";  ?>">Performance Marketing Packages</a></li>
                                                            <li><a href="/ecommerce-ppc-packages";  ?>">Ecommerce PPC Packages</a></li>
                                                            <li><a href="/ecommerce-seo-packages";  ?>">Ecommerce SEO Packages</a></li>
                                                            <li><a href="/local-seo-packages";  ?>">Local SEO Packages</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#digitalMarketing1.4" aria-expanded="false" aria-controls="digitalMarketing1.4">ORM</a>

                                                    <div id="digitalMarketing1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/brand-reputation-management";  ?>">Brand Reputation Management</a></li>
                                                            <li><a href="/corporate-reputation-management-services";  ?>">Corporate Reputation Management Services</a></li>
                                                            <li><a href="/orm-services";  ?>">ORM Services</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#digitalMarketing1.5" aria-expanded="false" aria-controls="digitalMarketing1.5">Email Marketing</a>

                                                    <div id="digitalMarketing1.5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/email-marketing-design";  ?>">Email Marketing Design</a></li>
                                                            <li><a href="/email-marketing-services";  ?>">Email Marketing Services</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/call-centre-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bpo1.1" aria-expanded="false" aria-controls="bpo1.1">Call Center Services</a>

                                                    <div id="bpo1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/call-centre-services";  ?>">Call Centre Services</a></li>
                                                            <li><a href="/inbound-call-center";  ?>">Inbound Call Center</a></li>
                                                            <li><a href="/outbound-call-center-solutions";  ?>">Outbound Call Center</a></li>
                                                            <li><a href="/telemarketing-services";  ?>">Telemarketing Services</a></li>
                                                            <li><a href="/lead-generation-services";  ?>">Lead Generation Services</a></li>
                                                            <li><a href="/customer-support";  ?>">Customer Support</a></li>
                                                            <li><a href="/virtual-assistant-services";  ?>">Virtual Assistant Services</a></li>
                                                            <li><a href="/call-center-monitoring";  ?>">Call Center Monitoring</a></li>
                                                            <li><a href="/call-center-consulting";  ?>">Call Center Consulting</a></li>
                                                            <li><a href="/super-agent-services";  ?>">Super Agent Services</a></li>

                                                        </ul>

                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="/cctv-monitoring-services";  ?>">CCTV Monitoring</a></li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/financial-accounting-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#financialAccountingServices1.1" aria-expanded="false" aria-controls="financialAccountingServices1.1">Finance And Accounting Services</a>

                                                    <div id="financialAccountingServices1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/financial-accounting-services";  ?>">Finance And Accounting Services </a></li>
                                                            <li><a href="/bookkeeping-services";  ?>">Book Keeping Services</a></li>
                                                            <li><a href="/accounting-services";  ?>">Accounting Services</a></li>
                                                            <li><a href="/accounts-payable-services";  ?>">Accounts Payable</a></li>
                                                            <li><a href="/accounts-receivable-services";  ?>">Accounts Receivable</a></li>
                                                            <li><a href="/tax-preparation";  ?>">Tax Preparation</a></li>
                                                            <li><a href="/financial-analysis-services";  ?>">Financial Analysis</a></li>
                                                            <li><a href="/payroll-processing-services";  ?>">Payroll Services</a></li>
                                                            <li><a href="/accounting-software";  ?>">Accounting Software</a></li>
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/software-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wmdev1.1" aria-expanded="false" aria-controls="wmdev1.1">Software Development</a>

                                                    <div id="wmdev1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/software-development";  ?>">Software Development</a></li>
                                                            <li><a href="/e-commerce-development";  ?>">E-Commerce Development</a></li>
                                                            <li><a href="/enterprise-portal-development";  ?>">Enterprise Portal Development</a></li>
                                                            <li><a href="/content-management-system";  ?>">Content Management System</a></li>
                                                            <li><a href="/web-application-development";  ?>">Web Application Development</a></li>
                                                            <li><a href="/complete-ecommerce-solution-india";  ?>">ECommerce Solutions</a></li>
                                                            <li><a href="/IT-Staffing";  ?>">IT Staffing Services</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/mobile-app-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wmdev1.2" aria-expanded="false" aria-controls="wmdev1.2">Mobile App Development </a>

                                                    <div id="wmdev1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/mobile-app-development";  ?>">Mobile App Development</a></li>
                                                            <li><a href="/android-application-development-services";  ?>">Android Apps Development</a></li>
                                                            <li><a href="/iphone-ipad-application-development-services";  ?>">IPhone IPad Apps Development</a></li>
                                                            <li><a href="/mobile-application-development-services";  ?>">Mobile Apps Development</a></li>
                                                            <li><a href="/windows-application-development-services";  ?>">Windows Apps Development</a></li>
                                                            <li><a href="/phonegap-development-services";  ?>">Phonegap Development Services</a></li>
                                                            <!-- <li><a href="/oracle-applications";  ?>">Database Competencies</a></li>
                                                            <li><a href="/oracle-applications";  ?>">Oracle</a></li> -->
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wmdev1.3" aria-expanded="false" aria-controls="wmdev1.3">Database Competencies</a>

                                                    <div id="wmdev1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/oracle-applications";  ?>">Oracle</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>

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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dsfaisoftware1.1" aria-expanded="false" aria-controls="dsfaisoftware1.1">Data Support For AI Software And Tools</a>

                                                    <div id="dsfaisoftware1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/data-support-kpo-ai-services";  ?>">AI Data Support For KPO Services</a></li>
                                                            <li><a href="/data-support-ai-services";  ?>">AI Data Support Services</a></li>
                                                            <li><a href="/chat-support-services";  ?>">Chat Support Services For AI Products</a></li>
                                                            <li><a href="/customer-data-migration-services";  ?>">Customer Data Migration Services</a></li>
                                                            <li><a href="/customer-onboarding-services";  ?>">Customer Onboarding Services</a></li>
                                                            <li><a href="/project-implementation-services";  ?>">Project Implementation Services</a></li>
                                                            <li><a href="/reporting-and-analytics";  ?>">Reporting And Analytics</a></li>
                                                            <li><a href="/virtual-assistant-services";  ?>">Virtual Assistant Services</a></li>
                                                            <li><a href="/voice-support-for-ai-products";  ?>">Voice Support For AI Products</a></li>
                                                        </ul>

                                                    </div>
                                                </div>


                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/photo-editing-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.1" aria-expanded="false" aria-controls="graphicsServices1.1">Photo Editing Services</a>

                                                    <div id="graphicsServices1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/photo-editing-services";  ?>">Photo Editing Services</a></li>
                                                            <li><a href="/photo-manipulation-services";  ?>">Photo Manipulation Services</a></li>
                                                            <li><a href="/image-clipping-services";  ?>">Image Clipping Services</a></li>
                                                            <li><a href="/photo-enhancement-services";  ?>">Photo Enhancement Services</a></li>
                                                            <li><a href="/photoshop-Image-Masking-Service";  ?>">Photo Masking Process</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/image-enhancement";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.2" aria-expanded="false" aria-controls="graphicsServices1.2">Image Enhancement</a>

                                                    <div id="graphicsServices1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/image-enhancement";  ?>">Image Enhancement</a></li>
                                                            <li><a href="/photo-restoration-services";  ?>">Photo Restoration Services</a></li>
                                                            <li><a href="/blackandwhite-imagesto-color";  ?>">Black & White Images To Color</a></li>
                                                            <li><a href="/food-photo-editing-services";  ?>">Food Photo Editing Services</a></li>
                                                            <li><a href="/image-vector-services";  ?>">Image Vector Services</a></li>
                                                            <li><a href="/skin-retouching-services";  ?>">Skin Retouching Services</a></li>
                                                            <li><a href="/old-photo-restoration";  ?>">Old Photo Restoration</a></li>
                                                            <li><a href="/panorama-image-stitching-services";  ?>">Panormas Image Stitching Services</a></li>
                                                            <li><a href="/watermark-removal-services";  ?>">Watermark Removal Services</a></li>
                                                            <li><a href="/drop-shadow";  ?>">Drop Shadow</a></li>
                                                            <li><a href="/photo-retouching";  ?>">Photo Retouching</a></li>

                                                        </ul>

                                                    </div>
                                                </div>


                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/graphic-design-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.3" aria-expanded="false" aria-controls="graphicsServices1.3">Graphic Services</a>

                                                    <div id="graphicsServices1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/graphic-design-services";  ?>">Graphic Services</a></li>
                                                            <li><a href="/amazon-ebc-services";  ?>">Amazon EBC</a></li>
                                                            <li><a href="https://www.zphotoedit.com/Brochure.php">Broucher Designing</a></li>
                                                            <li><a href="https://www.zphotoedit.com/Logo-services.php">Logo Designing</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/image-clipping";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.4" aria-expanded="false" aria-controls="graphicsServices1.4">Image Clipping</a>

                                                    <div id="graphicsServices1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/image-clipping";  ?>">Image Clipping</a></li>
                                                            <li><a href="/photo-cutout-services";  ?>">Photo Cutout Services</a></li>
                                                            <li><a href="/clipping-path-services";  ?>">Clipping Path Services</a></li>
                                                            <li><a href="/image-tracing-services";  ?>">Image Tracing Services</a></li>
                                                            <li><a href="/hair-masking-services";  ?>">Hair Masking Services</a></li>
                                                            <li><a href="/image-manipulation-services";  ?>">Image Manipulation Services</a></li>
                                                            <li><a href="/car-image-clipping";  ?>">Car Image Clipping</a></li>
                                                            <li><a href="/image-masking-services";  ?>">Image Masking Services</a></li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/real-estate-image-processing";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.5" aria-expanded="false" aria-controls="graphicsServices1.5">Real Estate</a>

                                                    <div id="graphicsServices1.5" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/real-estate-image-processing";  ?>">Real Estate</a></li>
                                                            <li><a href="/post-processingof-real-estate-images";  ?>">Post Processing Of Real Estate Images</a></li>
                                                            <li><a href="/real-estate-day-to-night-conversion-services";  ?>">Real Estate Day To Night Conversion</a></li>
                                                            <li><a href="/real-estate-photo-enhancement";  ?>">Real Estate Photo Enhancement</a></li>
                                                            <li><a href="/real-estate-threesixty-degree-virtual-tours";  ?>">Real Estate 360 Virtual Tours</a></li>
                                                            <li><a href="/floor-plan-conversions";  ?>">Floor Plan Conversion</a></li>
                                                            <li><a href="/sky-replacement-services";  ?>">Sky Replacement Services</a></li>
                                                            <li><a href="/real-estate-photo-blending-services";  ?>">Real Estate Photo Blending Services</a></li>
                                                            <li><a href="/real-estate-HDR-image-blending";  ?>">Real Estate HDR Image Blending</a></li>
                                                            <li><a href="/twodthreed-floor-plan-conversion";  ?>">2D/3D Floor Plan Conversions</a></li>


                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#graphicsServices1.6" aria-expanded="false" aria-controls="graphicsServices1.6">Special Service</a>

                                                    <div id="graphicsServices1.6" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/bulk-image-conversion";  ?>">Bulk Image Conversion</a></li>
                                                            <li><a href="/photoshop-services";  ?>">Photoshop Services</a></li>
                                                            <li><a href="/lightroom-services";  ?>">Lightroom Services</a></li>
                                                            <li><a href="/video-editing";  ?>">Video Editing</a></li>
                                                            <li><a href="/threesixty-panorma";  ?>">360 Panormas</a></li>
                                                            <li><a href="/virtual-staging";  ?>">Virtual Staging</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <!--                             
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine9.9" aria-expanded="false" aria-controls="collapseNine9.9">
                                        <strong>Custom Web Development</strong>
                                    </button>
                                </h2>
                                <div id="collapseNine9.9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/web-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.1" aria-expanded="false" aria-controls="customWebDev1.1">Web Development</a>

                                                    <div id="customWebDev1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/web-development";  ?>">Web Development</a></li>
                                                            <li><a href="/php-development-services";  ?>">PHP</a></li>
                                                            <li><a href="/java-development-services";  ?>">Java</a></li>
                                                            <li><a href="/angular-js-development-services";  ?>">Angular JS</a></li>
                                                            <li><a href="/node-js-development-services";  ?>">Node JS</a></li>
                                                            <li><a href="/react-js-development-services";  ?>">React JS</a></li>
                                                            <li><a href="/ruby-on-rails-development";  ?>">Ruby On Rails</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/framework-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.2" aria-expanded="false" aria-controls="customWebDev1.2">Framework Development</a>

                                                    <div id="customWebDev1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/framework-development-services";  ?>">Framework Development</a></li>
                                                            <li><a href="/laravel-development-services";  ?>">Laravel</a></li>
                                                            <li><a href="/codeigniter-development-services";  ?>">Codeigniter</a></li>
                                                            <li><a href="/cake-php-development";  ?>">Cake PHP</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/open-source-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.3" aria-expanded="false" aria-controls="customWebDev1.3">Open Source Development</a>

                                                    <div id="customWebDev1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/open-source-development-services";  ?>">Open Source Development</a></li>
                                                            <li><a href="/Joomla-development";  ?>">Joomla</a></li>
                                                            <li><a href="/drupal-development";  ?>">Drupal</a></li>
                                                            <li><a href="/wordPress-development";  ?>">WordPress</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/microsoft-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.4" aria-expanded="false" aria-controls="customWebDev1.4">Microsoft Technology</a>

                                                    <div id="customWebDev1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/microsoft-development-services";  ?>">Microsoft Technology</a></li>
                                                            <li><a href="/dot-net-development-services";  ?>">DotNet</a></li>
                                                            <li><a href="/azure-development-services";  ?>">Azure</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ecommerceSolution1.1" aria-expanded="false" aria-controls="ecommerceSolution1.1">Ecommerce & CMS Development</a>

                                                    <div id="ecommerceSolution1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/magento-development-company";  ?>">Magento</a></li>
                                                            <li><a href="/woocommerce-development";  ?>">WooCommerce</a></li>
                                                            <li><a href="/shopify-development-company";  ?>">Shopify</a></li>
                                                            <li><a href="/volusion-development";  ?>">Volusion</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <a href="/multi-vendor-b2b-solution";  ?>">Multivendor & B2B Solutions</a>
                                            </li>
                                            <li>
                                                <a href="/e-commerce-mobile-apps-development-services";  ?>">E-Commerce Apps</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                         


                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1" aria-expanded="false" aria-controls="mobileApplicationSolution1">
                                        <strong>Mobile Application Solution</strong>
                                    </button>
                                </h2>
                                <div id="mobileApplicationSolution1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/cross-platform-mobile-app-development" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.1" aria-expanded="false" aria-controls="mobileApplicationSolution1.1">Cross Platform App Development</a>

                                                    <div id="mobileApplicationSolution1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/cross-platform-mobile-app-development";  ?>">Cross Platform App Development</a></li>
                                                            <li><a href="/react-native-app-development";  ?>">React Native App </a></li>
                                                            <li><a href="/ionic-app-development-company";  ?>">Ionic App</a></li>
                                                            <li><a href="/flutter-app-development-services";  ?>">Flutter App</a></li>
                                                            <li><a href="/kotlin-app-development";  ?>">Kotlin App</a></li>
                                                            <li><a href="/phonegap-app-development-service";  ?>">PhoneGap App</a></li>
                                                            <li><a href="/xamarin-mobile-app-development";  ?>">Xamarin App</a></li>
                                                            <li><a href="/hybrid-mobile-app-development";  ?>">Hybrid App</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>

                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.2" aria-expanded="false" aria-controls="mobileApplicationSolution1.2">Android App</a>

                                                    <div id="mobileApplicationSolution1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/android-application-development-services";  ?>">Ionic App </a></li>
                                                            
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/iphone-app-development-services" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.3" aria-expanded="false" aria-controls="mobileApplicationSolution1.3">IPhone App</a>

                                                    <div id="mobileApplicationSolution1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/iphone-app-development-services";  ?>">IPhone App</a></li>
                                                            <li><a href="/iphone-ipad-application-development-services";  ?>">IPhone Ipad App</a></li>
                                                            
                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emerginTech1.1" aria-expanded="false" aria-controls="emerginTech1.1">Ecommerce & CMS Development</a>

                                                    <div id="emerginTech1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/ai-chatbot-development";  ?>">AI Chatbot Development</a>
                                                            </li>
                                                            <li><a href="/ar-vr-app-development-company";  ?>">AR/VR Development</a></li>
                                                            <li><a href="/aws-development-services";  ?>">AWS Development</a></li>
                                                            <li><a href="/blockchain-development-services";  ?>">BlockChain Development </a></li>
                                                            <li><a href="/iot-development-services";  ?>">IOT Development</a></li>
                                                            <li><a href="/iwatch-application-development-services";  ?>">IWatch App Development</a></li>
                                                            <li><a href="/wearable-app-development-services";  ?>">Wearable App Development </a></li>
                                                            <li><a href="/machine-learning-services-and-consultation";  ?>">Machine Learning </a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>

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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/software-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frontEndD1.1" aria-expanded="false" aria-controls="frontEndD1.1">Frontend Designing</a>

                                                    <div id="frontEndD1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/software-development";  ?>">Frontend Designing</a></li>
                                                            <li><a href="/web-development";  ?>">Responsive Web Designing</a></li>
                                                            <li><a href="/graphic-design-services";  ?>">Graphic Design</a></li>
                                                            <li><a href="/corporate-branding";  ?>">Corporate Branding</a></li>

                                                        </ul>

                                                    </div>
                                                </div>


                                            </li>

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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#webMobileTesting1.1" aria-expanded="false" aria-controls="webMobileTesting1.1">Testing Services </a>

                                                    <div id="webMobileTesting1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/automation-testing-services";  ?>">Automation Testing</a></li>
                                                            <li><a href="/manual-testing-services";  ?>">Manual Testing</a></li>
                                                            <li><a href="/ecommerce-testing-services";  ?>">Ecommerce Testing</a></li>
                                                            <li><a href="/selenium-testing-services";  ?>">Selenium Testing</a></li>
                                                        </ul>

                                                    </div>
                                                </div>



                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-technologies" role="tabpanel" aria-labelledby="nav-technologies-tab" tabindex="0">
                        <div class="accordion" id="accordionNavProfile">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine9.9" aria-expanded="false" aria-controls="collapseNine9.9">
                                        <strong>Custom Web Development</strong>
                                    </button>
                                </h2>
                                <div id="collapseNine9.9" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/web-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.1" aria-expanded="false" aria-controls="customWebDev1.1">Web Development</a>

                                                    <div id="customWebDev1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/web-development";  ?>">Web Development</a></li>
                                                            <li><a href="/php-development-services";  ?>">PHP</a></li>
                                                            <li><a href="/java-development-services";  ?>">Java</a></li>
                                                            <li><a href="/angular-js-development-services";  ?>">Angular JS</a></li>
                                                            <li><a href="/node-js-development-services";  ?>">Node JS</a></li>
                                                            <li><a href="/react-js-development-services";  ?>">React JS</a></li>
                                                            <li><a href="/ruby-on-rails-development";  ?>">Ruby On Rails</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="/framework-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.2" aria-expanded="false" aria-controls="customWebDev1.2">Framework Development</a>

                                                    <div id="customWebDev1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/framework-development-services";  ?>">Framework Development</a></li>
                                                            <li><a href="/laravel-development-services";  ?>">Laravel</a></li>
                                                            <li><a href="/codeigniter-development-services";  ?>">Codeigniter</a></li>
                                                            <li><a href="/cake-php-development";  ?>">Cake PHP</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/open-source-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.3" aria-expanded="false" aria-controls="customWebDev1.3">Open Source Development</a>

                                                    <div id="customWebDev1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/open-source-development-services";  ?>">Open Source Development</a></li>
                                                            <li><a href="/Joomla-development";  ?>">Joomla</a></li>
                                                            <li><a href="/drupal-development";  ?>">Drupal</a></li>
                                                            <li><a href="/wordPress-development";  ?>">WordPress</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/microsoft-development-services";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#customWebDev1.4" aria-expanded="false" aria-controls="customWebDev1.4">Microsoft Technology</a>

                                                    <div id="customWebDev1.4" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/microsoft-development-services";  ?>">Microsoft Technology</a></li>
                                                            <li><a href="/dot-net-development-services";  ?>">DotNet</a></li>
                                                            <li><a href="/azure-development-services";  ?>">Azure</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>

                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ecommerceSolution1.1" aria-expanded="false" aria-controls="ecommerceSolution1.1">Ecommerce & CMS Development</a>

                                                    <div id="ecommerceSolution1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/magento-development-company";  ?>">Magento</a></li>
                                                            <li><a href="/woocommerce-development";  ?>">WooCommerce</a></li>
                                                            <li><a href="/shopify-development-company";  ?>">Shopify</a></li>
                                                            <li><a href="/volusion-development";  ?>">Volusion</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <a href="/multi-vendor-b2b-solution";  ?>">Multivendor & B2B Solutions</a>
                                            </li>
                                            <li>
                                                <a href="/e-commerce-mobile-apps-development-services";  ?>">E-Commerce Apps</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1" aria-expanded="false" aria-controls="mobileApplicationSolution1">
                                        <strong>Mobile Application Solution</strong>
                                    </button>
                                </h2>
                                <div id="mobileApplicationSolution1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/cross-platform-mobile-app-development" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.1" aria-expanded="false" aria-controls="mobileApplicationSolution1.1">Cross Platform App Development</a>

                                                    <div id="mobileApplicationSolution1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/cross-platform-mobile-app-development";  ?>">Cross Platform App Development</a></li>
                                                            <li><a href="/react-native-app-development";  ?>">React Native App </a></li>
                                                            <li><a href="/ionic-app-development-company";  ?>">Ionic App</a></li>
                                                            <li><a href="/flutter-app-development-services";  ?>">Flutter App</a></li>
                                                            <li><a href="/kotlin-app-development";  ?>">Kotlin App</a></li>
                                                            <li><a href="/phonegap-app-development-service";  ?>">PhoneGap App</a></li>
                                                            <li><a href="/xamarin-mobile-app-development";  ?>">Xamarin App</a></li>
                                                            <li><a href="/hybrid-mobile-app-development";  ?>">Hybrid App</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>

                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.2" aria-expanded="false" aria-controls="mobileApplicationSolution1.2">Android App</a>

                                                    <div id="mobileApplicationSolution1.2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/android-application-development-services";  ?>">Ionic App </a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/iphone-app-development-services" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileApplicationSolution1.3" aria-expanded="false" aria-controls="mobileApplicationSolution1.3">IPhone App</a>

                                                    <div id="mobileApplicationSolution1.3" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/iphone-app-development-services";  ?>">IPhone App</a></li>
                                                            <li><a href="/iphone-ipad-application-development-services";  ?>">IPhone Ipad App</a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>
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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emerginTech1.1" aria-expanded="false" aria-controls="emerginTech1.1">Ecommerce & CMS Development</a>

                                                    <div id="emerginTech1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/ai-chatbot-development";  ?>">AI Chatbot Development</a>
                                                            </li>
                                                            <li><a href="/ar-vr-app-development-company";  ?>">AR/VR Development</a></li>
                                                            <li><a href="/aws-development-services";  ?>">AWS Development</a></li>
                                                            <li><a href="/blockchain-development-services";  ?>">BlockChain Development </a></li>
                                                            <li><a href="/iot-development-services";  ?>">IOT Development</a></li>
                                                            <li><a href="/iwatch-application-development-services";  ?>">IWatch App Development</a></li>
                                                            <li><a href="/wearable-app-development-services";  ?>">Wearable App Development </a></li>
                                                            <li><a href="/machine-learning-services-and-consultation";  ?>">Machine Learning </a></li>

                                                        </ul>

                                                    </div>
                                                </div>

                                            </li>

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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="/software-development";  ?>" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#frontEndD1.1" aria-expanded="false" aria-controls="frontEndD1.1">Frontend Designing</a>

                                                    <div id="frontEndD1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/software-development";  ?>">Frontend Designing</a></li>
                                                            <li><a href="/web-development";  ?>">Responsive Web Designing</a></li>
                                                            <li><a href="/graphic-design-services";  ?>">Graphic Design</a></li>
                                                            <li><a href="/corporate-branding";  ?>">Corporate Branding</a></li>

                                                        </ul>

                                                    </div>
                                                </div>


                                            </li>

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
                                            <li>
                                                <div class="accordion__item__megamenu">
                                                    <a href="javascript:void(0)" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#webMobileTesting1.1" aria-expanded="false" aria-controls="webMobileTesting1.1">Testing Services </a>

                                                    <div id="webMobileTesting1.1" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                        <ul>
                                                            <li><a href="/automation-testing-services";  ?>">Automation Testing</a></li>
                                                            <li><a href="/manual-testing-services";  ?>">Manual Testing</a></li>
                                                            <li><a href="/ecommerce-testing-services";  ?>">Ecommerce Testing</a></li>
                                                            <li><a href="/selenium-testing-services";  ?>">Selenium Testing</a></li>
                                                        </ul>

                                                    </div>
                                                </div>



                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <form class="d-flex mt-2" role="search">
                    <a href="{{ url('contact-us') }}" class="button-red" type="submit">GET A PROPOSAL</a>
                </form>
                <div class="row align-items-center mt-3 sidebar-contact-details-container">
                    @foreach ($companyBranch as $row)
                        <div class="col-md-12 col-sm-6 py-2 d-flex align-items-center indian-data-text">
                            <img class="lozad" src="{{ url('images/flag/'.$row["flag"].'') }}" class="flag-icon" alt="{{$row['name']}}" width="25px" height="20px">
                            <div class="ms-3">
                                <a href="tel:{{$row['phone']}}">{{$row['phone']}}</a>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="col-md-3 col-sm-6 py-1 mt-2 d-flex align-items-center">
                        <img class="lozad" src="{{ url('images/icons/skype.png') }}" class="icon" alt="Skype" width="25px" height="25px">
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

                <div class="newsletter__container__mobile">
                    <div class="row d-flex align-items-center justify-content-center mt-2">
                        <div class="col-12">
                            <p class="mb-0">Get a Free Audit & Proposal</p>

                        </div>

                    </div>
                    <div class="row d-flex align-items-center justify-content-center mt-2">
                        <form id="subscriber_form">
                        <div class="col-8 pe-2">
                            <div class="email__input__mob">
                                <input type="email" name="subscriber_mail" id="subscriber_mail" placeholder="Enter Email" class="w-100" required>
                            </div>
                        </div>
                        <div class="col-4 ps-0">
                            <div class="subscribe__btn__mob">
                                <button type="submit" class="btn__subscribe__mob">SUBSCRIBE</button>
                            </div>
                        </div>
                        </form>
                        <div class="col-12">
                            <p>Subscribe to our Newsletter today</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- Mobile Navbar section end here -->
