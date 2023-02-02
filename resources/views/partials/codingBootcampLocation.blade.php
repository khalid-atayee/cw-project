<!-- coding bootcamp location start here====
  =====  -->


<div class="coding-bootcamp-location " data-aos="fade-down">
  <div class="coding-bootcamp-location-content">
    <h2 class="fs-cw-gain fw-bold " data-aos="fade-left">CodeWeekend Bootcamp <span style="color:#06d6a0"> {{ isset($chapter_name)?  $chapter_name->title . '-'. $chapter_name->city->city_name : '[Location]' }}</span> </h2>
    <h3 class="fs-3 mt-2 mb-4" data-aos="fade-left">Learn to code and enhance your coding lorem epsum lorem epsum lorem epsum lorem epsum
      lorem epsum lorem epsum</h3>

    <div class="btn">
      <a class="cw-btn btn-secondary mt-5" id="signIn-btn" href="{{ Auth::user() ? route('payment.index') : route('students.index')}}">Apply Now</a>
    </div>

  </div>
</div>

</div>

<!-- coding bootcamp location end here====
  =====  -->