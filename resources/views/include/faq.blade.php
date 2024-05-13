<!-- faq-section-start -->
<section id="service-faqs" class="container-p40 container">
    <div class="section-details">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <!-- <p class="section-description">Find answers to common inquiries about our services and offerings.</p> -->
    </div>
    <div class="accordion accordion-flush" id="accordionFlushFAQ">

        @php $i=1; @endphp
        @foreach ($faq as $row)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-faq-{{$i}}" aria-expanded="false" aria-controls="flush-collapse-faq-{{$i}}">
                        {{$row['question']}}
                    </button>
                </h2>
                <div id="flush-collapse-faq-{{$i}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushFAQ">
                    <div class="accordion-body">{{$row['answer']}}</div>
                </div>
            </div>
            @php $i++; @endphp
        @endforeach
        
    </div>
</section>
<!-- faq-section-end -->