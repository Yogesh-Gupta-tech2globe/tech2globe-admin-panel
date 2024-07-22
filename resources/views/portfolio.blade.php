
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <div class="banner-outer inner-banner banner-1">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <h1>Portfolio</h1>

        </div>
      </div>
    </div>
  </div>

  <!------end of banner------->

  @include("include.breadcrumb-resources")
  
  @include("include.cta-form")
  
  @include("include.portfolio-main")
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection