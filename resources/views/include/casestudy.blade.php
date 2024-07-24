@if(!empty($casestudy))

<style>
    .stats-row {
        display: flex;
        justify-content: space-around;
        /* flex-wrap: wrap; */
    }
    .stats>*{
        margin:0;
    }
    .stats {
        flex: 1 1 30%;
        margin-inline: 2px;
        text-align: center;
        background-color: #ffffff;
        padding-block: 10px;
        padding-inline: 5px;
        color:#00861D;
        border-radius: 2px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .stats h5.stat {
        color: #28a745;
        font-size: 16px;
    }

    .stats p.stat-desc {
        color: #383838;
        font-size: 12px;
    }

    #service-case-studies       .owl-stage {
    display: flex;
    }
    #service-case-studies    .owl-item {
    display: flex;
    flex: 1 0 auto;
    }
    #service-case-studies .owl-carousel .owl-stage-outer  {
    overflow: visible !important;
    }
    #service-case-studies .card-title{
    padding-inline: 5px;
    }
    #service-case-studies .card a{
    padding-inline: 5px;
    }
</style>
    <!-- case-study-section-start -->
    <section id="service-case-studies" class="container-p40">
        <div class="section-details">
            <h2 class="section-title">{{$pageName}} Case Studies</h2>
            <p class="section-description">Explore our success stories - real projects, real results.</p>
        </div>

        <div class="case-studies-carousel owl-carousel">
            <!-- case-study-1 -->

            @foreach ($casestudy as $row)
                <div class="item card h-100 m-1">
                    <img src="{{ url('images/casestudy/bannerImage/'.$row['bannerImage']) }}" class="card-img-top p-2 w-100 h-auto" alt="Case Study">
                    <div class="card-body pt-1 px-2">
                        <h5 class="card-title">
                            {{$row['name']}}
                        </h5>
                        <div class="stats-row">
                            @if(!empty($row['info1']))
                                <div class="stats">
                                    <h5 class="stat">{{$row['info1']}}</h5>
                                    <p class="stat-desc">{{$row['infoval1']}}</p>
                                </div>
                            @endif
                            @if(!empty($row['info2']))
                                <div class="stats">
                                    <h5 class="stat">{{$row['info2']}}</h5>
                                    <p class="stat-desc">{{$row['infoval2']}}</p>
                                </div>
                            @endif
                            @if(!empty($row['info3']))
                                <div class="stats">
                                    <h5 class="stat">{{$row['info3']}}</h5>
                                    <p class="stat-desc">{{$row['infoval3']}}</p>
                                </div>
                            @endif
                        </div>
                        <a href="/case-studies/{{Str::slug($row['name'])}}" target="_blanck" class="link-offset-2">Read More <i class="fa-solid fa-chevron-right fa-xs"></i></a>
                    </div>
                </div>
            @endforeach

        </div> <!-- End of row -->

        <!-- Pagination -->
        {{-- <nav aria-label="Page navigation case-studies-pagination" id="case-studies-pagination" class="mt-3">
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item"><a class="page-link active" href="#">1</a></li>
            </ul>
        </nav> --}}

    </section>
    <!-- case-study-section-end -->
@endif