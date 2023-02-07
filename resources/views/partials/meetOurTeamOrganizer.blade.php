 <!-- meet our organizer and mentor start here =====
  ==== -->
 <div class="meet-our-team-parent-container">

     <h2 class="mission-typo" data-aos="fade-up"> Meet Our Organizer And Mentor</h2>
     <div class="meet-our-team">

         <section class="meet-our-team-container meet-org-container">

             @if ($check == 'program')
                 @if (count($curiculumn))
                     @php
                         $count = 0;
                     @endphp
                     @for ($i = 0; $i < count($curiculumn[0]->mentor);)
                         <div class="meet-our-team-content meet-our-organizer">

                             @if ($i == 0)
                                 <div class="meet-our-team-values meet-org-values" data-aos="fade-left">

                                     <img src="{{ asset('storage/organizerImage/' . $curiculumn[0]->organizer->image) }}"
                                         alt="">
                                     <div class="paragraphs core-organizer-par left-text-aligns">
                                         <h5 style="visibility: hidden;">Mentor</h5>
                                         <h3 class="what-make-different-title" id="left-aligns">
                                             {{ $curiculumn[0]->organizer->name }}
                                         </h3>

                                         <h5 class="some-paragraph-title" id="organizerr"> Organizer </h5>
                                         <p class="some-paragraph-title  left-text-aligns" id="left-aligns">
                                             {{ $curiculumn[0]->organizer->description }}</p>
                                     </div>
                                 </div>
                             @else
                                 <div class="meet-our-team-values meet-org-values" data-aos="fade-left">

                                     <img src="{{ asset('storage/mentorImage/' . $curiculumn[0]->mentor[$i]->image) }}"
                                         alt="">
                                     <div class="paragraphs core-organizer-par left-text-aligns">
                                         <h5 style="visibility: hidden;">Mentor</h5>
                                         <h3 class="what-make-different-title" id="left-aligns">
                                             {{ $curiculumn[0]->mentor[$i]->name }}
                                         </h3>

                                         <h5 class="some-paragraph-title" id="organizerr"> Mentor </h5>
                                         <p class="some-paragraph-title  left-text-aligns" id="left-aligns">
                                             {{ $curiculumn[0]->mentor[$i]->description }}</p>
                                     </div>
                                 </div>
                                 @php
                                     $i++;
                                     if ($i == count($curiculumn[0]->mentor)) {
                                         break;
                                     }
                                 @endphp
                             @endif
                             <div class="meet-our-team-values meet-org-values right-text-aligns" data-aos="fade-right">
                                 <div class="paragraphs texts-bottom core-organizer-par  ">
                                     <h3 class="what-make-different-title" id="right-aligns">
                                         {{ $curiculumn[0]->mentor[$i]->name }}</h3>
                                     <h5 class="some-paragraph-title" id="right-aligns">Mentor</h5>
                                     <p class="some-paragraph-title" id="right-aligns">
                                         {{ $curiculumn[0]->mentor[$i]->description }}</p>
                                 </div>
                                 <img src="{{ asset('storage/mentorImage/' . $curiculumn[0]->mentor[$i]->image) }}"
                                     alt="">

                             </div>
                             @php
                                 $i++;
                                 if ($i == count($curiculumn[0]->mentor)) {
                                     break;
                                 }
                             @endphp
                         </div>
                         @php
                         if($i==3){
                            break;
                         }
                     @endphp
                     @endfor
                 @else
                     <h3 class="text-muted text-center">Mentor and Organizer not assigned yet</h3>

                 @endif
             @elseif ($check == 'location')
                 @if (isset($data))
                     @php
                         $count = 0;
                     @endphp
                     @for ($i = 0; $i < count($data->mentor);)
                         <div class="meet-our-team-content meet-our-organizer">

                             @if ($i == 0)
                                 <div class="meet-our-team-values meet-org-values" data-aos="fade-left">

                                     <img src="{{ asset('storage/organizerImage/' . $data->organizer->image) }}"
                                         alt="">
                                     <div class="paragraphs core-organizer-par left-text-aligns">
                                         <h5 style="visibility: hidden;">Mentor</h5>
                                         <h3 class="what-make-different-title" id="left-aligns">
                                             {{ $data->organizer->name }}
                                         </h3>

                                         <h5 class="some-paragraph-title" id="organizerr"> Organizer </h5>
                                         <p class="some-paragraph-title  left-text-aligns" id="left-aligns">
                                             {{ $data->organizer->description }}</p>
                                     </div>
                                 </div>
                             @else
                                 <div class="meet-our-team-values meet-org-values" data-aos="fade-left">

                                     <img src="{{ asset('storage/mentorImage/' . $data->mentor[$i]->image) }}"
                                         alt="">
                                     <div class="paragraphs core-organizer-par left-text-aligns">
                                         <h5 style="visibility: hidden;">Mentor</h5>
                                         <h3 class="what-make-different-title" id="left-aligns">
                                             {{ $data->mentor[$i]->name }}
                                         </h3>

                                         <h5 class="some-paragraph-title" id="organizerr"> Mentor </h5>
                                         <p class="some-paragraph-title  left-text-aligns" id="left-aligns">
                                             {{ $data->mentor[$i]->description }}</p>
                                     </div>
                                 </div>
                                 @php
                                     $i++;
                                     if ($i == count($data->mentor)) {
                                         break;
                                     }
                                 @endphp
                             @endif
                             <div class="meet-our-team-values meet-org-values right-text-aligns" data-aos="fade-right">
                                 <div class="paragraphs texts-bottom core-organizer-par  ">
                                     <h3 class="what-make-different-title" id="right-aligns">
                                         {{ $data->mentor[$i]->name }}
                                     </h3>
                                     <h5 class="some-paragraph-title" id="right-aligns">Mentor</h5>
                                     <p class="some-paragraph-title" id="right-aligns">
                                         {{ $data->mentor[$i]->description }}
                                     </p>
                                 </div>
                                 <img src="{{ asset('storage/mentorImage/' . $data->mentor[$i]->image) }}"
                                     alt="">

                             </div>
                             @php
                                 $i++;
                                 if ($i == count($data->mentor)) {
                                     break;
                                 }
                             @endphp
                         </div>
                         @php
                             if($i==3){
                                break;
                             }
                         @endphp
                         
                     @endfor
                 @endif
             @else
                 <div class="meet-our-team-content">
                     <div class="meet-our-team-values">
                         <img src="{{ asset('images/person_1.jpeg') }}" alt="">
                         <div class="paragraphs">
                             <!-- <h5 style="visibility: hidden;">Organiser</h5> -->
                             <h3 class="what-make-different-title"> Mr.Jamshid </h3>
                             <h5 class="some-paragraph-title" id="organizerr">Organizer</h5>
                             <p class="some-paragraph-title">Jamshid Hashimi is a passionate technologist,
                                 innovation enthusiast and software engineer with
                                 more than a decade of experience</p>
                         </div>
                     </div>
                     <div class="meet-our-team-values ">
                         <div class="paragraphs texts-bottom ">
                             <h3 class="what-make-different-title "> Mr.Mustafa Ehsan Alokozay </h3>
                             <h5 class="some-paragraph-title">Mentor</h5>
                             <p class="some-paragraph-title">Mustafa Alokozay is an open source enthusiast
                                 and has contributed to several open source projects.
                                 He has extensive experience.</p>
                         </div>
                         <img src="{{ asset('images/person_2.jpeg') }}" alt="">

                     </div>
                 </div>
                 <div class="meet-our-team-content">
                     <div class="meet-our-team-values">
                         <img src="{{ asset('images/person_3.jpeg') }}" alt="">
                         <div class="paragraphs">
                             <h3 class="what-make-different-title"> Mr.Shaheen Naikpay </h3>
                             <h5 class="some-paragraph-title">Mentor</h5>
                             <p class="some-paragraph-title" id="par-content">Shaheen Naikpay is a Tech Enthusiast and
                                 Project Manager
                                 He has over a decade of operations and project management experience.</p>
                         </div>

                     </div>
                     <div class="meet-our-team-values">
                         <div class="paragraphs texts-bottom">
                             <h3 class="what-make-different-title"> Mrs.Abida Nabizada </h3>
                             <h5 class="some-paragraph-title">Mentor</h5>
                             <p class="some-paragraph-title">Teacher and Developer.is a Tech Enthusiast and Project
                                 Manager
                                 He has over a decade of operations and project management experience.</p>
                         </div>
                         <img src="{{ asset('images/person_2.jpeg') }}" alt="">

                     </div>

                 </div>

             @endif

         </section>
         <div class="text-center mt-4 p-1">
             <a href="

            @if ($check == 'location') {{ route('cw-curriculam', $data->id) }}
                
            @elseif ($check == 'program')
            @if (count($curiculumn))
            {{ route('cw-curriculam', $curiculumn[0]->id) }}
                
            @endif
            
            @else
            {{ '#' }} @endif
             "
                 class="cw-btn btn-dark-blue p-3 mt-3 ">See The Schedule</a>
         </div>



     </div>
 </div>


 <!-- meet our organizer and team end here =====
==== -->
