
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <div class="banner-outer inner-banner banner-1 py-5">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h1>FAQ</h1>
                </div>
            </div>
        </div>
    </div>

    @include("include/breadcrumb-resources")
    
    @include("include/faq-main")
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection