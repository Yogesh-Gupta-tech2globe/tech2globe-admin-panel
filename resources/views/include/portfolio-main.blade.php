
<style>
  .categoryBtn.active {
        background: #e3e3e3;
        color: black !important;
    }
    
    .categoryBtn.active ul.nav.nav-tabs li a{color:#494949;}
        .portfolioContainer ul.nav.nav-tabs li {
            padding: 0 !important;
            background: #4bb884;
        }
        .subcatbtn.active {
        background: #e3e3e3;
        color: #4b4a4a !important;
    }

    .portfolioContainer ul.nav.nav-tabs li:hover {
        background-color: #c6010b;
    }
/* 
    .portfolioContainer ul.nav.nav-tabs li a:focus {
        background: #e3e3e3 !important;
        border-radius: 2px;
        color: #000;
    } */

    .portfolioContainer ul.nav.nav-tabs li a {
        padding: 4px 10px;
    }

    .portfolio_imagBg {
        background: #ffffff;
    }

    .portfolioContainer .tab-content {
        margin-top: 25px;
    }

    .portfolio_imagBg:hover {
        position: static;
    }

    .inner_portfolio-container-newsite .card {
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
    }

    .portfolio-parent-container-tab {
        margin-top: 20px;
    }

    .portfolio-img {
        width: 100%;
        height: 185px;
        background: #ffff;
    }

    .portfolio-img img {
        width: 100%;
        height: 100%;
        overflow: hidden;
        object-fit: contain;
    }

    .row.inner_portfolio-container-newsite>* {
        width: 24%;
        height: 430px
    }

    .inner_portfolio-container-newsite .card p {
        text-align: left;
        font-size: 15px;
    }

    .inner-portfolio-btn-newsite {
        text-align: left !important;
        background-color: #4bb884 !important;
    }

    .portfolio-container-newsite .portfolio_imagBg>a {
        height: auto !important;
    }

    .portfolio-container-newsite .card {
        height: 378px !important;
        margin-top: 29px;
    }

    .portfolio-container-newsite .card {
        height: 393px !important;
        margin-bottom: 30px;
        background: #f7f7f7;
    }

    btn-portfolio-container-newsite {
        margin-top: 28px;
    }

    .portfolio-container-newsite .portfolio_imagBg:hover {
        transform: none;
        box-shadow: none;
    }

    /* .inner_portfolio-container-newsite .card{
    height: 355px;
  } */
    .inner_portfolio-container-newsite .portfolio_imagBg:hover {
        transform: none;
        box-shadow: none;
    }

    .portfolio_imagBg h3 {
        font-size: 21px;
        font-weight: 600;
        margin-top: 10px;
        margin-bottom: 7px;
    }

    .inner-portfolio-btn-newsite {
        position: absolute;
        bottom: 20px;
        left: 50%;
        margin-left: -50px;
        width: max-content;
        background: #c6010b;
        padding: 8px 12px;
        border-radius: 5px;
    }

    .inner-portfolio-btn-newsite a {
        color: #fff;
    }

    @media(min-width:768px)and (max-width:1200px) {
        .inner_portfolio-container-newsite>* {
            width: 50% !important;
        }
    }

    @media(max-width:767px) {
        .row.inner_portfolio-container-newsite>* {
            width: 100%;
            height: auto;
        }

        .inner-portfolio-btn-newsite {
            position: static;
            bottom: 0;
            left: auto;
            margin: 0;
        }
    }
</style>
<style>
    .preloader-dot-loading {
      display: block;
      margin: 0px auto;
      width: 100px;
  
      .cssload-loading i {
        width: 25px;
        height: 25px;
        display: inline-block;
        border-radius: 50%;
        background: #BB060A;
  
        &:first-child {
          opacity: 0;
          animation: cssload-loading-ani2 0.58s linear infinite;
          -o-animation: cssload-loading-ani2 0.58s linear infinite;
          -ms-animation: cssload-loading-ani2 0.58s linear infinite;
          -webkit-animation: cssload-loading-ani2 0.58s linear infinite;
          -moz-animation: cssload-loading-ani2 0.58s linear infinite;
          transform: translate(-19px);
          -o-transform: translate(-19px);
          -ms-transform: translate(-19px);
          -webkit-transform: translate(-19px);
          -moz-transform: translate(-19px);
        }
  
        &:nth-child(2),
        &:nth-child(3) {
          animation: cssload-loading-ani3 0.58s linear infinite;
          -o-animation: cssload-loading-ani3 0.58s linear infinite;
          -ms-animation: cssload-loading-ani3 0.58s linear infinite;
          -webkit-animation: cssload-loading-ani3 0.58s linear infinite;
          -moz-animation: cssload-loading-ani3 0.58s linear infinite;
        }
  
        &:last-child {
          animation: cssload-loading-ani1 0.58s linear infinite;
          -o-animation: cssload-loading-ani1 0.58s linear infinite;
          -ms-animation: cssload-loading-ani1 0.58s linear infinite;
          -webkit-animation: cssload-loading-ani1 0.58s linear infinite;
          -moz-animation: cssload-loading-ani1 0.58s linear infinite;
        }
      }
    }
  
    @keyframes cssload-loading-ani1 {
      100% {
        transform: translate(39px);
        opacity: 0;
      }
    }
  
  
    @-o-keyframes cssload-loading-ani1 {
      100% {
        -o-transform: translate(39px);
        opacity: 0;
      }
    }
  
  
    @-ms-keyframes cssload-loading-ani1 {
      100% {
        -ms-transform: translate(39px);
        opacity: 0;
      }
    }
  
  
    @-webkit-keyframes cssload-loading-ani1 {
      100% {
        -webkit-transform: translate(39px);
        opacity: 0;
      }
    }
  
  
    @-moz-keyframes cssload-loading-ani1 {
      100% {
        -moz-transform: translate(39px);
        opacity: 0;
      }
    }
  
  
    @keyframes cssload-loading-ani2 {
      100% {
        transform: translate(19px);
        opacity: 1;
      }
    }
  
  
    @-o-keyframes cssload-loading-ani2 {
      100% {
        -o-transform: translate(19px);
        opacity: 1;
      }
    }
  
  
    @-ms-keyframes cssload-loading-ani2 {
      100% {
        -ms-transform: translate(19px);
        opacity: 1;
      }
    }
  
  
    @-webkit-keyframes cssload-loading-ani2 {
      100% {
        -webkit-transform: translate(19px);
        opacity: 1;
      }
    }
  
  
    @-moz-keyframes cssload-loading-ani2 {
      100% {
        -moz-transform: translate(19px);
        opacity: 1;
      }
    }
  
  
    @keyframes cssload-loading-ani3 {
      100% {
        transform: translate(19px);
      }
    }
  
  
    @-o-keyframes cssload-loading-ani3 {
      100% {
        -o-transform: translate(19px);
      }
    }
  
  
    @-ms-keyframes cssload-loading-ani3 {
      100% {
        -ms-transform: translate(19px);
      }
    }
  
  
    @-webkit-keyframes cssload-loading-ani3 {
      100% {
        -webkit-transform: translate(19px);
      }
    }
  
  
    @-moz-keyframes cssload-loading-ani3 {
      100% {
        -moz-transform: translate(19px);
      }
    }
</style>


<section class="container cartFeature portfolio inner-page-content">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark pb-2">Our Portfolio</h2>
            <p>For its lifetime, Tech2Globe has delivered hundreds of cost-effective and high-quality software solutions
                for a wide range of industries and domains, including consumer and business software development,
                e-commerce, retail, manufacturing, real estate, community services, and many others.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="divider"></div>

            <div class="portfolioContainer">
                <h3 class="text-dark text-center pb-3">A showcase of our best work</h3>
                <p class="pmargin text-center">These are the projects we are most passionate about</p>

                @if (count($category) > 0)
                    <div class="tabbable portfolio-parent-container-tab" id="mygallery">
                        <ul class="nav nav-tabs">
                            @php $a = 1; @endphp
                            @foreach ($category as $row)

                                @php
                                    $categoryName = $row['name'];
                                    $categoryNameId = str_replace(" ", "-", $categoryName);
                                @endphp

                                <li><a class="categoryBtn @if($a==1){{'active'}}@endif" href="#" catid="{{$row['id']}}" id="{{$categoryNameId}}-tab" data-bs-target="#{{$categoryNameId}}" data-bs-toggle="tab">{{ $row['name'] }}</a></li>

                                @php $a++; @endphp
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-content" id="subCategoryContainer">
                        
                    </div>

                    <div class="preloader-dot-loading my-3" id="preloader">
                        <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
                    </div>

                    @else
                    {{"No Data"}}
                @endif

            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {

        var ajax1 = null;
        var ajax2 = null;

        //For events by year
        function loadportfoliobysubcat(catid, subcatid, categoryNameId) {

            $("#portfolioContainer").html("");
            $("#preloader").show();

            var ajax2 = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/getportfolio",
                data: {
                    catid: catid,
                    subcatid: subcatid,
                    categoryNameId: categoryNameId
                },
                success: function(response) {
                    $("#portfolioContainer").append(response);
                    $("#preloader").hide();
                }
            });

        }

        //For Events

        function loadSubCategory(catid, categoryNameId) {

            $("#subCategoryContainer").html("");
            $("#preloader").show();

            var ajax1 = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/getPortfolioSubcat",
                data: {
                    catid: catid,
                    categoryNameId: categoryNameId
                },
                success: function(response) {
                    
                    if ($("#subCategoryContainer").append(response)) {

                        var catid = $(".active .subcatbtn").attr("catid");
                        var subcatid = $(".active .subcatbtn").attr("subcatid");
                        var categoryNameId2 = $(".active .subcatbtn").attr("data-bs-target");
                 
                        loadportfoliobysubcat(catid, subcatid, categoryNameId2);

                    }
                }
            });

        }


        $(".categoryBtn").click(function(e) {
            e.preventDefault();

            if (ajax1 != null && ajax2 != null) {
                // alert("Hello");
                ajax1.abort();
                ajax2.abort();
            }

            var catid = $(this).attr("catid");
            var categoryNameId = $(this).attr("data-bs-target");

            loadSubCategory(catid, categoryNameId);

        });



        $(document).on("click", ".subcatbtn", function(e) {
            e.preventDefault();

            var catid = $(this).attr("catid");
            var subcatid = $(this).attr("subcatid");
            var categoryNameId = $(this).attr("data-bs-target");

            loadportfoliobysubcat(catid, subcatid, categoryNameId);
        });

        //First Load

        function firstloadportfolio() {
            var catid = $(".categoryBtn.active").attr("catid");
            var categoryNameId = $(".categoryBtn.active").attr("data-bs-target");

            loadSubCategory(catid, categoryNameId);
        }

        firstloadportfolio();


    });
</script>
