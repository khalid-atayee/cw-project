 <!-- sign in start here -->
 <div class="sign-in-main-container signInToggle" id="signInId">
     <div class="signIn-container">
         <span class="sign-close-icon" onclick="closeModelContainer()">
             <i class="fa-solid fa-xmark close-btn-sign"></i>
         </span>
         <div class="signIn-title">
             <p>Sign In</p> <span><i class="fa-solid fa-unlock icon-title"></i></span>
         </div>
         <form id="sign-in-input-field" class="spacing-container">

             <div class="inputField-container-form">
                 <label for="email-input">Email<span style="color: red;">*</span></label>
                 <input type="text" class="inputField-content sign-form-input" name="email" id="email-input"
                     placeholder="Someone@gmail.com" autofocus>
                 <span class="text-danger error" id="error-email"></span>
             </div>
             <div class="inputField-container-form">
                 <label for="password-input">Password<span style="color: red;">*</span></label>
                 <input type="password" class="inputField-content sign-form-input" name="password" id="password-input"
                     placeholder="*******" autofocus>
                 <span class="text-danger error" id="error-password"></span>

             </div>
             <div class="sign-in-footer-container">
                 <div class="rememberMeCheck">
                     <input type="checkbox" name="rememberMe" id="checkbox">
                     <label for="checkbox">
                         <span>remember me?</span>
                     </label>
                 </div>
                 <span>|</span>

                 <a href="{{ route('forgot.index') }}">Forgot Password?</a>

             </div>


             <button type="button"
                 onclick="authenticate('{{ route('authentication.login') }}','POST','sign-in-input-field')"
                 class="Sign-btn-form tw-w-full">Sign in</button>
             <div class="container-or-sign-in">
                 <span>
                     <hr>
                 </span>
                 <span class="or-">OR</span>
                 <span>
                     <hr>
                 </span>
             </div>
        

             <div class="not-subscribe">
                 <p>not subscribed yet?</p>


               <p> <a href="{{ Auth::user() ? route('payment.index') : route('students.index')}}">Apply Here</a></p>

             </div>
         </form>




     </div>
 </div>
 <!-- sign in end here -->
