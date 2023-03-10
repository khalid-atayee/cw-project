<!-- Faq start here=======
  ==== -->
<div class="container mt-5">

    <h2 class=" text-center mt-4 mission-typo" data-aos="fade-down">Frequently Asked Questions</h2>


    <div class="accordion accordion-flush" id="accordionFlushExample">
        @if (count($faqs))
            @foreach ($faqs as $key=> $faq)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne{{ $key }}" aria-expanded="false" aria-controls="flush-collapseOne"
                            data-aos="fade-up">
                            {{ $faq->title }}
                        </button>
                    </h2>
                    <div id="flush-collapseOne{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">{{ $faq->description }}</div>
                    </div>
                </div>
               
            @endforeach
        @else
            <h3 class="text-muted text-center">Faq Not created yet</h3>


        @endif
        {{-- <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingTwo">
        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" data-aos="fade-up">
          what is the process to the addmision?
        </button>
      </h2>
      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
      </div>
    </div>
    <div class="accordion-item">
      <h2 class="accordion-header" id="flush-headingThree">
        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" data-aos="fade-up">
          what is the process to the addmision?
        </button>
      </h2>
      <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
      </div>
    </div> --}}
    </div>
</div>
<!-- faq end here =========
  =====-->
