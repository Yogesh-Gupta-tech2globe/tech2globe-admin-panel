<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.umd.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/carousel/carousel.thumbs.umd.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- owl -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<!-- owl js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
<style>
  .event-title {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
  }

  a.innercardchild {
    position: relative;
  }

  .festive-tab-title {
    font-size: 16px;
  }

  .life-of-t2g-tabs-container .nav-links-a.active {
    background-color: #ffb9bc !important;
  }

  .festiv-year-collection .nav-link.active {
    background-color: #ff0005 !important;
  }

  .life-of-t2g-tabs-container .card {
    background: rgb(255, 255, 255);
    background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 100, 103, 0.2861519607843137) 58%, rgba(255, 255, 255, 1) 100%);
    border-top: 2px solid #C8070B !important;
    height: 100px;
    width: 130px;
  }

  .collection-data-container {
    width: max-content;
    padding: 1px 10px;
    display: grid;
    place-content: center;
    border-left: 3px solid red;
  }

  #myTabContentLifeOft2gContainer {
    padding-block: 40px;
  }

  .festiv-year-collection .nav-item {
    background: linear-gradient(280deg, rgba(200, 7, 11, 1) 0%, rgba(133, 0, 3, 1) 100%);
    margin-right: 20px;
    border-radius: 5px;
  }

  .festiv-year-collection .nav-link:hover {
    color: #fff;
  }

  .owl-dots {
    display: none;
  }

  .collection-data-container .title {
    font-size: 20px;
    font-weight: 500;
  }

  .myCarouselContainer-tab-parent {
    padding: 0 !important;
  }

  .innercard {
    margin: 10px;
    margin-bottom: 4px;
  }

  a.innercardchild {
    height: 350px;
    width: 100%;
    overflow: hidden;
    border-radius: 18px;
  }

  .innercardchild img {
    object-fit: cover;
  }

  .event-title h4 {
    color: #fff;
    font-size: 24px;
    font-weight: 500;
  }

  a.innercardchild:before {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: #00000061;
    content: "";
  }

  .fancybox__content {
    width: 90% !important;
    height: 350px !important;
    border-radius: 16px !important;
  }

  .owl-carousel .owl-nav button.owl-next,
  .owl-carousel .owl-nav button.owl-prev {
    display: flex !important;
    justify-content: center;
    align-items: center;
  }

  .owl-carousel .owl-nav button.owl-next span,
  .owl-carousel .owl-nav button.owl-prev span {
    font-size: 40px;
    margin-top: -4px;
  }

  .life-of-t2g-tabs-container {
    position: relative;
  }

  .owl-carousel .owl-dots.disabled {
    display: none !important;
  }

  .owl-carousel .owl-nav.disabled {
    display: block !important;
  }

  .owl-carousel .owl-nav.disabled {
    display: block !important;
  }

  button.owl-prev {
    background: #C8070B !important;
    width: 25px !important;
    height: 25px !important;
    z-index: 111 !important;
    position: absolute;
    top: 43px;
    left: -42px !important;
    border-radius: 50% !important;
  }

  button.owl-next {
    background: #C8070B !important;
    width: 25px !important;
    height: 25px !important;
    z-index: 111 !important;
    position: absolute;
    top: 43px;
    right: -42px !important;
    border-radius: 50% !important;
  }

  button.owl-prev span,
  button.owl-next span {
    color: #fff;
  }

  /* .life-t2g .fancybox__footer {
    position: fixed;
    bottom: auto;
    top: 0;
    width: 300px;
    height: 100%;
    left: auto;
    right: 0;
    background: rgb(255 255 255);
  }

  .life-t2g .fancybox__footer .f-thumbs__track {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    transform: matrix(1, 0, 0, 1, 0, 0) !important;
  }

  .life-t2g .fancybox__footer .f-thumbs__track .f-thumbs__slide.for-image .f-thumbs__slide__button {
    opacity: 1;
    min-width: 85px;
    min-height: 55px;
  }

  .life-t2g .fancybox__footer .f-thumbs__track .f-thumbs__slide.for-image {
    margin-block: 8px;
  }

  .life-t2g .fancybox__toolbar.is-absolute {
    width: 80%;
  }

  button.f-button.is-next {
    right: 399px !important;
    position: relative;
  }

  button.f-button.is-prev {
    position: relative;
    left: 156px !important;
  }
  .fancybox__caption {
    position: relative;
    left: -122px;
} */
  @media(max-width:768px) {

    /* .life-t2g .fancybox__footer {
    position: fixed;
    bottom: 0;
    top: auto;
    width: 100%;
    height: auto;
    left: 0;
    right: 0;
    background:none;
}
.fancybox__caption {
    position: static;
    text-align: center;
    left: auto;
}
.fancybox__content{
  margin-left: 0;
}
.life-t2g .fancybox__toolbar.is-absolute{
  width: 100%;
} */
    .owl-dots {
      display: block;
    }

    /* button.f-button.is-next {
      right: 0;
    }

    button.f-button.is-prev {
      left: 0;
    }

    .life-of-t2g-tabs-container button.active {
      display: none !important;
    } */
  }


  .fancybox__container button.f-thumbs__slide__button {
    border-radius: 7px;
  }
</style>


@if(!empty($category))
    <div class="container">
        <ul class="owl-carousel owl-theme nav nav-pills life-of-t2g-tabs-container" id="pills-tab" role="tablist">
        @php $a=1; @endphp
        @foreach ($category as $row)
            @php
                $categoryName = $row['name'];
                $categoryNameId = str_replace(" ", "-", $categoryName);
            @endphp

            <li class="nav-item" role="presentation">
                <a class="item nav-links-a p-0 @if($a == 1) {{"active"}} @endif categoryBtn" catid="{{$row['id']}}" id="{{$categoryNameId}}-tab" data-bs-toggle="tab" data-bs-target="#{{$categoryNameId}}" type="button" role="tab" aria-controls="{{$categoryNameId}}" aria-selected="true">
                    <div class="card border-0 rounded-0 text-center p-2">
                        <div class="icons m-auto w-50 h-50"><img class="w-100 h-100" src="/images/event/category/{{$row['image']}}" alt=""></div>
                        <h5 class="mb-0 fw-normal festive-tab-title">{{$row['name'] }}</h5>
                    </div>
                </a>
            </li>

            @php $a++; @endphp
        @endforeach

        </ul>

        <div class="tab-content" id="myTabContentLifeOft2gContainer">

        </div>

        <div class="preloader-dot-loading my-3" id="preloader">
            <div class="cssload-loading"><i></i><i></i><i></i><i></i></div>
        </div>


    </div>
@else
  {{"No Data"}}
@endif


<script>
    const container = document.getElementById("myCarousel");
    const options = {
        infinite: false,
        Dots: false,
        Navigation: true,
        Thumbs: {
            type: "classic"
        },
        // enabled: true,
        // breakpoints: {
        //   "(min-width: 768px)": {
        //     enabled: false,
        //   },
        // },
    };
    Fancybox.bind('[data-fancybox="gallery"]', {
        Carousel: {
            infinite: false
        },
        dragToClose: false,
        // Images: {
        //   zoom: false,
        // },

        Thumbs: {
            type: "classic"
        }
    });
    new Carousel(container, options, {
        Thumbs
    });
</script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 5
            },
            1000: {
                items: 8
            }
        }
    })

    $('.nav-links-a').click(function() {
        $('.nav-links-a').removeClass('active');
        $(this).addClass('active');
    });
</script>

<script>
    $(document).ready(function() {

        var ajax1 = null;
        var ajax2 = null;

        //For events by year
        function loadeventsbyyear(catid, yearid, categoryNameId) {

            $("#pills-tabContent").html("");
            $("#preloader").show();

            var ajax2 = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/geteventsyear",
                data: {
                    catid: catid,
                    yearid: yearid,
                    categoryNameId: categoryNameId
                },
                success: function(response) {
                    $("#pills-tabContent").append(response);
                    $("#preloader").hide();
                }
            });

        }

        //For Events

        function loadevents(catid, categoryNameId) {

            $("#myTabContentLifeOft2gContainer").html("");
            $("#preloader").show();

            var ajax1 = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/getevents",
                data: {
                    catid: catid,
                    categoryNameId: categoryNameId
                },
                success: function(response) {
                    if ($("#myTabContentLifeOft2gContainer").append(response)) {

                        var catid = $(".active .yearBtn").attr("catid");
                        var yearid = $(".active .yearBtn").attr("yearid");
                        var categoryNameId2 = $(".active .yearBtn").attr("data-bs-target");
                        loadeventsbyyear(catid, yearid, categoryNameId2);

                    }
                }
            });

        }


        $(".categoryBtn").click(function(e) {
            e.preventDefault();

            if (ajax1 != null && ajax2 != null) {
                alert("Hello");
                ajax1.abort();
                ajax2.abort();
            }

            var catid = $(this).attr("catid");
            var categoryNameId = $(this).attr("data-bs-target");

            loadevents(catid, categoryNameId);

        });



        $(document).on("click", ".yearBtn", function(e) {
            e.preventDefault();

            var catid = $(this).attr("catid");
            var yearid = $(this).attr("yearid");
            var categoryNameId = $(this).attr("data-bs-target");

            loadeventsbyyear(catid, yearid, categoryNameId);
        });

        //First Load

        function firstloadevents() {
            var catid = $(".active .categoryBtn").attr("catid");
            var categoryNameId = $(".active .categoryBtn").attr("data-bs-target");

            loadevents(catid, categoryNameId);
        }

        firstloadevents();


    });
</script>

<!-- inner page content Start -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
