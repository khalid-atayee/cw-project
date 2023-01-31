 <!-- get in touch section start here =======
  ====-->


 <div class="get-in-touch-container">

     <section class="in-touch">
         <div class="in-touch-info">
             <h2 class="mission-typo"> Get In Touch!</h2>
             <form action="{{ route('feedback.store') }}" method="post">
                 @csrf

                 <div class="inputField-container-form input-container-margin">
                     <label for="Name" class="what-make-different-title"> Full Name*</label>
                     <input type="text" class="get-int-touch-input-field" name="full_name" required>
                     @error('full_name')
                         <p class="text-danger text-left" style="text-align: left">{{ $message }}</p>
                     @enderror

                 </div>
                 <div class="inputField-container-form input-container-margin">
                     <label for="Email" class="what-make-different-title"> Email*</label>
                     <input type="email" class="get-int-touch-input-field" name="email" required>
                     @error('email')
                         <p class="text-danger text-left"  style="text-align: left">{{ $message }}</p>
                     @enderror
                 </div>
                 <div class="inputField-container-form input-container-margin">
                     <label for="message" class="what-make-different-title"> Messages*</label>
                     <textarea class="text-area-input" name="message" id="3" cols="30" rows="5" required></textarea>
                     @error('message')
                         <p class="text-danger text-left"  style="text-align: left">{{ $message }}</p>
                     @enderror
                 </div>

                 <button class="cw-btn btn-dark-blue in-touch-btn my-2 mt-4" data-aos="fade-up">Send</button>
             </form>
         </div>

         <img src="{{ asset('images/question-1.jpg') }}" alt=" question img" data-aos="fade-left">
     </section>
 </div>

 <!-- <div class="img"> -->
 <!-- </div> -->





 <!-- get in touch section end here=======
  ===== -->
