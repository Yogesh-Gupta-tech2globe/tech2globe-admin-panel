
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <h1>This is my first site</h1>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection