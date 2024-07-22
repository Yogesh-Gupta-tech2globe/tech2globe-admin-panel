
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <style type="text/css">
  .main-case-studies-page .case-study-outer {
    margin-block: 20px;
  }

  .main-case-studies-page .case-study-outer img.img-fluid {
    min-height: 180px;
    width: 100%;
    border-radius: 8px;
  }

  .portfolioContainer ul.nav.nav-tabs a:active {
    background: #4bb884 !important;
  }

  .portfolioContainer ul.nav.nav-tabs li a:focus {
    background: #4bb884 !important;
    border-radius: 2px;
  }

  .portfolioContainer ul.nav.nav-tabs li a {
    padding: 4px 10px;
  }
  .portfolioContainer ul.nav.nav-tabs li{
    padding: 0 !important;
  }

  .portfolioContainer ul.nav.nav-tabs li:hover{
    background-color: #b6b6b6;
  }
  
</style>
                                    
                                      <section class="banner-outer banner inner-banner banner-1">

    <div class="container">

      <div class="row">

        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-10 col-12">

          <h1 class="text-center">Case Studies</h1>

        </div>

        @include("include.cta-form")

      </div>

    </div>

  </section>


  @include("include.breadcrumb-resources")
@include("include.casestudy-main")
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection