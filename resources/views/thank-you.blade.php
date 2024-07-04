
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "/"; ?>
            <style>
  .check-icong {
    background: #65b741;
    width: 55px;
    height: 55px;
    margin: 0 auto 20px;
    display: grid;
    place-content: center;
    border-radius: 50%;
}
.check-icong>* {
    font-size: 39px;
    color: #fff;
}
</style>

  <div class="banner-outer inner-banner banner-1">
    <div class="container">
      <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h2>Thank You!</h2>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumbBg">
    <div class="container">
      <div class="row">
        <ul class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li>Thank You</li>
        </ul>
      </div>
    </div>
  </div>
  <section class="container inner-page-content">
    <div class="row  text-center">
      <div class="col-md-12 py-5">
        <div class="check-icong"> <i class="fa-solid fa-check"></i></div>
        <h1 class="text-danger">Thank You For Contacting Us</h1>
        <p class="text-center pb-0 mb-1"> Our team will get back to you within 1 business day.</p>
        <p class="text-center">Please check your junk e-mail folder and your voicemail box to ensure our communication is not blocked.</p>
        <div class="col-md-6 offset-md-3 col-sm-12 col-12">
          <div class="alert alert-success text-center">
            If you do not hear from us within 1 business day, please send an email to <strong><a href="mailto:Info@tech2globe.com" class="text-success">Info@tech2globe.com</a></strong> We will attend you at the earliest
          </div>
          <button type="button" class="btn btn-danger  btn-lg mb-3" style="background-color:#bc0101;"><a href="https://www.tech2globe.com" style="color:#fff;">Find out more about our services</a></button>
        </div>

      </div>
    </div>
</section>

<style>
  .scrolloff {
    pointer-events: none;
  }
</style>
<div style="clear:both"></div>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                @include("include.blog")
                @include("include.faq")
            @endsection