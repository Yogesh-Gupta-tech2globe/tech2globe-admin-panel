<style>
  .categoryBtn.active {
      background: #4bb884;
      color: white !important;
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

<section class="container cartFeature  inner-page-content">
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1 class="text-center">Case Studies</h1>
        </div>
        <div class="col-md-12">
            <div class="portfolioContainer">
               
                @if (count($category) > 0)

                    <div class="tabbable" id="casestudies">
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
                    
                
                    <div class="tab-content" id="casestudyContainer">
                        
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
        function loadCasestudy(catid, categoryNameId) {

            $("#casestudyContainer").html("");
            $("#preloader").show();

            var ajax2 = $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "/getCasestudy",
                data: {
                    catid: catid,
                    categoryNameId: categoryNameId
                },
                success: function(response) {
                    $("#casestudyContainer").append(response);
                    $("#preloader").hide();
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

            loadCasestudy(catid, categoryNameId);

        });

        //First Load

        function firstloadcasestudy() {
            var catid = $(".categoryBtn.active").attr("catid");
            var categoryNameId = $(".categoryBtn.active").attr("data-bs-target");

            loadCasestudy(catid, categoryNameId);
        }

        firstloadcasestudy();


    });
</script>

