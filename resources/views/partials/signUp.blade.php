  <!-- sign up start here -->
  
  <div class="sign-in-main-container signUpToggle" id="signUpId">
    <form  method="POST">
      @csrf
    <div class="signIn-container">
      
      <span class="sign-close-icon" onclick="closeSignUpModel()">
        <i class="fa-solid fa-xmark"></i>
      </span>
      <div class="signIn-title">
        <h2 class="signIn-title">Sign Up  <span> <i class="fa-solid fa-user icon-title"></i></span></h2>
      </div>
      <div class="inputField-container-form">
        <label class="some-paragraph-title" for="full_name">Full name <span style="color: red;">*</span> </label>
        <input type="text" class="inputField-content sign-form-input" name="full_name" id="full_name" placeholder="Your Name">
      </div>
  
      <div class="inputField-container-form">
        <label class="some-paragraph-title" for="email">Email<span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" name="email" id="email" placeholder="Someone@gmail.com">
      </div>
  
  
      <div class="inputField-container-form">
        <label class="some-paragraph-title" for="password">Password <span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" name="password" id="password" placeholder="*******">
      </div>
  
      <div class="inputField-container-form">
        <label class="some-paragraph-title" for="password_confirmation">Confirm Password <span style="color: red;">*</span></label>
        <input type="text" class="inputField-content sign-form-input" name="password_confirmation" id="password_confirmation" placeholder="*******">
      </div>
  
      <input type="submit" value="Sign Up" class="Sign-btn-form">
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
        <button class="sign-form-footer-btn some-paragraph-title">
          <span>Sign Up</span>
          <i class="fa-solid fa-unlock"></i>
        </button>
  
        <button class="sign-form-footer-btn some-paragraph-title">
          <span>Sign Up With Facebook</span>
          <i class="fa-brands fa-facebook"></i>
        </button>
  
  
        <button class="sign-form-footer-btn some-paragraph-title">
          <span>Sign Up With Google</span>
          <i class="fa-brands fa-google"></i>
        </button>
  
  
      </div>
  
      <p><span style="color: red;">*</span> field required</p>
  
  
    </div>
  </div>


<!-- sign up end here -->