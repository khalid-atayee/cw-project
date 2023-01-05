 <!-- header section start here -->

 <div class="navigate-container">


    <div class="navigate-full">

      <h1 class="cw-logo">CodeWeekend</h1>
      <ul>
        <li><a class="header-typo" href="{{ route('cw-home') }}"> Home</a></li>

        <li><a class="header-typo" href="{{ route('cw-program') }}">Program</a></li>
        <li><a class="header-typo" href="{{ route('cw-alumni') }}">Alumni</a></li>
        <li><a class="header-typo" href="#">News</a></li>
        <li><a class="header-typo" href="https://community.codeweekend.net/home">Community</a></li>
        <li><a class="header-typo" href="{{ route('cw-about') }}">About Us</a></li>
      </ul>
      <div class="right-btns">

        <button class="cw-btn location-btn">Location <i class="fa-solid fa-location-dot"></i></button>
        <button class="cw-btn" id="signIn-btn" onclick="showModelContainer()">Sign In</button>
      </div>

    </div>

    <div class="navigate-small">
      <h1 class="cw-logo">CodeWeekend</h1>
      <div class="font-awesome-container">
        <span class="cw-logo">

          <i class="fa-solid fa-location-dot"></i>
        </span>
        <span class="cw-logo" id="humbargar">

          <i class="fa-solid fa-bars"></i>
        </span>

      </div>


    </div>
    <div class="showMenu" id="navigate-small-mob">
      <div class="navigate-small-menu">
        <div class="navigate-small-header">
          <h1 class="cw-logo">CodeWeekend</h1>
          <span id="close-btn-menu-mob"><i class="fa-solid fa-xmark"></i></span>
  
        </div>
        <ul class="small-header-font-awesome">
          <li><a href="{{ route('cw-home') }}"><span><i class="fa-solid fa-house"></i></span>  Home</a></li>
          <li><a href="{{ route('cw-program') }}"><span><i class="fa-solid fa-house"></i></span>  Program</a></li>
          <li><a href="{{ route('cw-alumni') }}"><span><i class="fa-solid fa-house"></i></span>  Alumni</a></li>
          <li><a href="#"><span><i class="fa-solid fa-house"></i></span>  News</a></li>
          <li><a href="https://community.codeweekend.net/home"><span><i class="fa-solid fa-house"></i></span>  Community</a></li>
          <li><a href="{{ route('cw-about') }}"><span><i class="fa-solid fa-house"></i></span>   About Us</a></li>
        </ul>

        <div class="small-footer-links">
          <div class="footer-small-social">
            <a href="#"><span><i class="fa-solid fa-house"></i></span> </a>
            <a href="#"><span><i class="fa-solid fa-house"></i></span></a>
            <a href="#"><span><i class="fa-solid fa-house"></i></span> </a>


          </div>
          <button class="cw-btn" onclick="showModelContainer()">sign in</button>

        </div>
  
      </div>
  

    </div>
    
  </div>


  <!-- header section end here -->
