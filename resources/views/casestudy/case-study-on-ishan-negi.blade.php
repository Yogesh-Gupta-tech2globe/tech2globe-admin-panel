
            @extends("layout.layout")
            @section("content")
            @php $base_url = "/"; @endphp

                @include("include.breadcrumb-case-study-detail", ["name" => $casestudy["name"]])

                <section class="container cartFeature inner-page-content new-content case-study-inner-page pt-0">

                    <div class="row">
                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
                        <div class="main-banner-container">
                            <h1 style="text-transform: uppercase;">TECH2GLOBE PROVIDED {{$casestudy["name"]}}</h1>
                            <img src="{{ url("images/casestudy/bannerImage/".$casestudy["bannerImage"]."") }}" alt="case-study-banner" width="100%">
                        </div>

                        <div class="content-container">
                            @if(!empty($casestudy["filecode"]))
                                {!! $casestudy["filecode"] !!}
                            @endif
                        </div>
                        </div>

                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 sidebar">
                        <div class="about-get-your-footprints-section">
                            <div class="row mb-3">
                            <div class="col-12 d-flex align-items-center justify-content-start gap-3">
                                <i class="fa-solid fa-circle-play"></i>
                                <h3 style="font-size: 16px; font-weight: 600; text-transform: uppercase;">WHAT WE DO IN {{$casestudy["name"]}}</h3>
                            </div>
                            </div>
                            <figure class="position-relative mb-0">
                            <img src="images/new-page-images/about/human-resources-concept-with-man_23-2150389099.jpg" alt="" class="img-fluid">
                            <a href="https://www.youtube.com/watch?v=eUJc53n0cRg" target="_blank" class="play-icon position-absolute"></a>
                            </figure>
                        </div>
                        @include("include.query-form")
                        <div class="custom-portfolio-testi-container mt-4">
                            <a href="/portfolio" target="_blank">
                            <div class="card border-0 rounded-0 shadow">
                                <div class="icon-container">
                                <i class="fa-brands fa-codepen"></i>
                                </div>
                                <div class="text-container d-flex align-items-center justify-content-center gap-4 me-5">
                                <p class="mb-0 pb-0 text-light">PORTFOLIO</p>
                                <div class="right-arrow">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                                </div>
                            </div>
                            </a>

                            <a href="/testimonial" target="_blank">
                            <div class="card border-0 rounded-0 shadow">
                                <div class="icon-container">
                                <i class="fa-regular fa-pen-to-square"></i>
                                </div>
                                <div class="text-container d-flex align-items-center justify-content-center gap-4 me-5">
                                <p class="mb-0 pb-0 text-light">TESTIMONIAL</p>
                                <div class="right-arrow">
                                    <i class="fa-solid fa-circle-arrow-right"></i>
                                </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        </div>
                    </div>

                    <div class="row mb-5 mt-5 more-case-study-section">
                        <h2 class="text-center mb-5">More Case Studies</h2>

                        @foreach ($allCasestudy as $row)
                            <div class="col-lg-3 col-md-6 col-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-img">
                                        <a href="{{ url("casestudy/".Str::slug($row["name"])."") }}"><img src="{{ url("images/casestudy/bannerImage/".$row["bannerImage"]) }}" alt=""></a>
                                    </div>
                                    <div class="card-description p-3">
                                        <h5 style="color: #DC3545;">{{$row["name"]}}</h5>
                                        <p class="mb-0">{{ Str::limit($row["projectDescription"], 150, " ...") }} <a href="{{ url("casestudy/".Str::slug($row["name"])."") }}" style="color: #DC3545; text-decoration: none;">Read More</a></p>
                                    </div>
                                </div>  
                            </div> 
                        @endforeach
                        
                        <div class="col-12 text-center mt-4">
                        <a href="/case-studies"><button class="btn btn-danger">More Case Study <i class="fa-solid fa-angles-right"></i></button></a>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <h2 class="text-center mb-5">Our Competitive Advantages</h2>

                        <ul class="ocadvatage-container">
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/technology-cs1.png" alt="technology">
                            </div>
                            <span>Latest <br>Technology</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/modal-cs1.png" alt="technology">
                            </div>
                            <span>Flexible <br>Engagement Model</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/cyber-cs1.png" alt="technology">
                            </div>
                            <span>Cyber <br> Security</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/innovation-cs1.png" alt="technology">
                            </div>
                            <span>Scalability &<br>
                            Innovation</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/support-cs1.png" alt="technology">
                            </div>
                            <span>Multi Language <br>
                            Support</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/global-reachcs1.png" alt="technology">
                            </div>
                            <span>Global <br>
                            Reach</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/customer-support-cs1.png" alt="technology">
                            </div>
                            <span>Rich Customer <br>
                            Support</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/certified-professional-cs1.png" alt="technology">
                            </div>
                            <span>Certified <br>
                            Professionals</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/multi-level-cs1.png" alt="technology">
                            </div>
                            <span>Multi-Level <br>
                            Hierarchy</span>
                        </li>
                        <li class="card p-3 rounded border-0 shadow text-center">
                            <div class="icon mx-auto">
                            <img src="/images/brand-management-cs1.png" alt="technology">
                            </div>
                            <span>Brand <br>
                            Management</span>
                        </li>
                        </ul>
                    </div>
                </section>
            
            @endsection
            