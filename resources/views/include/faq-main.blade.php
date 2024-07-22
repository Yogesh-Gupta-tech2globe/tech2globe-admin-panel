@if(!empty($faq))
<!-- faq-section-start -->
<section class="container cartFeature new-content">
    <div class="row">
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h2 class="pb-3 text-danger text-capitalize">frequently asked question</h3>

                <div class="accordion accordion-flush" id="accordionFlushFAQ">

                    @php $i=1; @endphp
                    @foreach ($faq as $row)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" style="background-color: #ECECEC;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-faq-{{$i}}" aria-expanded="false" aria-controls="flush-collapse-faq-{{$i}}">
                                    <p style="font-weight: 500;">Q. {{$row['question']}} </p>
                                </button>
                            </h2>
                            <div id="flush-collapse-faq-{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushFAQ">
                                <div class="accordion-body">A. {{$row['answer']}}</div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                    
                </div>

        </div>
    </div>
</section>
<!-- faq-section-end -->
@else
    {{"No FAQ"}}
@endif

{{-- <div class="faq-outer">
    <div class="faq-heading">
        <a class="quen1" href="javascript:void(0)">
            <div class="flip1 plus-faq">+</div>
            <div class="fw-medium">Q. What is Tech2Globe?</div>
        </a>
    </div>
    <div class="faq-answer answer1" style="display:none">
        <p>A. Tech2Globe is a IT Outsourcing Partner established in 2014 for providing complete IT solutions under an affordable price.</p>
    </div>
</div> --}}