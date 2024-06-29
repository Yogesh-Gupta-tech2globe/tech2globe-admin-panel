
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <body class="life-t2g">
  <div class="banner-outer inner-banner banner-2">
    <div class="container-fluid">
      <div class="row py-5 flex-column justify-content-center align-items-center">
        <div class="col-md-4">
          <h1>Life @ Tech2Globe</h1>
        </div>
        <div class="col-md-8">
          <p class="text-light text-center">At Tech2Globe, everything begins with our employees. We take cares with our employees who take cares of our customers in most ideal manner. Being a piece of Tech2Globe offer chances to new learning and ability upgrade. Go along with us, to discover numerous minutes when how you can make differential experience for customer and yourself.</p>
        </div>
      </div>
    </div>
  </div>
  <!-- banner end -->
  @include('include.breadcrumb-aboutus')

 @include('include.life-at-tech2globe')
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection