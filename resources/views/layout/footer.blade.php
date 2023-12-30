 <!-- Footer section start here -->
 <footer class="main-footer">
  <!-- Address section start here -->
  <div class="container">
      <div class="row g-4 address-section align-items-center justify-content-between">
        <?php
        $explodeCountryFlag = explode(',',$middleNavbar[0]['countryFlag']);
        $explodeBranchNumber = explode(',',$middleNavbar[0]['branchNumber']);    
        $explodeBranchCountry = explode(',',$middleNavbar[0]['branchCountry']);
        $explodeBranchAddress = explode('+++',$middleNavbar[0]['branchAddress']);   
        $explodeBranchWebsite = explode(',',$middleNavbar[0]['branchWebsite']);   
        ?>
        @for ($i=0; $i < count($explodeCountryFlag); $i++)
            <div class="col-lg-3 col-md-6">
                <div class="address-box">
                    <img src="images/svgs/{{$explodeCountryFlag[$i]}}" class="mb-3" alt="{{$explodeBranchCountry[$i]}}">
                    <p>{{$explodeBranchAddress[$i]}}</p>
                    <p><strong>Phone No. :</strong> <a href="tel:{{$explodeBranchNumber[$i]}}">{{$explodeBranchNumber[$i]}}</a></p>
                </div>
            </div>
        @endfor
          
          {{-- <div class="col-lg-3 col-md-6">
              <div class="address-box">
                  <img src="images/svgs/canada-flag-icon.svg" class="mb-3 flag-icons" alt="">
                  <p>975 Mid-Way Blvd UNIT 12, Mississauga, ON L5T 2C6, Canada</p>
                  <p><strong>Phone No. :</strong> <a href="tel:+1-516-858-5840">+1-516-858-5840</a></p>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="address-box">
                  <img src="images/svgs/canada-flag-icon.svg" class="mb-3" alt="">
                  <p>3108 2nd Avenue, Port Alberni, V9Y 4C3, <br> Canada</p>
                  <p><strong>Phone No. :</strong> <a href="tel:+1-250-206-8787">+1-250-206-8787</a></p>
              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="address-box">
                  <img src="images/svgs/bharat-flag-icon.svg" class="mb-3" alt="India">
                  <p>606, 6th Floor, Pearls Omaxe Tower-1, Netaji Subhash Place, New Delhi</p>
                  <p><strong>Phone No. :</strong> <a href="tel:+ 011-430-10-700">+ 011-430-10-700</a></p>
              </div>
          </div> --}}
      </div>
  </div>
  <!-- Address section end here -->
  <div class="container">
      <div class="row">
          <div class="col-lg -2 col-md-6 mt-5">
              <div class="footer-heading">
                  <h6>Our Policies</h6>
              </div>
              <ul class="footer-list">
                @foreach ($footerPages as $row)
                    @if($row['category_id'] == 1 && $row['status'] == 1)
                        <li><a href="<?php echo $base_url; ?>{{$row['page_link']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                    @endif
                @endforeach
              </ul>
          </div>
          <div class="col-lg -2 col-md-6 mt-5">
              <div class="footer-heading">
                  <h6>More Info</h6>
              </div>
              <ul class="footer-list">
                @foreach ($footerPages as $row)
                    @if($row['category_id'] == 2 && $row['status'] == 1)
                        <li><a href="<?php echo $base_url; ?>{{$row['page_link']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                    @endif
                @endforeach
              </ul>
          </div>
          <div class="col-lg -2 col-md-6 mt-5">
              <div>
                  <div class="footer-heading">
                      <h6>Support</h6>
                  </div>
                  <ul class="footer-list">
                    @foreach ($footerPages as $row)
                        @if($row['category_id'] == 3 && $row['status'] == 1)
                            <li><a href="<?php echo $base_url; ?>{{$row['page_link']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                        @endif
                    @endforeach
                  </ul>
              </div>
              <div class="pt-4">
                  <div class="footer-heading">
                      <h6>Global</h6>
                  </div>
                  <ul class="footer-list">
                    @for ($i=0; $i < count($explodeBranchCountry); $i++)
                      <li><a target="_blank" href="{{$explodeBranchWebsite[$i]}}"><i class="fa-solid fa-angles-right"></i> {{$explodeBranchCountry[$i]}}</a></li> 
                    @endfor
                  </ul>
              </div>
          </div>
          <div class="col-lg-3 col-md-6 mt-5">
            <div class="footer-heading">
                <h6>Follow Us</h6>
            </div>
            <div class="social-icon-custom social-icon">
                @foreach ($footerPages as $row)
                    @if($row['category_id'] == 5 && $row['status'] == 1)
                    <a target="_blank" href="{{$row['page_link']}}"><i class="fa-brands fa-{{$row['sub_category_name']}} {{$row['sub_category_name']}}-bg"></i></a>
                    @endif
                @endforeach
                {{-- <a target="_blank" href="https://www.linkedin.com/company/tech2globe"><i class="fa-brands fa-linkedin-in linkedin-bg"></i></a>
                <a target="_blank" href="https://www.instagram.com/tech2globeweb/"><i class="fa-brands fa-instagram insta-bg"></i></a> --}}
                <!-- <a class="text-white" target="_blank" href="https://twitter.com/i/flow/login?redirect_after_login=%2FTech2Globe"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc.<path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"/></svg></a> -->
                {{-- <a target="_blank" href="https://www.youtube.com/user/Tech2Globe"><i class="fa-brands fa-youtube youtube-bg"></i></a>
                <a target="_blank" href="https://twitter.com/i/flow/login?redirect_after_login=%2FTech2Globe"><img src="images/twitter.png" alt=""></a> --}}
            </div>
          </div>
          <div class="col-lg-3 mt-5">
              <div class="row certificate-logo g-2 mt-0 mt-md-4">
                  <div class="col-lg-6 col-md-3 col-sm-6 col-6 mt-2">
                      <a target="_blank" href="https://www.dmca.com/Protection/Status.aspx?ID=e2e8fba5-2791-4bce-8f78-05facf7722c5&cdnrdr=1&refurl=https://tech2globe.com/"><img src="images/dmca.png" alt=""></a>
                      <a target="_blank" href="https://clutch.co/profile/tech2globe-web-solutions-llp?utm_source=widget&utm_medium=2&utm_campaign=widget&utm_content=num_reviews&utm_term=tech2globe.com#reviews"><img src="images/clutch.png" alt=""></a>
                  </div>
                  <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                      <a target="_blank" href="<?php echo $base_url . "/career";  ?>"><img src="images/we-are-hiring.png" alt=""></a>
                  </div>
                  <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                      <div class="w-98">
                          <a target="_blank" href="https://www.escindia.in/membership-certifica/tech2globe-web-solutions-llp/"><img src="images/esc-t2g-footer-logo.png" alt=""></a>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-3 col-sm-6 col-6">
                      <div>
                          <a target="_blank" href="https://www.goodfirms.co/company/tech2globe-web-solutions-llp"><img src="images/ecommerce-development-companies.svg" alt=""></a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <hr>
      <div class="row">
          <div class="col-md-12">
              <div class="copyright">
                  <p>&copy; Copyright 2023 | All Rights Reserved by <a href="https://www.tech2globe.com/">Tech2Globe</a></p>
              </div>
          </div>
      </div>
  </div>
</footer>
<!-- Footer section end here -->