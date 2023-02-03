  <!-- meet our team start here =====
  ==== -->
  <div class="meet-our-team-parent-container" data-aos="zoom-out">

      <h2 class="mission-typo" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500"> Meet Our Team</h2>
      <div class="meet-our-team">

          <section class="meet-our-team-container">
              @if (count($teams))
                  @for ($i = 0; $i < count($teams);)
                      <div class="meet-our-team-content">
                          <div class="meet-our-team-values">
                              <img src="{{ asset('storage/team/' .$teams[$i]->image) }}" alt="" data-aos="fade-left">
                              <div class="paragraphs" data-aos="fade-right">
                                  <!-- <h5 style="visibility: hidden;">Organiser</h5> -->
                                  <h3 class="what-make-different-title"> {{ $teams[$i]->name }}</h3>
                                  <h5 class="some-paragraph-title" id="organizerr">{{ $teams[$i]->role }}</h5>
                                  <p class="some-paragraph-title">{{ $teams[$i]->short_bio }}</p>
                              </div>
                          </div>
                          @php
                              
                              $i++;
                              if ($i == count($teams)) {
                                  break;
                              }
                          @endphp
                          <div class="meet-our-team-values ">
                              <div class="paragraphs texts-bottom " data-aos="fade-left">
                                  <h3 class="what-make-different-title"> {{ $teams[$i]->name }}</h3>
                                  <h5 class="some-paragraph-title" id="organizerr">{{ $teams[$i]->role }}</h5>
                                  <p class="some-paragraph-title">{{ $teams[$i]->short_bio }}</p>
                              </div>
                              <img src="{{ asset('storage/team/' .$teams[$i]->image) }}" alt="" data-aos="fade-right">

                          </div>
                          @php
                              $i++;
                              
                              if ($i == count($teams)) {
                                  break;
                              }
                              
                          @endphp
                      </div>
                  @endfor
              @else
                  <div class="meet-our-team-content">
                      <div class="meet-our-team-values">
                          <img src="{{ asset('images/person_1.jpeg') }}" alt="" data-aos="fade-left">
                          <div class="paragraphs" data-aos="fade-right">
                              <!-- <h5 style="visibility: hidden;">Organiser</h5> -->
                              <h3 class="what-make-different-title"> Mr.Jamshid </h3>
                              <h5 class="some-paragraph-title" id="organizerr">Organizer</h5>
                              <p class="some-paragraph-title">Jamshid Hashimi is a passionate technologist,
                                  innovation enthusiast and software engineer with
                                  more than a decade of experience</p>
                          </div>
                      </div>
                      <div class="meet-our-team-values ">
                          <div class="paragraphs texts-bottom " data-aos="fade-right">
                              <h3 class="what-make-different-title "> Mr.Mustafa Ehsan Alokozay </h3>
                              <h5 class="some-paragraph-title">Mentor</h5>
                              <p class="some-paragraph-title">Mustafa Alokozay is an open source enthusiast
                                  and has contributed to several open source projects.
                                  He has extensive experience.</p>
                          </div>
                          <img src="{{ asset('images/person_2.jpeg') }}" alt="" data-aos="fade-left">

                      </div>
                  </div>
                  <div class="meet-our-team-content">
                      <div class="meet-our-team-values">
                          <img src="{{ asset('images/person_3.jpeg') }}" alt="" data-aos="fade-right">
                          <div class="paragraphs" data-aos="fade-left">
                              <h3 class="what-make-different-title"> Mr.Shaheen Naikpay </h3>
                              <h5 class="some-paragraph-title">Mentor</h5>
                              <p class="some-paragraph-title" id="par-content">Shaheen Naikpay is a Tech Enthusiast and
                                  Project Manager
                                  He has over a decade of operations and project management experience.</p>
                          </div>

                      </div>
                      <div class="meet-our-team-values">
                          <div class="paragraphs texts-bottom" data-aos="fade-left">
                              <h3 class="what-make-different-title"> Mrs.Abida Nabizada </h3>
                              <h5 class="some-paragraph-title">Mentor</h5>
                              <p class="some-paragraph-title">Teacher and Developer.is a Tech Enthusiast and Project
                                  Manager
                                  He has over a decade of operations and project management experience.</p>
                          </div>
                          <img src="{{ asset('images/person_2.jpeg') }}" alt="" data-aos="fade-right">

                      </div>

                  </div>

              @endif
          </section>
          <div class="btn-container text-center mx-auto my-2">

              <button class="cw-btn btn-dark-blue mt-2 rounded-pill  my-1 ">See All</button>

          </div>



      </div>
  </div>



  <!-- meet our team end here =====
  ==== -->
