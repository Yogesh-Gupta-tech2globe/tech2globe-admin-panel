 <!-- Footer section start here -->
 <footer class="main-footer">
    <!-- Address section start here -->
    <div class="container-fluid">
        <div class="row g-4 address-section align-items-center justify-content-between">
            @foreach ($companyBranch as $row)
                <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class="address-box">
                        <img class="lozad" src="{{ url('images/flag/'.$row["flag"].'') }}" class="mb-3" alt="India">
                        <p class="address-bar-p">{{$row['location']}}</p>
                        <p><strong>Phone No.:</strong> <a href="tel:{{$row['phone']}}">{{$row['phone']}}</a></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Address section end here -->
    <div class="container">
        <div class="row">
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12 mt-5">
                <div class="footer-heading">
                    <h6>Our Policies</h6>
                </div>
                <ul class="footer-list">
                    @foreach ($footerPages as $row)
                        @if($row['category_id'] == 1)
                            <li><a href="/{{$row['page_url']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12 mt-5">
                <div class="footer-heading">
                    <h6>More Info</h6>
                </div>
                <ul class="footer-list">
                    @foreach ($footerPages as $row)
                        @if($row['category_id'] == 2 && $row['status'] == 1)
                            <li><a href="/{{$row['page_url']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12 mt-5">
        
                <div class="footer-heading">
                    <h6>Support</h6>
                </div>
                <ul class="footer-list">
                @foreach ($footerPages as $row)
                    @if($row['category_id'] == 3)
                        <li><a href="/{{$row['page_url']}}"><i class="fa-solid fa-angles-right"></i> {{$row['sub_category_name']}}</a></li>
                    @endif
                @endforeach
                </ul>
                
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-3 col-sm-6 col-12 mt-5">
                <div class="footer-heading">
                    <h6>Follow Us</h6>
                </div>
                <div class="social-icon-custom social-icon">
                    @foreach ($social as $row)
                        <a target="_blank" href="{{$row['link']}}">{{!! $row['icon'] !!}}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-5">
                <div class="row certificate-logo g-2 mt-0 mt-md-4">

                    @foreach ($achievements as $row)
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <div class="good-firms logs-container">
                                <div class="good-firms-container">
                                    <a target="_blank" href="{{$row['url']}}">
                                        <img class="lozad bg-white py-1 px-1" src="{{ url('images/achievements/'.$row['image'].'') }}" alt="{{$row['name']}}"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>&copy; Copyright {{date('Y')}} | All Rights Reserved by <a href="https://www.tech2globe.com/">Tech2Globe</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer section end here -->