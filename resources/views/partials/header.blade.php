 <!-- header section start here -->

 <div class="navigate-container">


     <div class="navigate-full">

         <h1 class="cw-logo fw-bold">CodeWeekend</h1>
         <ul id="active-container">
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
                     <button type="button" class=" dropdown-toggle cw-btn btn-secondary cu-btn" data-bs-toggle="dropdown" aria-expanded="false">
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

                     <i class="fa-solid fa-location-dot location-small"></i>
                 </span>
                 <span class="cw-logo" id="humbargar">

                     <i class="fa-solid fa-bars humbargar-small"></i>
                 </span>

             </div>
         </div>


     


     <div class="showMenu" id="navigate-small-mob">
         <div class="navigate-small-menu">
             <div class="navigate-small-header">
                 <h1 class="cw-logo fw-bold "><a href="{{ route('cw-home') }}" class="text-dark small-head-title">CodeWeekend</a></h1>
                 <span id="close-btn-menu-mob"><i class="fa-solid fa-xmark"></i></span>

             </div>
             <ul class="small-header-font-awesome">
                 <li>
                    <a href="{{ route('cw-home') }}">
                        <span><img src="{{ asset('images/icons/homeIcon.png') }}" alt=""></span>
                         <span class="text-dark"> Home</span>
                        
                    </a></li>
                 <li><a href="{{ route('cw-program') }}"><span><img src="{{ asset('images/icons/coreProgram.png') }}" alt=""></span> <span class="text-dark"> Program </span></a></li>
                 <li><a href="{{ route('cw-alumni') }}"><span><img src="{{ asset('images/icons/alumni.png') }}" alt=""></span> <span class="text-dark"> Alumni</span></a></li>
                 <li><a href="{{ route('news') }}"><span><img src="{{ asset('images/icons/news.png') }}"  alt=""></span> <span class="text-dark"> News</span></a></li>
                 <li><a href="https://community.codeweekend.net/home"><span><img src="{{ asset('images/icons/community.png') }}" alt=""></span>
                    <span class="text-dark"> Community</span></a></li>
                 <li><a href="{{ route('cw-about') }}"><span><img src="{{ asset('images/icons/aboutus.png') }}" alt=""></span><span class="text-dark">About Us</span> </a></li>
             </ul>

             <div class="small-header-links">
                 <div class="header-small-social">
                    <div class="header-icons">
                        <i class="footer-icon">
                            <a href="#"><i class="fa-brands fa-instagram icon-small"></i></a>
                        </i>
                        <i class="footer-icon">
                            <a href="#"><i class="fa-brands fa-linkedin icon-small"></i></a>
                        </i>
                        <i class="footer-icon">
                            <a href="#"><i class="fa-brands fa-facebook icon-small"></i></a>
                        </i>
                      
                    </div>


                 </div>
                 <button class="cw-btn btn-secondary" onclick="showModelContainer()">sign in</button>

             </div>

         </div>


     </div>

 </div>


 <!-- header section end here -->
