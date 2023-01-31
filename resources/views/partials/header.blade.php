 <!-- header section start here -->

 <div class="navigate-container">


     <div class="navigate-full">

         <h1 class="cw-logo fw-bold">CodeWeekend</h1>
         <ul>
             <li><a class="header-typo" href="{{ route('cw-home') }}"> Home</a></li>

             <li><a class="header-typo" href="{{ route('cw-program') }}">Program</a></li>
             <li><a class="header-typo" href="{{ route('cw-alumni') }}">Alumni</a></li>
             <li><a class="header-typo" href="{{ route('news') }}">News</a></li>
             <li><a class="header-typo" href="https://community.codeweekend.net/home">Community</a></li>
             <li><a class="header-typo" href="{{ route('cw-about') }}">About Us</a></li>
       
         </ul>
         <div class="right-btns">


             <button class="cw-btn location-btn outlined-btn-white"  onclick="showLocationModal()">Location <i
                     class="fa-solid fa-location-dot"></i></button>

             @if (auth()->user())
                 <div class="btn-group">
                     <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                         {{ Auth::user()->name }}
                     </button>
                     <div class="dropdown-menu">
                         @role('admin|organizer|mentor|chapter')
                             <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                         @endrole
                         <a class="dropdown-item" href="{{ route('authentication.logout') }}">Log out</a>

                     </div>
                 </div>
             @else
                 <button class="cw-btn btn-secondary" id="signIn-btn" onclick="showModelContainer()">Sign In</button>
             @endif



         </div>
     </div>

         <div class="navigate-small">
             <h1 class="cw-logo">CodeWeekend</h1>
             <div class="font-awesome-container">
                 <span class="cw-logo" onclick="showLocationModal()">

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
                 <h1 class="cw-logo fw-bold "><a href="homePageHero.blade.php">CodeWeekend</a></h1>
                 <span id="close-btn-menu-mob"><i class="fa-solid fa-xmark"></i></span>

             </div>
             <ul class="small-header-font-awesome">
                 <li><a href="{{ route('cw-home') }}"><span><i class="fa-solid fa-house"></i></span> Home</a></li>
                 <li><a href="{{ route('cw-program') }}"><span><i class="fa-solid fa-house"></i></span> Program</a></li>
                 <li><a href="{{ route('cw-alumni') }}"><span><i class="fa-solid fa-house"></i></span> Alumni</a></li>
                 <li><a href="#"><span><i class="fa-solid fa-house"></i></span> News</a></li>
                 <li><a href="https://community.codeweekend.net/home"><span><i class="fa-solid fa-house"></i></span>
                         Community</a></li>
                 <li><a href="{{ route('cw-about') }}"><span><i class="fa-solid fa-house"></i></span> About Us</a></li>
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
