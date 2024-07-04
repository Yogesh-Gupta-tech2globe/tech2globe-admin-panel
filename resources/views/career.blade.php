
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <style>
  /*for career page*/
  tr.maintr th span {
    display: table;
    border: none;
    width: 100%;
    height: 10vh;
  }

  tr.maintr th span {
    display: table-cell;
    vertical-align: middle;
    padding: 5px;
  }

  .career-page-css tr td:nth-child(2),
  .career-page-css tr td:nth-child(3) {
    text-align: center !important;
  }

  .career-page-css .apply-btn-career-page {
    display: grid;
    place-content: center;
  }
</style>

 <section class="banner-outer banner inner-banner banner-1">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

          <h1>Careers at Tech2Globe </h1>


        </div>
      </div>
    </div>
  </section>

  <!-- banner end -->
  @include("include.breadcrumb-aboutus")

  <section class="container new-content">
    <div class="row">
      <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
        <h2 class="h2 fw-bolder text-danger"> Careers at Tech2Globe </h2>
        <hr />

        <p><strong>“Grow as we grow”</strong> Are you in search of doing exciting work in an environment you’re going to love? Are you interested to thrive on excellence? Are you a smart worker with passion to work? Are you eager and enjoy solving challenging problems? Want to work with a shrewd, committed team? Then we are the right employer for you. If you are interested in making a difference in the world, have talent and ready to face challenges and want to pursue a career in web designing, development and internet marketing, then you have golden opportunities waiting. Please visit our portfolio.</p>
        <!-- hr details-->
        <div class="hr-details mt-3 mb-3">
          <h5>Contact HR Department</h5>
          <div class="row d-flex align-items-center justify-conten-start">
            <div class="col-12">
              <i class="fa-solid fa-phone"></i><a href="tel:+91-9871102889" class="ms-2"><u>+91-9871102889</u></a>
            </div>
            <div class="col-12 pt-2">
              <i class="fa-solid fa-envelope"></i> <a href="mailto:career@tech2globe.com" class="ms-2"><u>career@tech2globe.com</u></a>
            </div>
          </div>


        </div>
        <!-- hr details -->
        <div class="clearfix"></div>
       @include('include.career-table')
        


      </div>

      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 sidebar">
        @include("include.resources-about-us")



        <div class="my-4">
          <!-- query form -->
          @include("include.query-form")
          <!-- query form -->
        </div>
      </div>
    </div>
  </section>
  <!-- inner page content end -->
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection