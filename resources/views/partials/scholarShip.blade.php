    <!-- need scholarship start here======
  ===== -->
    <div class="scholarship-container">

      <div class="Attend">
        <h1 class="largest-typo" data-aos="fade-left">
          Need Scholarship to Attend?
        </h1>
        <a  class="cw-btn btn-dark-blue" href="{{ Auth::user() ? '#' : route('students.index')}}" data-aos="fade-up">Apply Now</a>
      </div>
      <div class="need-img">
        <img src="images/help.jpg" alt="" class="images" data-aos="fade-right">
      </div>
    </div>
    <!-- end scholorship -->