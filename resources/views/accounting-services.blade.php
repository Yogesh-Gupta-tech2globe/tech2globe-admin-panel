
            @extends("layout.layout")
            @section("content")
            <?php $base_url = "http://localhost:8000"; ?>
            <style>
  .cartFeature h3 {
    margin-top: 5px;
    margin-bottom: 1px;
    color: #17161a;
    font-size: 26px;
    font-family: "Poppins", sans-serif;
  }

  .Clientlg-outer {
    width: 20%;
    float: left;
    /* padding: 0px; */
    box-shadow: inset -1px -1px #c6ccd1, -1px -1px #c6ccd1;
  }

  .technologies-img {
    padding: 10px 10px;
    margin: 30px 0 0 0;
    transition: all 0.3s ease 0s;
    text-align: center;
    display: flex;
    align-items: center;
    min-height: 105px;
    background: #fff;
    border: 1px solid #a7a3a3;
    font-family: "Poppins", sans-serif;
  }

  .padding-five-all {
    padding: 5%;
  }

  .border-width-2 {
    border-width: 2px;
  }

  .border-all {
    border: 2px solid #ededed;
  }

  .letter-spacing-minus-1 {
    letter-spacing: -1px;
  }

  .text-extra-dark-gray,
  .btn.text-extra-dark-gray {
    color: #232323;
  }

  .margin-10px-bottom {
    margin-bottom: 10px;
  }

  .feature-box-10 .number {
    display: flex;
    font-size: 30px;
    height: 90px;
    margin: 0 auto;
    text-align: center;
    vertical-align: middle;
    width: 90px;
    position: relative;
    align-items: center;
    justify-content: center;
    font-family: "Poppins", sans-serif;
  }

  .border-color-deep-pink {
    border-color: var(--base-color) !important;
  }

  .feature-box-10:hover .number {
    background: var(--base-color);
    color: #dd1f1f;
    border: 20px solid red;
  }

  .icon-list li {
    position: relative;
    list-style: disc;
    padding-left: 17px;
    font-size: 15px;
    font-family: "Poppins", sans-serif;
    color: #000;
    line-height: 32px;
    font-family: "Poppins", sans-serif;
  }


  .cartFeature ul li {
    color: #515151;
    line-height: 25px;
    padding: 0px 0;
    font-family: "Poppins", sans-serif;
  }

  .imple1 {
    border: 1px solid #858383dd;
    padding: 18px;
    height: auto;
  }

  .imple2 {
    border: 1px solid #858383dd;
    padding: 18px;
    height: auto;
  }

  @media only screen and (min-width: 330px) and (max-width: 640px) {
    .imple1 {
      border: 1px solid #858383dd;
      padding: 18px;
    }
  }

  .form-group .form-control {
    background: #fff;
    border: 1px solid #e8e8e8;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    color: rgba(0, 0, 0, 0.8);
    box-shadow: inset 0 0 6px rgb(0 0 0 / 0%);
    width: 100%;
    padding: 10px 10px 10px 10px;
    height: auto;
    background-color: #fff;
    background-position: left center;
    background-repeat: no-repeat;
    border-radius: 0;
  }


  .item {
    background: #fff;
    text-align: center;
    padding: 30px 25px;
    -webkit-box-shadow: 0 0px 25px rgb(0 0 0 / 7%);
    box-shadow: 0 0px 25px rgb(0 0 0 / 7%);
    border-radius: 20px;
    border: 5px solid rgba(0, 0, 0, 0.07);
    margin-bottom: 30px;
    -webkit-transition: all .5s ease 0;
    transition: all .5s ease 0;
    transition: all 0.5s ease 0s;
  }

  @media only screen and (max-width: 767px) {
    .breadcrumb>li {
      color: #000;
      text-transform: uppercase;
      font-size: 13px !important;
    }

    .faq {
      margin-top: 50px;
    }
  }

  /*767*/
</style>

<section class="banner-outer banner inner-banner banner-1">
    <div class="container">
      <div class="row">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
          <!-- service name change start -->
          <h1 class="text-start">{{$pageName}}</h1>
          <!-- service name change end -->
        </div>
        @include('include/cta-form')
        @include('include/contact-form')
      </div>
    </div>
  </section>


  <!-- banner end -->
 @include('include/breadcrumb-services')
  <div class="container">
    <div class="row  cartFeature">
      <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">

        <img src="images/accounting-services.jpg" alt="Accounting-Services" class="img-responsive">
        <h2 class="text-dark mt-3">Leave your accounting worries to us – we'll handle the details so you can focus on growing your business.</h2>
        <p>If you are a new or established business keeping track of your finances is crucial in making business-related decisions. Here, accounting services can help! Accounting is the practice of keeping track of your revenues and expenses. The role of our accounting experts is to provide precise financial guidance and strategies based on the company's financial position. You can trust us to provide the quality and amount of work we promised you when we began the process.</p>

        <h2 style="font-size:26px;">Why Do Businesses Need Accounting Services?</h2>
        <p>We're much more than accountants as we strive to become your financial advisors as well as business partners!</p>


        <div class="row border-bottom pt-2 pb-2">
          <div class="col-md-2 wpb_single_image d-none d-sm-block" style="border: 2px dotted #e5e2e2;padding:10px;">
            <img src="images/financial-transactions.png" class="img-responsive" alt="Accounting-Services">
          </div>
          <div class="col-md-10 text-left pt-3">

            <h2 class="text-dark h4 text-decoration-underline"><strong>To accurately track and record financial transactions</strong></h2>
            <p class="text-start">Accounting is essential for businesses to keep track of their finances like expenses, sales and investments. This is essential to comply with tax laws and also for making well-informed business decision-making.
            </p>
          </div>
        </div>



        <div class="row border-bottom pt-2 pb-2">
          <div class="col-md-2 wpb_single_image d-none d-sm-block" style="border: 2px dotted #e5e2e2;padding:10px;">
            <img src="images/financial-statements.png" class="img-responsive" alt="Accounting-Services">
          </div>
          <div class="col-md-10 text-left pt-3">

            <h2 class="text-dark h4 text-decoration-underline"><strong>To prepare financial statements</strong></h2>
            <p class="text-start">Outsourced accounting services can help businesses prepare financial statements, such as profit and loss statements, balance sheets, and cash flow statements. These statements provide valuable information to business owners, investors, and stakeholders about the company's financial health.

            </p>
          </div>
        </div>


        <div class="row border-bottom pt-2 pb-2">
          <div class="col-md-2 wpb_single_image d-none d-sm-block" style="border: 2px dotted #e5e2e2;padding:10px;">
            <img src="images/business-decisions.png" class="img-responsive" alt="Accounting-Services">
          </div>
          <div class="col-md-10 text-left pt-3">

            <h2 class="text-dark h4 text-decoration-underline"><strong>To make informed business decisions</strong></h2>
            <p class="text-start">
              By analyzing financial data, businesses can make informed decisions about allocating resources and planning for the future. For example, a company might invest in new equipment or expand into a new market based on its financial performance.
            </p>
          </div>
        </div>


        <div class="row pt-2 pb-2 mb-3">
          <div class="col-md-2 wpb_single_image d-none d-sm-block" style="border: 2px dotted #e5e2e2;padding:10px;">
            <img src="images/laws-and-regulations.png" class="img-responsive" alt="Accounting-Services">
          </div>
          <div class="col-md-10 text-left pt-3">

            <h2 class="text-dark h4 text-decoration-underline"><strong>To comply with laws and regulations</strong></h2>
            <p class="text-start">Businesses must follow specific accounting standards and regulations, such as Generally Accepted Accounting Principles (GAAP) in the US. Accounting services can help companies to ensure that they comply with these requirements.
            </p>
          </div>
        </div>

        <div class="w-100 h-auto d-block service-outsourcing">
    <div class="container mb-5">
      <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <h2 class="h3 text-center mt-3 fw-bold">Different Types Of Outsourced Accounting Services Available</h2>
          <p class="text-center">The financial experts you can trust are available to assist you in today's market that is highly competitive.</p>

          <div class="bg-gray">
            <div class="row">
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="    border: 2px solid #ff00004a;     background-color: #ff00000f;">
                  <h6><a href="/ecommerce-marketplace-management">Bookkeeping</a></h6>
                  <p>Bookkeeping is the process of recording a business's financial transactions. These services include documenting how money comes and goes out from business, such as client and vendor payments. While bookkeepers used to keep track of this information in physical books, the majority of the work is done using digital software. </p>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="border: 2px solid #3f51b561;     background-color: #3f51b50f;">
                  <h6><a href="/digital-marketing-services">Auditing</a></h6>
                  <p>Auditing is the process of reviewing and verifying the accuracy of a company's financial records. The audit can be performed internally by workers of the corporation or externally by a certified public accounting (CPA) firm. Generally, auditing is done by an independent third party and is used to ensure that a company's financial statements are accurate and reliable.
                  </p>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="    border: 2px solid #ff98005c;     background-color: #ff98001f;">
                  <h6><a href="/amazon-consulting-services">Tax Preparation</a></h6>
                  <p>Tax preparation is the process of preparing tax returns, often income tax returns, for someone other than the taxpayer and usually for a fee. It can be a difficult procedure, but it's essential for companies to adhere to the rules and laws of taxation. The service helps people comprehend the complexity of preparing their tax return and ensure that they claim all credits and deductions.
                  </p>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="border: 2px solid #00bcd452;     background-color: #00bcd41c;">
                  <h6><a href="/software-development">Financial consulting</a></h6>
                  <p>Financial consulting involves providing advice and guidance to businesses on financial matters. This can include creating financial projections, developing budgeting strategies, and identifying areas for cost savings.</p>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="border: 2px solid #cddc39b0;     background-color: #cddc394f;">
                  <h6>Payroll</h6>
                  <p>Payroll involves processing a company's employee salaries and wages and withholding and remitting taxes. Accounting services can help businesses manage their payroll accurately and efficiently.
                  </p>
                </div>
              </div>
              <div class="col-lg-4 col-sm-6 mb-4">
                <div class="item h-100 mb-0 pb-0" style="    border: 2px solid #673ab72e;     background-color: #9c27b014;">
                  <h6><a href="/image-photo-editing-services">Financial planning</a></h6>
                  <p>Financial planning involves creating a long-term plan for managing a company's financial resources. This can include setting financial goals, creating a budget, and developing a financial strategy.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




        <!-- right side resources start -->

      </div><!-- col/9 -->

      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 sidebar">

        <div class="sideBox gotQuestion">
          <h2>Useful Links</h2>
          <ul class="sidelink">
            <li><a href="/catalog-processing-services">Catalog Processing</a></li>
            <li><a href="/data-conversion-services">Data Conversion</a></li>
            <li><a href="/data-extraction-services">Data Extraction</a></li>
            <li><a href="/document-processing-services">Document Processing</a></li>
            <li><a href="/forms-processing-services">Forms Processing</a></li>
            <li><a href="/insurance-claims-processing-services">Insurance Claims Processing</a></li>
            <li><a href="/invoice-processing-services">Invoice Processing</a></li>
            <li><a href="/order-processing-services">Order Processing</a></li>
            <li><a href="/survey-forms-processing">Survey Forms Processing</a></li>
          </ul>

        </div>

        <div>
         	@include('include/query-form')
        </div>


      </div><!-- side bar -->
    </div>
  </div>
  <!-- right side resources end -->


 


  <div class="container-fluid py-5 bg-light">
    <!--testimonial--start--->
    <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12" id="amazone-testi">
      <h2 class="main-heading text-center"><span>Testimonial</span></h2>
      <div class="seprator"></div>
      <div id="#" class="carousel slide" data-bs-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="carousel-item active h-auto">
            <div class="row p-3">
              <button class="border-none"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
              <p class="testimonial_para">"I have been using Tech2Globe's Accounting for the past few years, and I am consistently impressed with their service and expertise. They have helped me navigate complex tax laws and regulations and have always been available to answer my questions and provide guidance. I highly recommend their services to any business owner looking for top-notch accounting support."</p>
              <div class="row">
                <div class="col-sm-12">
                  <img src="images/avtarte.png" alt="Accounting-Services">
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item h-auto">
            <div class="row p-3">
              <button class="border-none"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
              <p class="testimonial_para">"Tech2Globe's Outsourced finance and accounting services have been a valuable resource for my business. Not only do they handle all of my accounting needs with precision and accuracy, but they also take the time to explain things in a way that I can understand. I highly recommend their services to anyone needing professional and reliable accounting support. "</p>
              <div class="row">
                <div class="col-sm-12">
                  <img src="images/avtarte.png" alt="Accounting-Services">
                </div>
              </div>


            </div>
          </div>


          <div class="carousel-item h-auto">
            <div class="row p-3">
              <button class="border-none"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
              <p class="testimonial_para">"As a non-profit organization, we must have a reliable and trustworthy accounting team. Tech2Globe has exceeded our expectations in every way! They are always available to answer our questions, provide financial guidance, and help us make informed decisions. "</p>
              <div class="row">
                <div class="col-sm-12">
                  <img src="images/avtarte.png" alt="Accounting-Services">
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
      <div class="controls testimonial_control pull-right d-block d-sm-none">
        <a class="left fa fa-chevron-left btn btn-default testimonial_btn" data-bs-slide="prev"></a>

        <a class="right fa fa-chevron-right btn btn-default testimonial_btn" data-bs-slide="next"></a>
      </div>
    </div>
    <!--testimonial--end--->

  </div>

  <div class="container-fluid">
    <section class="faq mb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-12 col-lg-12 text-center">
            <div class="section-title text-center">
              <h2 class="main-heading">FAQ<span>'s</span></h2>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12">
            <div class="accordion" id="accordionExample">
              <div class="row">
                <div class="col-xl-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                          Do you offer ongoing support, or do you only handle one-time projects?
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, being the most credible accounting agency, we offer all sorts of ongoing support to businesses; you can rest assured about this. It is best to discuss your specific needs with our accounting professionals to determine the best fit for your business.
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          How often will I receive updates from the accounts receivable service?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" data-parent="#accordionExample">
                      <div class="card-body">
                        The frequency of updates for our accounts receivable service will depend on the specific service and the terms of your agreement. Some of our services may provide daily or weekly updates, while others may offer less frequent updates. Be sure to clarify the update schedule with us before signing an agreement.
                      </div>
                    </div>
                  </div>

                </div>

                <div class="col-xl-6 col-lg-6">
                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Will the accounts receivable service have access to my business's financial information?
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" data-parent="#accordionExample">
                      <div class="card-body">
                        Yes, our accounts receivable service will typically have access to your business's financial information in order to manage your accounts receivable effectively. This may include invoices, payment histories, and other financial data.
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapseThree">
                          Can I cancel my accounts receivable service at any time?
                        </button>
                      </h5>
                    </div>
                    <div id="collapse4" class="collapse" data-parent="#accordionExample">
                      <div class="card-body">
                        The terms for canceling your accounts receivable service agreement will depend on the specific terms of your agreement. We may have flexible cancellation policies but still be sure that you clear your situation before canceling.

                      </div>
                    </div>
                  </div>



                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </section>

  </div>
                @include("include.portfolio")
                @include("include.casestudy")
                @include("include.testimonials")
                {{-- @include("include.blog") --}}
                @include("include.faq")
            @endsection