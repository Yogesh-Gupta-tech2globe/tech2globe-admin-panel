@extends('layout.layout')
@section('content')
<?php $base_url = 'http://localhost:8000'; ?>

<!--  Main section start here -->
<main>
    <div class="feature-banner w-100 h-100 d-block position-relative bg-dark">
        <img src="images/about/about-feature-image.jpg" alt="" class="img-fluid opacity-50">
        <div class="position-absolute w-100 top-0 left-0 h-100 justify-content-center d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h1 class="text-white fadeInDown wow" data-wow-duration="0.15s">About Tech2Globe</h1>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- feature banner -->
    <div class="inner-page-content w-100 h-auto d-block position-relative py-5">
        <div class="about-empowering-your-success w-100 h-auto d-block position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <small class="sub-heading pb-2 d-block position-relative font-weight-bold">About Us</small>
                        <h2>Tech2Globe - Empowering Your Online Success</h2>
                        <p>Reliability, actuality, and results are all associated with the name Tech2Globe. We are a group of eminent specialists who put in an ocean of effort to deliver excellent business solutions and achieve the goals of their clients. We manage every stage of a project,
                            from conception to completion, to effectively accomplish its intended aim.</p>

                        <div class="about-empowering-your-success-counter">
                            <dd>
                                <strong>14+</strong>
                                <p>Years of Excellence</p>
                            </dd><!-- list -->

                            <dd>
                                <strong>10+</strong>
                                <p>Industry Verticals</p>
                            </dd><!-- list -->

                            <dd>
                                <strong>300+</strong>
                                <p>Seasoned Professionals</p>
                            </dd><!-- list -->

                            <dd>
                                <strong>7000+</strong>
                                <p>Successful Projects</p>
                            </dd><!-- list -->
                        </div>
                    </div><!-- col/6 -->

                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <ul class="position-relative">
                            <li>
                                <figure><img src="images/about/empowering-your-online-success-picture-a.jpg" alt="" title="" /></figure>
                            </li><!-- list -->

                            <li>
                                <figcaption>
                                    <figure class="mb-0"><img src="images/about/empowering-your-online-success-picture-b.jpg" alt="" title="" />
                                        <strong class="d-block text-white">CUSTOMER SATISFACTION</strong>
                                        <h5 class="text-white mb-0 pb-3">7000+</h5>
                                </figcaption>
                            </li><!-- list -->
                        </ul>
                    </div><!-- col/6 -->
                </div>
            </div>
        </div><!-- about empowering section -->
        <div class="about-convert-our-business w-100 h-auto d-block position-relative py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h2 class="text-center pb-3">Tech2Globe, A Platform To Convert Our Business Dreams Into Reality</h2>
                        <p>Tech2Globe Web Solutions is a renowned solution-provider that was established in 2014. With superior quality of our services, we have managed to carve out a coveted position for ourselves in this fiercely competitive sector.</p>

                        <p>We provide you with real, reasonable services and an unwavering customer-centric approach thanks to the top talent in the business. Our offerings include anything from web design and content creation to software development and e-marketing.</p>

                        <ol class="position-relative">
                            <li class="position-relative">
                                <h5>Our Journey: From Vision to Reality</h5>
                                <p>The story of Tech2Globe began with a compact team of marketing and web developing enthusiasts and their commitment to optimize technology for transforming businesses in the digital spectrum. We set out on a quest to close the gap between businesses and their objectives for going digital. Furthermore, We have developed into a powerful force over the years, serving clients from a variety of industries and assisting them in thriving in the always changing digital ecosystem.</p>
                            </li><!-- list -->

                            <li class="position-relative">
                                <h5>Our Expertise: Always Delivering Excellence</h5>
                                <p>At Tech2Globe, we are ready for any challenge with a team of people who are passionate about innovation, have a sharp eye for detail, and consistently push the boundaries of technology. Our professionals have a broad range of specialties, including online marketing, ecommerce, IT consulting, and BPO/KPO. Additionally, we have data management, data support for AI software and tools, software development, web design, and digital marketing, and they are well-versed in these fields and capable of providing top-notch solutions.</p>
                            </li><!-- list -->

                            <li class="position-relative">
                                <h5>Tailored Solutions: Because Customer Always Comes First</h5>
                                <p>We completely understand that every company is different, with its own set of difficulties and goals. Every client is treated individually at Tech2Globe, and specialized solutions are created to meet each client's requirements. We have a track record of providing results that go above and beyond expectations for small businesses as well as large international firms.</p>
                            </li><!-- list -->

                            <li class="position-relative">
                                <h5>Global Footprint: Beyond Boundaries</h5>
                                <p>Despite the fact that we have deep roots in our hometown, we have expanded to serve clients on a global scale. We have delivered our services in over 25 countries including Germany, USA, Canada, Singapore, Guatemala, India, UAE, Hong Kong and others. Our international clientele, which comes from a wide range of businesses, spans multiple continents like Asia and North America. Our knowledge, adaptability, and unwavering dedication to quality are evidenced by our capacity to adapt and serve clients from all over the world.</p>
                            </li><!-- list -->
                        </ol>
                    </div>
                </div>
            </div>
        </div><!-- convert our business -->
        <div class="about-navigating-business-advance w-100 h-auto d-block position-relative py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3 class="text-white text-center pb-4">Navigating the Complexities of Business Advancement Through Expertise</h3>
                        <p class="text-white text-center">Tech2Globe is a team of smart and dedicated people who are experts in providing innovative services. We create customized solutions and help our clients achieve great success in their businesses. Our wide range of services improves and speeds up various aspects of business operations, ensuring that our clients not only reach their goals but go beyond them.</p>

                        <ul class="d-flex justify-content-between align-items-center">
                            <li><a href="<?php echo $base_url . "/amazon-consulting-services"; ?>">
                                    <figure><img src="images/about/amazon-consulting-icon.png" alt="" /></figure>
                                    <h6>Amazon Consulting</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="javascript:void(0);">
                                    <figure><img src="images/about/ecommerce-management-icon.png" alt="" /></figure>
                                    <h6>Ecommerce Management</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="javascript:void(0);">
                                    <figure><img src="images/about/bpo-kpo-icon.png" alt="" /></figure>
                                    <h6>BPO-KPO</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="<?php echo $base_url . "/financial-accounting-services"; ?>">
                                    <figure><img src="images/about/finance-and-accounting-icon.png" alt="" /></figure>
                                    <h6>Finance &amp; Accounting</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="<?php echo $base_url . "/data-management-services"; ?>">
                                    <figure><img src="images/about/data-management-and-analytics-icon.png" alt="" /></figure>
                                    <h6>Data Management &amp; Analytics</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="<?php echo $base_url . "/digital-marketing-services"; ?>">
                                    <figure><img src="images/about/digital-marketing-icon.png" alt="" /></figure>
                                    <h6>Digital Marketing</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="<?php echo $base_url . "/software-development"; ?>">
                                    <figure><img src="images/about/web-and-mobile-icon.png" alt="" /></figure>
                                    <h6>Web and Mobile Development</h6>
                                </a>
                            </li><!-- list -->

                            <li><a href="javascript:void(0);">
                                    <figure><img src="images/about/graphic-and-video-editing-icon.png" alt="" /></figure>
                                    <h6>Graphic &amp; Video Editing</h6>
                                </a>
                            </li><!-- list -->
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- about navigating business advance -->
        <div class="about-our-strength-section w-100 h-auto d-block position-relative py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="text-center w-100 d-block">
                            <small class="sub-heading position-relative d-inline-block pb-3">Strengths</small>
                            <h3 class="pb-3">Our Strengths</h3>
                        </div>
                        <div class="about-strength-4-services">
                            <dd>
                                <figure><img src="images/about/digital-arsenal-icon.png" alt=""></figure>
                                <h4>Digital Arsenal</h4>
                                <p>Deep within the depths of our fortunate success lies an unparalleled ability to harness the ever-evolving landscape of cutting-edge technologies and industry's most top-notch practices. From the intricacies of comprehensive SEO strategies to extensive data management, we embark on a lively journey, leaving no stone unturned, as we strive to embolden your brand's presence.</p>
                            </dd><!-- dd list -->

                            <dd>
                                <figure><img src="images/about/collaboration-partnership-icon.png" alt=""></figure>
                                <h4>Collaborative Partnership</h4>
                                <p>At Tech2Globe, we believe in building honest and open partnerships with our valued clients. We go beyond just having a contract and become a vital part of your team. We work tirelessly with you, utilizing the immense power of your mind and our expertise to achieve success. Our team of experienced professionals spends a significant amount of time understanding your business and getting to the heart of your ideas.</p>
                            </dd><!-- dd list -->

                            <dd>
                                <figure><img src="images/about/ethics-and-integrity-icon.png" alt=""></figure>
                                <h4>Ethics and Integrity</h4>
                                <p>At Tech2Globe, we strongly believe in ethics and honesty. We are committed to conducting business with transparency, honesty, and respect. Our dedicated team follows high standards and best practices to ensure integrity in every aspect of our work. Your brand's reputation is highly valued and protected with utmost trust and care in our company.</p>
                            </dd><!-- dd list -->

                            <dd>
                                <figure><img src="images/about/customer-centric-approach-icon.png" alt=""></figure>
                                <h4>Customer-Centric Approach</h4>
                                <p>We highly value your satisfaction above all else. Our team is dedicated to providing you with a smooth and transparent experience. We strive to give you all the information you need and keep communication open. This way, we empower you, the curious learner, with the knowledge and wisdom to make informed decisions.</p>
                            </dd><!-- dd list -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- about our strength section -->
        <div class="about-get-your-footprints-section">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <small class="sub-heading position-relative">Why Choose Us?</small>
                        <h3>Get Your Footprints On Digital Globe With Tech2Globe</h3>
                        <p>Are you ready to embark on an extraordinary expedition? Whether you're a daring startup hungry for success or a renowned brand yearning for digital metamorphosis, fear not, for Tech2Globe is your steadfast guide. We vow to accompany you every step of the way, illuminating your path to unparalleled heights of triumph.</p>

                        <p>Prepare to witness the unfathomable prowess of our esteemed team of experts as they unravel the boundless potential of your brand within the digital realm. With an avid desire to comprehend your distinctive hurdles, ambitions, and aspirations, we shall weave a custom-to-master strategy that seamlessly aligns with your business objectives.</p>

                        <aside><a href="<?php echo $base_url . "/contact-us";  ?>" class="arrow-right-btn">contact now</a></aside>
                    </div><!-- col/6 -->

                    <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12">
                        <figure class="position-relative mb-0">
                            <img src="images/about/get-your-footprints.jpg" alt="" class="img-fluid" />
                            <span class="play-icon position-absolute" data-bs-toggle="modal" data-bs-target="#exampleModal"></span>
                        </figure>
                    </div><!-- col/6 -->
                </div>
            </div>
        </div><!-- about get your footprints -->
        <!-- Modal -->
        <div class="modal fade why-choose-us-vedio" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-body">
                        <video controls>
                            <source src="images/video/ecommerce.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- inner page content -->
</main>
<!--  Main section end here -->


@endsection