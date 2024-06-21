
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <!--  Main section start here -->
    <main>
        <!-- Banner section start here -->
        <section id="home_wave" class="home-banner d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h1>Tech2Globe Services Are Geared To Deliver <span class="d-block">Results That You Expect From Consulting Partner.</span></h1>
                        <a href="<?php echo $base_url . "/contact-us";  ?>" class="banner-btn">Contact Us</a>
                    </div>
                </div>
            </div>


        </section>
        <!-- Banner section end here -->

        <!-- Info section start here -->
        <section class="beneath-banner pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="info-box" data-aos="fade-down">
                            <img src="images/icons/growth.png" alt="">
                            <div class="info-content ms-3">
                                <h6>Digital Transformation</h6>
                                <p>From planning online setup to reaching your target market.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="info-box" data-aos="fade-down">
                            <img src="images/icons/planning.png" alt="">
                            <div class="info-content ms-3">
                                <h6>Consulting Prowess</h6>
                                <p>Aligning your costs with goals to target growth.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="info-box" data-aos="fade-down">
                            <img src="images/icons/international.png" alt="">
                            <div class="info-content ms-3">
                                <h6>Global Data Support</h6>
                                <p>Leveraging data capabilities for effective business operations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Info section end here -->

        <!-- About us section start here -->
        <section class="home-about-section">
            <div class="container">
                <div class="row m-20">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="center-heading d-block d-sm-none about-heading">
                            <div class="sub-heading pb-3">About Us</div>
                            <!-- <h2>About TECH2GLOBE Your IT Consulting Partner</h2> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="left-side" data-aos="fade-up">
                            <div class="d-none d-sm-block">
                                <div class="sub-heading">About Us</div>
                                <h2>Tech2Globe Your IT Consulting Partner</h2>
                            </div>
                            <p>Tech2Globe is an IT solutions and consultancy firm that assists visionaries in being industry changemakers and defining business future. We collaborate as one team with our clients with the common goal of achieving amazing achievements, outperforming the competition, and redefining industries. To offer better, faster, and more enduring results, we combine our specialized, integrated knowledge with our services. With over 14 years of experience in various industry verticals, we uncover new sources to add value to your business.</p>

                            <!-- new-counter start -->

                            <div class="projectFactsWrap counter-d-t row">
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="item counter">
                                        <span class="count fw-bold text-danger" data-number="7" id="number1">7</span>
                                        <span class="symbol fw-bold text-danger">k</span>
                                        <h6 class="fw-bold">Successful Projects</h6>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="item counter">
                                        <span class="count fw-bold text-danger" data-number="300" id="number2">300</span>
                                        <span class="symbol fw-bold text-danger">+</span>
                                        <h6 class="fw-bold">Our Strength</h6>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
                                    <div class="item counter">
                                        <span class="count fw-bold text-danger" data-number="90" id="number3">90</span>
                                        <span class="symbol fw-bold text-danger">%</span>
                                        <h6 class="fw-bold">Customer Satisfaction Score</h6>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
                                    <div class="item counter">
                                        <span class="count fw-bold text-danger" data-number="25" id="number4">25</span>
                                        <span class="symbol fw-bold text-danger">+</span>
                                        <h6 class="fw-bold">Customer Based Countries</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- new-counter end -->
                            <!-- <div class="counter-d-t row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="counter">
                                        <span class="fw-bold text-danger">7K</span>
                                    </div>
                                    <h6 class="fw-bold">Successful Projects</h6>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="counter">
                                        <span class="fw-bold text-danger">300+</span>
                                    </div>
                                    <h6 class="fw-bold">Our Strength</h6>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="counter">
                                        <span class="fw-bold text-danger">90%</span>
                                    </div>
                                    <h6 class="fw-bold">Customer Satisfaction Score
                                    </h6>
                                </div>
                                <div class="col-md-6 col-sm-6 col-6">
                                    <div class="counter">
                                        <span class="fw-bold text-danger">25+</span>
                                    </div>
                                    <h6 class="fw-bold">Customer Based Countries</h6>
                                </div>
                            </div> -->
                            <!-- <div>
                                <div class="progress-bar-section">
                                    <h6>Successful Projects</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 75%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="float-end">7K</h4>
                                    </div>
                                </div>
                                <div class="progress-bar-section">
                                    <h6>Our Strength</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 75%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="float-end">300+</h4>
                                    </div>
                                </div>
                                <div class="progress-bar-section">
                                    <h6>Customer Satisfaction Score</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 75%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="float-end">90%</h4>
                                    </div>
                                </div>
                                <div class="progress-bar-section">
                                    <h6>Customer Based Countries</h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-label="Basic example" style="width: 75%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h4 class="float-end">25+</h4>
                                    </div>
                                </div>
                            </div> -->
                            <a href="javascript:void(0);">
                                <div class="d-flex read-more-btn">
                                    <a href="<?php echo $base_url . "/about-us";  ?>" class="theme-btn"><i class="fa-solid fa-arrow-right-long text-white"></i></a>
                                    <a href="<?php echo $base_url . "/about-us";  ?>">
                                        <h6>Read More</h6>
                                    </a>
                                    <!-- <a href="<?php echo $base_url . "/about-us";  ?>" class="theme-btn"><i class="fa-solid fa-arrow-right-long text-white"></i></a>
                                    <a href="<?php echo $base_url . "/about-us";  ?>"><h6>Read More</h6></a> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="img-container">
                            <img src="images/banner-about-h-4.webp" alt="">
                        </div>
                        <!-- <div class="right-side position-relative">
                            <img src="images/about-1.jpg" class="img-fluid float-end" alt="">
                            <div class="about-img">
                                <img src="images/about-us-img-2.jpg" class="img-fluid float-end" alt="">
                            </div>
                            <div class="year">
                                <h2 class="display-3">14+</h2>
                                <h6>Years Of Experiences</h6>
                            </div>

                        </div> -->
                    </div>
        </section>
        <!-- About us section end here -->

        <!-- Achievement section start here -->
        <section class="achievement-banner d-none d-lg-block">
            <div class="container">
                <div class="row justify-content-between justify-custom">
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="achievement-box" data-aos="fade-up">
                            <div class="d-flex img-bg-red">
                                <img src="images/new-page-image/expertise.webp" alt="">
                            </div>
                            <div class="mt-4 ">
                                <h3>Expertise</h3>
                                <p>Delivering the best of us every day</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="achievement-box" data-aos="fade-up">
                            <div class="d-flex img-bg-red">
                                <img src="images/new-page-image/team.webp" alt="">
                            </div>
                            <div class="mt-4 ">
                                <h3>Team</h3>
                                <p>300+ working professionals </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="achievement-box" data-aos="fade-up">
                            <div class="d-flex img-bg-red">
                                <img src="images/new-page-image/development.webp" class="mt-2 width-90" alt="">
                            </div>
                            <div class="mt-4 ">
                                <h3>Development </h3>
                                <p>Deriving continuous growth for customers and ourselves</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="achievement-box" data-aos="fade-up">
                            <div class="d-flex img-bg-red">
                                <img class="mb-1" src="images/new-page-image/enthusiasm.webp" alt="">
                            </div>
                            <div class="mt-4 ">
                                <h3>Enthusiasm </h3>
                                <p>Passion and Commitment in everything we do</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="achievement-box" data-aos="fade-up">
                            <div class="d-flex img-bg-red">
                                <img src="images/new-page-image/flexiblity.webp" alt="">
                            </div>
                            <div class="mt-4 ">
                                <h3>Flexibility</h3>
                                <p>Balancing time and resources to make the most of our effort </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Achievement section end here -->

        <!-- Achievement section start here -->
        <section class="phone-achievement-banner d-block d-lg-none">
            <div class="container">
                <div class="row">
                    <div class="portfolioSlider">
                        <div class="owl-carousel owl-theme" id="achiveslider">
                            <div class="item">
                                <div class="achievement-box">
                                    <div class="d-flex img-bg-red">
                                        <img src="images/new-page-image/expertise.webp" alt="">
                                    </div>
                                    <div class="mt-4 ">
                                        <h3 class="display-6">Expertise</h3>
                                        <p>Delivering the best of us every day</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="achievement-box">
                                    <div class="d-flex img-bg-red">
                                        <img src="images/new-page-image/team.webp" alt="">
                                    </div>
                                    <div class="mt-4 ">
                                        <h3 class="display-6">Team</h3>
                                        <p>300+ working professionals </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="achievement-box">
                                    <div class="d-flex img-bg-red">
                                        <img src="images/new-page-image/development.webp" class="mt-2 width-90" alt="">
                                    </div>
                                    <div class="mt-4 ">
                                        <h3 class="display-6">Development</h3>
                                        <p>Deriving continuous growth for customers and ourselves</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="achievement-box">
                                    <div class="d-flex img-bg-red">
                                        <img src="images/new-page-image/enthusiasm.webp" alt="">
                                    </div>
                                    <div class="mt-4 ">
                                        <h3 class="display-6">Enthusiasm</h3>
                                        <p>Passion and Commitment in everything we do</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="achievement-box">
                                    <div class="d-flex img-bg-red">
                                        <img src="images/new-page-image/flexiblity.webp" alt="">
                                    </div>
                                    <div class="mt-4 ">
                                        <h3 class="display-6">Flexiblity</h3>
                                        <p>Balancing time and resources to make the most of our effort </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Achievement section end here -->

        <!-- Awards section start here -->
        <section class="awards mb-5 mb-md-0 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="center-heading">
                            <div class="sub-heading">Credentials & Partnerships</div>
                            <h2 class="text-unset">Awards and Certifications</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 d-none d-lg-block">
                        <img src="images/new-page-image/awards.webp" alt="">
                    </div>
                    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12">
                        <div class="awards-logo">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/iso.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/flipkart.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/amazon_spn_logo.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/google.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="awards-logo">
                            <div class="row">
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/OIP.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/Payoneer-Log.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/shopify.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/certificate.png" alt="">
                                    </div>
                                </div>
                                <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 width-50 aos-init aos-animate" data-aos="fade-up">
                                    <div class="awards-logo-box">
                                        <img src="images/award-and-certification/ebay.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="certificate">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="d-flex certificate-resp align-items-center" data-aos=" fade-up">
                                        <img src="images/new-page-image/circle-location.webp" alt="" class="h-50">
                                        <div class="certificate-box">
                                            <p>4 Global Delivery<span class="small-heading"> Locations</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="d-flex certificate-resp align-items-center" data-aos=" fade-up">
                                        <img src="images/svg/awards.svg" alt="">
                                        <div class="certificate-box">
                                            <p>Diversity <span class="small-heading">& Inclusion</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="d-flex certificate-resp align-items-center" data-aos=" fade-up">
                                        <img src="images/svg/members.svg" alt="">
                                        <div class="certificate-box text-secondary">
                                            <p>Process <span class="small-heading"> Excellence</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Awards section end here -->

        <!-- Leading Services section start here -->
        <section class="services-logo">
            <div class="container services">
                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/vehicle 1.svg" alt="">
                            <div class="mt-5">
                                <h4>Leading Services</h4>
                                <p>Quickly increase client engagement and proper business growth, with sound... </p>
                                <!-- business solutions and strategies and developing creative business models. -->
                            </div>
                        </div>
                        <!-- <a href="javascript:void(0);" class="services-btn mt-5">Explore All Services <i class="fa-solid fa-arrow-up-right-from-square ps-4"></i></a> -->
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/ecommerce-development.svg" alt="">
                            <div class="mt-5">
                                <h4>Ecommerce Development</h4>
                                <p>From ecommerce product data entry services to marketplace management...</p>
                                <!-- , our team possesses specialized expertise to deliver comprehensive solutions. -->
                                <div class="service-link">
                                    <a href="<?php echo $base_url . "/shopify-development-company";  ?>">Shopify</a>
                                    <a href="<?php echo $base_url . "/magento-development-company";  ?>">Magento</a>
                                    <a href="<?php echo $base_url . "/WooCommerce-development-services";  ?>">WooCommerce</a>
                                    <a href="<?php echo $base_url . "/ebay-store-design-services";  ?>">Ebay store design</a>
                                    <a href="<?php echo $base_url . "/shopify-product-upload-services";  ?>">Shopify product upload</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/online-marketing.svg" alt="">
                            <div class="mt-5">
                                <h4>Online Marketing</h4>
                                <p>Get access to all-encompassing online marketing services covering every crucial...</p>
                                <!-- aspect of your business requirements. -->
                                <div class="service-link">
                                    <a href="<?php echo $base_url . "/ppc-services";  ?>">PPC</a>
                                    <a href="<?php echo $base_url . "/social-media-optimization";  ?>">Social media optimization</a>
                                    <a href="<?php echo $base_url . "/search-engine-optimization";  ?>">SEO</a>
                                    <a href="<?php echo $base_url . "/ecommerce-seo-services";  ?>">Ecommerce SEO</a>
                                    <a href="<?php echo $base_url . "/influencer-marketing-package";  ?>">Influencer marketing</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/amazon-icon.svg" alt="">
                            <div class="mt-5">
                                <h4>Amazon Services</h4>
                                <p>Leverage the process of our Amazon consulting services and team of experts...</p>
                                <!-- to guide you toward achieving sales, ROI, and loyal consumer base. -->
                                <div class="service-link">
                                    <a href="<?php echo $base_url . "/amazon-consulting-services";  ?>">Amazon Consulting</a>
                                    <a href="<?php echo $base_url . "/store-creation";  ?>">Store creating</a>
                                    <a href="<?php echo $base_url . "/enhanced-brand-content";  ?>">Enhanced brand content</a>
                                    <a href="<?php echo $base_url . "/vendor-account-management";  ?>">Vendor a/c management</a>
                                    <a href="<?php echo $base_url . "/amazon-dropshipping";  ?>">Amazon drop shipping</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/development.svg" alt="">
                            <div class="mt-5">
                                <h4>Software & App Development</h4>
                                <p>Tech2Globe offers software development services that comprehensively address...</p>
                                <!-- all your software development needs. -->
                                <div class="service-link">
                                    <a href="<?php echo $base_url . "/php-development-services";  ?>">Php development</a>
                                    <a href="<?php echo $base_url . "/java-development-services";  ?>">Java development</a>
                                    <a href="<?php echo $base_url . "/iphone-ipad-application-development-services";  ?>">IOS app</a>
                                    <a href="<?php echo $base_url . "/react-native-app-development";  ?>">React native app</a>
                                    <a href="<?php echo $base_url . "/android-application-development-services";  ?>">Android app</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up">
                        <div class="services-box">
                            <img src="images/svg/management.svg" alt="">
                            <div class="mt-5">
                                <h4>BPO-KPO/Data Management</h4>
                                <p>Outsource your operational, data, and knowledge needs to the trusted IT... </p>
                                <!-- and Back-office support partner, Tech2Globe Web Solutions -->
                                <div class="service-link">
                                    <a href="<?php echo $base_url . "/data-management-services";  ?>">Data management</a>
                                    <a href="<?php echo $base_url . "/document-processing-services";  ?>">Document processing</a>
                                    <a href="<?php echo $base_url . "/magento-product-upload-services";  ?>">Magento product upload</a>
                                    <a href="<?php echo $base_url . "/data-entry-services";  ?>">Data entry</a>
                                    <a href="<?php echo $base_url . "/data-mining-services";  ?>">Data mining</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Leading Services section end here -->

        <!-- Our client section start here -->
        <section class="clients-in-worldwide py-5">
            <div class="container">
                <div class="row m-20">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <div class="sub-heading pb-3">Our Client</div>
                            <h2 class="text-unset">Partnered with Clients Worldwide</h2>
                            <span class="d-block w-100 pb-1">Over the years, Tech2Globe has served these clients building the prominence of its services and trust.</span>
                        </div>
                    </div>
                </div>
                <div class="row m-10 gy-4">
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/amazon-usa.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/aquatech.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/bluebird.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/cantabil.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/creative-arcades.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/deliveryhero.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="row m-10 gy-4">
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/ecommerce-guru.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/epos.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/follett.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/foodora.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/frontier.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/getkart.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="row m-10 gy-4">
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/hp.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/indiaSoft.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/instas.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/legend.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/nike.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/patanjali.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="row m-10 gy-4">
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/sales-warp.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/shikhar-group.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/snapdeal.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/sparsh-logo.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/sports.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/ss-medical.webp" alt="">
                        </div>
                    </div>
                </div>
                <div class="row m-10 gy-4">
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/swiggy.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/unacademy.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/wow.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/wellist.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/wooden-street.webp" alt="">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6 width-50" data-aos="fade-up">
                        <div class="client-box">
                            <img src="images/new-page-image/logo/luiolui.webp" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our client section end here -->

        <!-- Case Studies section start here -->
        <section class="case-section py-5">
            <div class="case-border"></div>
            <div class="container">
                <div class="row m-20">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <div class="sub-heading pb-3">Case Studies</div>
                            <h2 class="text-unset">Experiences of Our Global Client</h2>
                            <span class="d-block w-100 pb-4">Here are our client’s success stories who joined hands with Tech2Globe and witnessed increased sales and growth with overall operational proficiency and minimized errors. </span>
                        </div>
                    </div>
                </div>
                <div class="row case-gap g-4">
                    <ul class="d-flex">
                        <li>
                            <div class="case-main-box">
                                <img src="images/new-page-image/restaurant-menu-data-entry.webp" alt="">
                                <div class="case-box">
                                    <h6>Restaurant Menu Data Entry</h6>
                                    <p>They wanted to outsource their restaurant menu data entry work for one....</p>
                                    <a href="<?php echo $base_url . "/pdf/restaurant-menu-data-entry.pdf";  ?>" class="case-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </div>
                            </div>
                        </li><!-- list item -->

                        <li>
                            <div class="case-main-box">
                                <img src="images/new-page-image/mobile-app-development.webp" alt="">
                                <div class="case-box">
                                    <h6>Mobile APP Development</h6>
                                    <p>Our client required a mobile solution to complement its social design service....</p>
                                    <a href="<?php echo $base_url . "/pdf/mobile-app-development.pdf";  ?>" class="case-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </div>
                            </div>
                        </li><!-- list item -->

                        <li>
                            <div class="case-main-box">
                                <img src="images/new-page-image/image-processing.webp" alt="">
                                <div class="case-box">
                                    <h6>Image Processing</h6>
                                    <p>The image processing case study features a customer based in US owning a couple of studios....</p>
                                    <a href="<?php echo $base_url . "/pdf/case-study-of-image-processing.pdf";  ?>" class="case-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </div>
                            </div>
                        </li><!-- list item -->

                        <li>
                            <div class="case-main-box">
                                <img src="images/new-page-image/digital-merketing.webp" alt="">
                                <div class="case-box">
                                    <h6>Digital Marketing</h6>
                                    <p>The biggest challenge for us is – the business niche is complete new for us and first ....</p>
                                    <a href="<?php echo $base_url . "/pdf/digital-marketing-SEO.pdf";  ?>" class="case-btn"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                </div>
                            </div>
                        </li><!-- list item -->
                    </ul>
                </div>
                <div class="row">
                    <a href="<?php echo $base_url . "/case-studies/";  ?>" class="case-lg-btn mt-md-5 mx-auto">Explore All Services <i class="fa-solid fa-arrow-up-right-from-square ps-4"></i></a>
                </div>
            </div>
        </section>
        <!-- Case Studies section end here -->

        <!-- Testimonials section start here -->
        <section class="testimonials py-5">
            <div class="container">
                <div class="row m-20">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <div class="sub-heading">Testimonials</div>
                            <h2 class="pt-3">What People Say About Us</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolioSlider">
                        <div class="owl-carousel owl-theme" id="testimonial">
                            <div class="item">
                                <div class="test-box">
                                    <img src="images/testimonial/user-3.png" alt="testimonial">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <h6>Rich Purcell</h6>
                                    <h5>Owner, richard alan photography</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>They delivered exactly what I asked for and laid the infrastructure to do more work in the future.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <img src="images/testimonial/user-1.png" alt="testimonial">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <h6>
                                        Martin Herbrich</h6>
                                    <h5>Founder & CEO, Blue Angel Farms</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>We have been working with them for three years now and have always been satisfied with their quality and delivery.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-3.png" alt="testimonial">
                                    <h6>
                                        Laura Hackett</h6>
                                    <h5>Customer Service Manager, hungryhouse</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>I got to know them as an extension of our team, without the normal complications involved with large BPO firms.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>Patrick Perugini</h6>
                                    <h5>President, On Bike Share</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>They were very organized and knowledgeable about all areas of marketing that we needed.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-3.png" alt="testimonial">
                                    <h6>
                                        Shifaat Rasool</h6>
                                    <h5>Director Operations, Ashmoo Ltd</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>They are a team of professionals.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>John Bannister</h6>
                                    <h5>Owner, Jamber Worldwide</h5>
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>I’m really impressed with their communication.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>William Newsome</h6>

                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>This is the 2nd listing they have done for me. I love the infographics. They have great communication and did everything promised. I will always choose Tech2Global for future listings.</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>Serkan Sukgen</h6>

                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>Thank you so much. Shivam is great to work with and I will continue to work with Tech2Globe</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>Ryan Bell</h6>

                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>This company was fairly priced and we’re very efficient. The provided over the top and beyond of my services optimizing my product listing . I do recommend this company .</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="test-box">
                                    <div class="semi-circle">
                                        <img src="images/new-page-image/coma.webp" alt="">
                                    </div>
                                    <img src="images/testimonial/user-2.png" alt="testimonial">
                                    <h6>Steve Schulte</h6>

                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    <p>Professional, conscientious, and responsive Associates. Recommended!</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section end here -->

        <!-- Portfolio section start here -->
        <section class="portfolio section-bottom section-top">
            <div class="container">
                <div class="row m-20">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <div class="sub-heading pb-3">Our Portfolio</div>
                            <h2 class="text-unset">Projects Success Highlighting The Efficiency of our Excellence</h2>
                            <span class="d-block w-100 pb-4">Tech2Globe has been consistently delivering a multitude of cost-effective, top-tier software solutions since its inception. Furthermore, our expertise and experience goes across diverse industries and domains to support every business possible. Our unwavering commitment to excellence has yielded a rich history of high-quality accomplishments in business software development, e-commerce, retail, manufacturing, real estate, consulting services, and more.</span>
                            <!-- <p class="pb-4">Tech2Globe has been consistently delivering a multitude of cost-effective, top-tier software solutions since its inception. Furthermore, our expertise and experience goes across diverse industries and domains to support every business possible. Our unwavering commitment to excellence has yielded a rich history of high-quality accomplishments in business software development, e-commerce, retail, manufacturing, real estate, consulting services, and more.</p> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="portfolioSlider">
                        <div class="owl-carousel owl-theme" id="portfolioSlider">
                            <div class="item">
                                <div class="portfolio-box">
                                    <div class="">
                                        <h6>Luiolei</h6>
                                        <a href="https://www.luiolei.com/" class="button portfolio-btn" type="submit">View Project</a>
                                    </div>
                                    <img src="images/new-page-image/luiolei.webp" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="portfolio-box">
                                    <div class="">
                                        <h6>Windsor One</h6>
                                        <a href="https://windsorone.com/" class="button portfolio-btn" type="submit">View Project</a>
                                    </div>
                                    <img src="images/new-page-image/windsorone.webp" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="portfolio-box">
                                    <div class="">
                                        <h6>QUIQUP</h6>
                                        <a href="https://www.quiqup.com/" class="button portfolio-btn" type="submit">View Project</a>
                                    </div>
                                    <img src="images/new-page-image/quiqup.webp" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="portfolio-box">
                                    <div class="">
                                        <h6>Zphotoedit</h6>
                                        <a href="http://zphotoedit.com/" class="button portfolio-btn" type="submit">View Project</a>
                                    </div>
                                    <img src="images/new-page-image/zphohedit.webp" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- Portfolio section end here -->

        <!-- Form section start here -->
        <?php
        $actual_link = str_replace('.php', '', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
        ?>
        <section class="form-section section-bottom">
            <div class="container mobile">
                <div class="row">
                    <div class="col-lg-5 d-flex justify-content-center">
                        <form class="row g-3 needs-validation" action="include/mail" method="post" id="home-form">
                            <h3 class="text-unset pb-4">Get in touch with us!</h3>
                            <input name="pagelink" value="<?php echo $actual_link; ?>" type="hidden" />
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" id="validationCustom01" required placeholder="Your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" id="validationCustom02" required placeholder="Your Email">
                            </div>
                            <div class="col-md-6">
                                <select class="form-select" name="countrycode" id="validationCustom3" required>
                                    
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control" id="validationCustom04" required placeholder="Your Phone No." minlength="10" maxlength="11">
                            </div>
                            <div class="col-md-12">
                                <textarea name="comment" class="form-control" id="validationCustom05" required placeholder="Enter your query"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="g-recaptcha" data-sitekey="6LcgtGUoAAAAACiwvWRy3dCLGtegotNKS0YN6Uak">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="large-btn button-red ms-0" name="submit" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 offset-lg-1 d-none d-lg-block">
                        <div class="form-text">
                            <p>We offer industry solutions that add value to your business.</p>
                            <h2>Looking for IT solutions that can make a transformative difference?</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Form section end here -->

        <!-- Blog section start here -->
        <section class="blog section-bottom pt-5">
            <div class="container">
                <div class="row m-20">
                    <div class="col-md-12">
                        <div class="center-heading">
                            <div class="sub-heading pb-3">Our Blogs</div>
                            <h2 class="text-unset">Latest Insights and Updates</h2>
                            <span class="d-block w-100 pb-4">Never miss an update and catch up with Tech2Globe in the blog & news section, including latest industry trends, our guides, tips & tricks, more services, our featured articles, CEO anecdotes, and many more. </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="slider">
                        <div class="owl-carousel owl-theme" id="blog">
                            <div class="item">
                                <div class="blog-box p-3">
                                    <img src="images/blog/blog-1.jpg" alt="blog">
                                    <div class="d-flex">
                                        <h5><a href="https://blog.tech2globe.com/4-tips-on-what-to-know-before-applying-data-analytics/" class="btn-icon">4 Tips on What To Know Before Applying Data Analytics </a></h5>
                                        <a href="https://blog.tech2globe.com/4-tips-on-what-to-know-before-applying-data-analytics/" class="btn-icon"><i class="fa-solid fa-location-arrow"></i></a>
                                    </div>
                                    <p>The world of data analytics is getting bigger day by day. Companies are investing billions of dollars in this field...</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-box p-3">
                                    <img src="images/blog/blog-2.jpg" alt="blog">
                                    <div class="d-flex">
                                        <h5><a href="https://blog.tech2globe.com/amazon-account-suspension-yes-you-can-overcome-this-nightmare/" class="btn-icon">Amazon Account Suspension: Yes! You Can Overcome This Nightmare </a></h5>
                                        <a href="https://blog.tech2globe.com/amazon-account-suspension-yes-you-can-overcome-this-nightmare/" class="btn-icon"><i class="fa-solid fa-location-arrow"></i></a>
                                    </div>
                                    <p>An Amazon account suspension can be a nightmare for any seller’. You have worked hard to establish a successful business...</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-box p-3">
                                    <img src="images/blog/blog-4.jpg" alt="blog">
                                    <div class="d-flex">
                                        <h5><a href="https://blog.tech2globe.com/tech2globe-web-solutions-records-100-five-star-rating-for-may/" class="btn-icon">Tech2Globe Web Solutions Records 100% Five-Star Rating for May on Clutch. </a></h5>
                                        <a href="https://blog.tech2globe.com/tech2globe-web-solutions-records-100-five-star-rating-for-may/" class="btn-icon"><i class="fa-solid fa-location-arrow"></i></a>
                                    </div>
                                    <p>Tech2Globe Web Solutions Records 100% Five-Star Rating for May on Clutch Since we started our company back in 2014...</p>
                                </div>
                            </div>
                            <div class="item">
                                <div class="blog-box p-3">
                                    <img src="images/blog/blog-3.jpg" alt="blog">
                                    <div class="d-flex">
                                        <h5><a href="https://blog.tech2globe.com/store-creation-on-shopify-development-company-in-15-minutes/" class="btn-icon">Store Creation On Shopify Development Company In 15 Minutes </a></h5>
                                        <a href="https://blog.tech2globe.com/store-creation-on-shopify-development-company-in-15-minutes/" class="btn-icon"><i class="fa-solid fa-location-arrow"></i></a>
                                    </div>
                                    <p>Starting an internet business can be exciting for anyone, yet not so easy. You’ll have to deal with a variety of issues...</p>
                                </div>
                            </div>
                        </div>
                        <div class="owl-dots">
                            <div class="owl-dot active"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                            <div class="owl-dot"><span></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog section end here -->
    </main>
    <!--  Main section end here -->
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection