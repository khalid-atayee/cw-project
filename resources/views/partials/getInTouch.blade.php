 <!-- get in touch section start here =======
  ====-->


 <div class="get-in-touch-container">

   <h2 class="mission-typo"> Get In Touch!</h2>
   <section class="in-touch">
     <div class="in-touch-info">
       <form action="{{ route('storeFeedback') }}" method="post">
         @csrf
         <div class="inputField-container-form input-container-margin">
           <label for="Name" class="what-make-different-title"> Full Name*</label>
           <input type="text" class="get-int-touch-input-field" name="full_name" id="1" required>
         </div>
         <div class="inputField-container-form input-container-margin">
           <label for="Email" class="what-make-different-title"> Email*</label>
           <input type="email" class="get-int-touch-input-field" name="email" id="2" required>
         </div>
         <div class="inputField-container-form input-container-margin">
           <label for="message" class="what-make-different-title"> Messages*</label>
           <textarea class="text-area-input" name="message" id="3" cols="30" rows="5"></textarea>
         </div>

         <button type="submit" class="cw-btn btn-dark-blue in-touch-btn my-2 mt-4" data-aos="fade-up">Send</button>
     </div>

     </form>
 </div>
 <!-- <div class="img"> -->
 <img src="{{ asset('images/question-1.jpg') }}" alt=" question img" data-aos="fade-left">
 <!-- </div> -->
 </section>
 </div>



 <!-- get in touch section end here=======
  ===== -->