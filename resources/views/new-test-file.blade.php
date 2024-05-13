
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "http://localhost:8000"; ?>
            <section>
                            Write Code Here...
                            <h1>Yogesh 010 ji</h1>
                          </section>

                          @include('include.portfolio')
                          @include('include.casestudy')
                          @include('include.testimonials')
                          {{-- @include('include.blog') --}}
                          @include('include.faq')
            @endsection