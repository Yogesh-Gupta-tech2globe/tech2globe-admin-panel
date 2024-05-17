
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "http://localhost:8000"; ?>
            <h1>This is a Demo File</h1>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                {{-- @include("include.blog") --}}
                @include("include.faq")
            @endsection