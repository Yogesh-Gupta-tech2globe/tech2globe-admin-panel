<!-- portfolio-section-start -->
<section id="service-portfolio" class="container-p40">
    <div class="section-details">
        <h2 class="section-title">{{$pageName}} Portfolio</h2>
        <p class="section-description">Explore our {{$pageName}} portfolio to discover our past endeavors.</p>
    </div>
    <div class="container">
        <div class="row p-3">
            <div class="col-md-4 col-lg-3">
                <h3 class="portfolio-title">A showcase of our best work</h3>
                <p class="text-muted portfolio-description">Tech2Globe has delivered hundreds of cost-effective and
                    high-quality software solutions for a wide range of industries and domains, including consumer
                    and business software development, e-commerce, retail, manufacturing, real estate, community
                    services, and many others.</p>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="portfolio-carousel owl-carousel">

                    @foreach($portfolio as $row)
                        <!-- owl-carousel-item -->
                        <div class="item">
                            <div class="card">
                                <a href="{{ url('admin/img/portfolio-images/'.$row['image']) }}" data-glightbox="project-gallery" data-title="{{$row['title']}}" data-description=".cantabil-desc">
                                    <img src="{{ url('admin/img/portfolio-images/'.$row['image']) }}" class="img-fluid w-100 h-100 " alt="{{$row['title']}}">
                                    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                                        <i class="fas fa-expand fa-beat fa-2x text-white"></i>
                                    </div>
                                </a>
                                <!-- project-description -->
                                <div class="glightbox-desc cantabil-desc">
                                    <p>{{$row['content']}}</p>
                                    <a href="{{$row['website_link']}}" class="btn btn-danger text-white text-decoration-none">View Project</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        <div class="row p-3 text-center">
            <!-- navigation-buttons -->
            <div class="portfolio-custom-nav">
                <button class="owl-prev p-0"><i class="fas fa-chevron-left"></i></button>
                <button class="owl-next p-0"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-section-end -->