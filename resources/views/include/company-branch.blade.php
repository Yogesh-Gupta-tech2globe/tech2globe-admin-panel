
<div class="world-map-addresses">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col">
                <ol class="ps-0">
                    @forelse ($companyBranch as $row)
                        <li>
                            <img src="/images/flag/{{$row['flag']}}" alt="" height="75px">
                            <strong>Tech2globe {{$row['name']}}</strong>
                            <div>{{$row['city']}}</div>
                            <p>Location -{{$row['location']}}</p>
                            <small>Phone No. : <a href="tel:{{$row['phone']}}"
                                    class="text-danger hv-text">{{$row['phone']}}</a></small>

                            <iframe
                                src="{{$row['google_map']}}"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </li><!-- list -->
                    @empty
                        {{"No Data"}}
                    @endforelse
                </ol>
            </div><!-- column/12 -->
        </div><!-- row -->
    </div><!-- container -->
</div><!-- world map addresses -->