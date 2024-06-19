
@if(!empty($all_posts))
<!-- blogs-section-start -->
<section id="service-blogs" class="container-p40">
    <div class="section-details">
        <h2 class="section-title">Our Blogs</h2>
        <p class="section-description">Explore our blog for valuable insights and inspiration.</p>
    </div>
    <div class="blogs-carousel owl-carousel">
        <!-- blog-1 -->
        @foreach ($all_posts as $post)
            <div class="item card h-100 m-1">
                @php
                if (isset($post['featured_media'])) {
                    $media_id = $post['featured_media'];
                    $media_response = file_get_contents('https://blog.tech2globe.com/wp-json/wp/v2/media/' . $media_id);
                    $media_data = json_decode($media_response, true);
                    if ($media_data !== null && isset($media_data['source_url'])) {
                        // echo "Banner Image: <img src='" . $media_data['source_url'] . "'><br>";
                        echo '<img src="'.$media_data['source_url'].'" class="card-img-top p-2 w-100 h-100" alt="Case Study">';
                    }
                }
                @endphp
                <div class="card-body pt-0 px-2">
                    <h5 class="card-title">{{$post['title']['rendered']}}</h5>
                    <p class="text-muted blog-excerpt">{{ strip_tags($post['excerpt']['rendered']) }}</p>
                    <a href="https://blog.tech2globe.com/{{Str::slug($post['slug'])}}" target="_blanck" class="link-offset-2">Read More <i class="fa-solid fa-chevron-right fa-xs"></i></a>
                </div>
            </div>
        @endforeach

    </div> <!-- End of row -->
    <div class="d-flex justify-content-center mt-3">
        <button type="button" class="btn btn-danger"><a href="https://blog.tech2globe.com/" class="text-decoration-none text-white">View All</a></button>
    </div>
</section>
<!-- blogs-section-end -->
@endif