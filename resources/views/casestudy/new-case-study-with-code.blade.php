
                @extends("layout.layout")
                @section("content")
                <?php $base_url = "http://localhost:8000"; ?>

                    <div class="case-study-banner-container">
                        <div class="case-study-banner-overlay"></div>
                        <img src="{{ url("images/casestudy/bannerImage/".$bannerImage."") }}" alt="Banner" class="img-fluid">
                        <h1 class="fs-1">{{$name}}</h1>
                    </div>

                    <main id="caseStudyContainer">

                        @if(!empty($filecode))
                            {{($filecode)}}
                        @endif
                        
                    </main>
                
                @endsection
                