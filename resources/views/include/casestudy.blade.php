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
                <img src="{{ url('images/casestudy/bannerImage/'.$row['bannerImage']) }}" class="card-img-top p-2 w-100 h-100" alt="Case Study">
                <div class="card-body pt-1 px-2">
                    <h5 class="card-title">
                        {{$row['name']}}
                    </h5>
                    <a href="/casestudy/{{Str::slug($row['name'])}}" class="link-offset-2">Read More <i class="fa-solid fa-chevron-right fa-xs"></i></a>
                </div>
            </div>
        @endforeach

    </div> <!-- End of row -->

    <!-- Pagination -->
    <nav aria-label="Page navigation case-studies-pagination" id="case-studies-pagination" class="mt-3">
        <ul class="pagination justify-content-center mb-0">
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link active" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
    </nav>

</section>
<!-- case-study-section-end -->