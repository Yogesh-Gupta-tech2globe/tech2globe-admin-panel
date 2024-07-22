
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <h2>Hello World</h2>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection