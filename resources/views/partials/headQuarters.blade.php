 <!-- Meet our Head Quarters section start -->
 <div class=" head-quarters-container mb-5" data-aos="fade-down">

     <h2 class="text-center mission-typo mb-4">Our Alumni</h2>

     

     <div class="cards-group news-cards-group d-flex flex-wrap justify-content-around text-center">
         @if (count($alumnis))
             @foreach ($alumnis as $alumni)
                 <div class="card mentor-card" data-aos="fade-down">
                     <div class="card-img-wrap">
                         <img src="{{ asset('storage/alumnis/' . $alumni->photo) }}">
                     </div>
                     <div class="card-body-content">
                         <div class="card-body-text">
                             <h5 class="fw-bold">{{ $alumni->name }}</h5>
                             <p>{{ $alumni->description }}</p>
                         </div>
                         <div class="vector-img-card">
                             <a class="vector-img social-icon" href="{{ $alumni->linkedin }}"><img src="Images/Vector.png"
                                     alt="" style="height: 24px; width: 24px;"></a>
                         </div>
                     </div>
                 </div>
             @endforeach
         @else
             <div class="card mentor-card" data-aos="fade-up">
                 <div class="card-img-wrap">
                     <img src="Images/Rectangle 33.png">
                 </div>
                 <div class="card-body-content">
                     <div class="card-body-text">
                         <h5 class="fw-bold">Card title</h5>
                         <p>General Manager</p>
                     </div>
                     <div class="vector-img-card">
                         <a class="vector-img social-icon social-icon" href="#"><img src="Images/Vector.png"
                                 alt="" style="height: 24px; width: 24px;"></a>
                     </div>
                 </div>
             </div>

             <div class="card mentor-card" data-aos="fade-left">
                 <div class="card-img-wrap">
                     <img src="Images/Rectangle 33.png">
                 </div>
                 <div class="card-body-content">
                     <div class="card-body-text">
                         <h5 class="fw-bold">Card title</h5>
                         <p>General Manager</p>
                     </div>
                     <div class="vector-img-card">
                         <a class="vector-img social-icon" href="#"><img src="Images/Vector.png" alt=""
                                 style="height: 24px; width: 24px;"></a>
                     </div>
                 </div>
             </div>

             <div class="card mentor-card" data-aos="fade-right">
                 <div class="card-img-wrap">
                     <img src="Images/Rectangle 33.png">
                 </div>
                 <div class="card-body-content">
                     <div class="card-body-text">
                         <h5 class="fw-bold">Card title</h5>
                         <p>General Manager</p>
                     </div>
                     <div class="vector-img-card">
                         <a class="vector-img social-icon" href="#"><img src="Images/Vector.png" alt=""
                                 style="height: 24px; width: 24px;"></a>
                     </div>
                 </div>
             </div>

         @endif





     </div>

     <div class=" row  text-center my-5" data-aos="fade-up">
         <div class="col">
             <a href="{{ route('allAlumni') }}" class="cw-btn btn-dark-blue my-3">Load More</a>
         </div>
     </div>





 </div>
 <!-- Meet our Head Quarters section End -->
