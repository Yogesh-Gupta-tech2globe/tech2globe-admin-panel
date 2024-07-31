
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <h1>SEO</h1>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection