
                @extends("layout.layout")
                @section("content")
                <?php $base_url = "http://localhost:8000"; ?>

                    <div class="case-study-banner-container">
                        <div class="case-study-banner-overlay"></div>
                        <img src="{{ url("images/casestudy/bannerImage/".$bannerImage."") }}" alt="Banner" class="img-fluid">
                        <h1 class="fs-1">{{$name}}</h1>
                    </div>

                    <main id="caseStudyContainer">

                        @if(!empty($projectDescription))
                            <section id="projectOverview" class="">
                                <h3>Project Overview</h3>
                                <div class="container my-3">
                                    <p>
                                        {{$projectDescription}}
                                    </p>
                                    <div class="row py-3 g-3">
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Client's Problem</h5>
                                                <hr>
                                                <p>
                                                    {{$client_problem}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Tech2Globe's Solution</h5>
                                                <hr>
                                                <p>
                                                    {{$tech2globe_solution}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="card p-3 h-100">
                                                <h5 class="card-title m-0">Key Milestones</h5>
                                                <hr>
                                                <ul>
                                                    <li>{{$key_milestones}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-12">
                                            <div class="row-cols-12">
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-gauge-high fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Client Satisfaction</h5>
                                                                <p class="card-text">{{$client_satisfaction}}/10</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="col my-3">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-calendar-days fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Project Duration</h5>
                                                                <p class="card-text">{{$project_duration}} Days</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                    
                                                <div class="col">
                                                    <div class="card h-100">
                                                        <div class="card-body d-flex align-items-center">
                                                            <div class="icon-col">
                                                                <i class="fa-solid fa-bars fa-2x"></i>
                                                            </div>
                                                            <div class="text-col ms-3">
                                                                <h5 class="card-title">Menus Processed</h5>
                                                                <p class="card-text">{{$menues_processed}} (new + existing)</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                    
                                    </div>
                    
                            </section>
                        @endif

                        @if(!empty($heading4))
                            <section id="outlineCardsTopDescription" class="">
                                <h3>{{$heading4}}</h3>
                                <div class="container">
                                    <p>{{$description4}} </p>
                                    @php
                                        $heading = json_decode($card_heading4);
                                        $content = json_decode($card_content4);
                                    @endphp
                                    <div class="outline-cards-carousel owl-carousel owl-theme">
                                        
                                        @for($i = 0; $i < count($heading); $i++)
                                            <div class="item">
                                                <div class="card h-100">
                                                    <h6>{{$heading[$i]}}</h6>
                                                    <p>
                                                        {{$content[$i]}}
                                                    </p>
                                                </div>
                                            </div>
                                        @endfor
                                        
                                    </div>
                                </div>
                            </section>
                        @endif
                        
                    </main>
                
                @endsection
                