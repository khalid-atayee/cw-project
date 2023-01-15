 <!-- sign in start here -->
 <div class="sign-in-main-container signInToggle" id="signInId">
    <div class="signIn-container">
      <span class="sign-close-icon" onclick="closeModelContainer()">
        <i class="fa-solid fa-xmark"></i>
      </span>
      <div class="signIn-title">
        <p >Sign In</p> <span><i class="fa-solid fa-unlock icon-title"></i></span>
      </div>
      <form id="sign-in-input-field">
     
      <div class="inputField-container-form">
        <label for="email-input">Email<span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" name="email" id="email-input" placeholder="Someone@gmail.com">
        <span class="text-danger error" id="error-email"></span>
      </div>
      <div class="inputField-container-form">
        <label for="password-input">Password<span style="color: red;">*</span></label>
        <input type="password" class="inputField-content sign-form-input" name="password" id="password-input" placeholder="*******">
        <span class="text-danger error" id="error-password"></span>

      </div>
  
      <button type="button" onclick="authenticate('{{ route('authentication.login') }}','POST','sign-in-input-field')" class="Sign-btn-form tw-w-full">Sign in</button>
      </form>
      <div class="container-or-sign-in">
        <span>
          <hr>
        </span>
        <span class="or-">OR</span>
        <span>
          <hr>
        </span>
      </div>
      <div class="container-btns-footer">
        <button class="sign-form-footer-btn" onclick="showSignUpModel()">
          <span>Sign Up</span>
          <i class="fa-solid fa-user"></i>
        </button>
  
        <button class="sign-form-footer-btn">
          <span>Sign Up With Facebook</span>
          <i class="fa-brands fa-facebook"></i>
        </button>
  
  
        <button class="sign-form-footer-btn">
          <span>Sign Up With Google</span>
          <i class="fa-brands fa-google"></i>
        </button>
  
  
      </div>
  
  
  
    </div>
  </div>
      <!-- sign in end here -->