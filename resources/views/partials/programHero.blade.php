 <!-- core program  section start here======
====== -->
 <div class="container ">
     <div class="program-hero-section my-3 rounded-3">
         <div class="row ">

             <div class=" col-md-7 col-12 p-5 text-center text-md-start d-flex flex-column justify-content-around ">
                 <div class="mb-2">

                     <h2 class=" pb-1 fw-bold text-center mission-typo">Codeweekend Program </h2>
                     <p class="line-h-1 mb-0 my-3"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum
                         quae, totam
                         perspiciatis
                         nemo, sit laudantium provident explicabo magnam fuga recusandae nesciunt dolorem, libero odit
                         nostrum itaque quo? Eveniet, adipisci aspernatur.
                     </p>

                 </div>
                 <div class="course-info rounded-3 text-start mb-0 mx-auto w-100 ">

                     <h2 class="my-2 mb-3 ">Codeweekend<span class="mb-4">
                             <span style="color:#06d6a0">


                                 @if ($check == 'program')
                                 @if (count($default_chapter))
                                 {{ $default_chapter[0]->title . '-' . $default_chapter[0]->city->city_name }}
                                 @else
                                 {{ '[Location]' }}

                                     
                                 @endif
                                 @elseif ($check == 'location')
                                     {{ $data->title . '-' . $data->city->city_name }}
                                 @else
                                     {{ '[Location]' }}
                                 @endif
                             </span> </span>program</h2>
                     <div class="container">

                         <div class="row mb-2">
                             <div class="col-4 fw-bold noBreak ">Start Date:</div>


                             <div class="col"> <span>
                                     @if ($check == 'program')
                                     @if (count($default_chapter))
                                     {{ $default_chapter[0]->start_date }}
                                     @else
                                     {{ 'Not defined Yet' }}

                                         
                                     @endif
                                     @elseif ($check == 'location')
                                         {{ $data->start_date }}
                                     @else
                                         {{ 'Not defined Yet' }}
                                     @endif


                                     {{-- {{ isset($data) ? $data->start_date : 'Not defined Yet' }}  --}}

                                 </span></div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-4 fw-bold noBreak">Duration:</div>


                             <div class="col"><span>

                                     @if ($check == 'program')
                                     @if (count($default_chapter))
                                     {{ $default_chapter[0]->duration }}
                                     @else
                                     {{ 'Not defined Yet' }}

                                     
                                         
                                     @endif
                                     @elseif ($check == 'location')
                                         {{ $data->duration }}
                                     @else
                                         {{ 'Not defined Yet' }}
                                     @endif
                                     Month




                                 </span></div>
                         </div>
                         <div class="row mb-2">
                             <div class="col-4 fw-bold noBreak">Fees:</div>


                             <div class="col">$
                                 @if ($check == 'program')
                                 @if (count($default_chapter))
                                 {{ $default_chapter[0]->fees }}
                                @else
                                {{ 'Not defined Yet' }}

                                @endif
                                 @elseif ($check == 'location')
                                     {{ $data->fees }}
                                 @else
                                     {{ 'Not defined Yet' }}
                                 @endif



                             </div>
                         </div>
                     </div>

                     <div class="mt-3 rounded-pill fw-bold mx-auto d-grid d-sm-inline-block">

                         <a class="cw-btn btn-dark-blue px-3 mt-3 "
                             href="{{ Auth::user() ? route('payment.index') : route('students.index') }}">Apply Now</a>
                     </div>
                 </div>

             </div>

             <div class="col-md-5 col-12 p-md-0 my-auto ">
                 <img src="images/JavaScript frameworks-rafiki 1.png" alt="A picture of person during coding"
                     class="w-100 d-none d-sm-inline-block">
             </div>
         </div>


     </div>
 </div>


 <!-- core program section end here ========
======-->
