@if(count($testimonials) > 0)
<section id="service-testimonials">
    <div class="row">
        
        @foreach($testimonials as $row)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <i class="fa-solid fa-quote-left"></i>
                    <div class="container py-3 px-4 d-flex flex-column justify-content-around h-100">
                        <div class="content-wrapper">
                            <div class="avatar d-inline me-3">
                                <img src="{{ url('images/testimonial/user-1.png') }}" alt="Avatar" class="img-fluid w-100 h-100  rounded-circle">
                            </div>
                            <div class="info">
                                <h6 class="mb-2">{{ $row['customer_name'] }}</h6>
                                <div class="rating">
                                    @php $r = $row['ratings']; @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if($i <= $r)
                                            <i class="fa-solid fa-star"></i>
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="comment my-3 text-center">{{$row['comment']}}</p>
                        <div>
                            <p class="designation fw-bold m-0">{{$row['customer_info']}}</p>
                            {{-- <p class="organisation fw-bold m-0">Balistreri - Considine</p> --}}
                        </div>
                    </div>
                    <i class="fa-solid fa-quote-right"></i>
                </div>
            </div>
        @endforeach
        
        {{ $testimonials->links() }}
        
    </div>
</section>
@else
    {{"No testimonial"}}
@endif