 <!-- sign in start here -->
 <div class="sign-in-main-container signInToggle" id="signInId">
    <div class="signIn-container">
      <span class="sign-close-icon" onclick="closeModelContainer()">
        <i class="fa-solid fa-xmark"></i>
      </span>
      <div class="signIn-title">
        <p >Sign In</p> <span><i class="fa-solid fa-unlock icon-title"></i></span>
      </div>
      <div class="inputField-container-form">
        <label for="email-input">Email<span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" id="email-input" placeholder="Someone@gmail.com">
      </div>
      <div class="inputField-container-form">
        <label for="password-input">Password<span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" id="password-input" placeholder="*******">
      </div>
  
      <input type="button" value="Sign in" class="Sign-btn-form">
  
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