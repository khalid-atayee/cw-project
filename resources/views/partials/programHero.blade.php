 <!-- core program  section start here======
====== -->
<div class="core-hero-container ">
    <div class="program-hero-section m-3 rounded-3">
      <div class="row ">

        <div class=" col-lg-7 col-sm-12 p-5 text-center text-md-start ">
          <h2 class="largest-typo">Codeweekend Program </h2>
          <p class="some-paragraph-title textAlign-left"> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Voluptatum quae, totam
            perspiciatis
            nemo, sit laudantium provident explicabo magnam fuga recusandae nesciunt dolorem, libero odit
            nostrum itaque quo? Eveniet, adipisci aspernatur.
          </p>

          <div class="course-info rounded-3 text-start mb-auto px-4 py-3">

            <h4 class="my-2 what-make-different-title">Codeweekend<span class="fw-bold"> (Location) </span>program</h4>
            <h5> <span class="fw-bold landing-paragraph">Start Date:</span> 02/02/22</h5>
            <h5> <span class="fw-bold landing-paragraph">Duration:</span> 1 Year</h5>
            <h5> <span class="fw-bold landing-paragraph">Fees:</span> $ 2,400</h5>
            <a href="{{ Auth::user() ? route('payment.index') : route('students.index')}}" class="cw-btn core-btn">Apply Now</a>
          </div>

        </div>

        <div class="col-lg-5 col-sm-12 p-md-0 my-auto ">
          <img src="images/JavaScript frameworks-rafiki 1.png" alt="A picture of person during coding" class="w-100">
        </div>
      </div>


    </div>
  </div>


  <!-- core program section end here ========
======-->