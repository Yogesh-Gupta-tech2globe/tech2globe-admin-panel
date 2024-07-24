
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <div class="banner-outer inner-banner banner-1">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

          <h1>Testimonial</h1>

        </div>
      </div>
    </div>
  </div>

  <!-- end of banner -->
  @include("include.breadcrumb-resources")
  @include("include.cta-form")
  
  <section class="container cartFeature inner-page-content">
      
    <div class="row">
      <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 testimonail">
        <div class="testbg">
          <h2 class="text-dark">Your input is important to us. Please provide your valuable feedback.</h2>
          <p> Here are some testimonials from our clients</p>
        </div>
      </div>
    </div>
    
    @include("include.testimonial-main")
    
</section>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection