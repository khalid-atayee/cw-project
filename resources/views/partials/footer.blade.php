<!-- footer starts here -->
<footer>
    <div class="footer-contents ">

        <div class="footer-logo-container text-md-start ">
            <h1 class="fw-bolder fs-1">CodeWeekend</h1>
            <p class="opacity-75 text-md-start mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis sunt ea
                inventore voluptatem
                fugit! Magni voluptatem sequi, quasi nisi nulla enim tempore. Aliquam quisquam ipsa assumenda sunt
                possimus? Laudantium, praesentium.</p>

            <div class="icons-for-wider-screen">
                <div class="footer-icons">
                    <i class="footer-icon">
                        <a href="#"><img src="{{ asset('images/Vector-1.png') }}" alt=""></a>
                    </i>
                    <i class="footer-icon">
                        <a href="#"><img src="{{ asset('images/Vector-2.png') }}" alt=""></a>
                    </i>
                    <i class="footer-icon">
                        <a href="#"><img src="{{ asset('images/Vector-3.png') }}" alt=""></a>
                    </i>
                    <i class="footer-icon">
                        <a href="#"><img src="{{ asset('images/Vector.png') }}" alt=""></a>
                    </i>
                </div>
                <p class="text-start mb-0 mt-4  fst-italic ">
                    &copy; copyright Reserved with CodeWeekend
                </p>
            </div>
        </div>
        <div class="footer-menu my-3">

            <ul class=" text-center">
                <li class=" fw-bold text-uppercase menu-item-header">About us</li>
                <a href="{{ route('cw-about') }}">
                    <li class="footer-menu-item">Campany</li>
                </a>
                <a href="{{ route('cw-home') }}">
                    <li class="footer-menu-item">What we do?</li>
                </a>
                <a href="{{ route('cw-program') }}">
                    <li class="footer-menu-item">Program</li>
                </a>
                <a href="{{ route('cw-alumni') }}">
                    <li class="footer-menu-item">Alumni</li>
                </a>
                <a href="{{ route('cw-program') }}">
                    <li class="footer-menu-item">Mentors and Organizers</li>
                </a>
            </ul>
            <ul class=" text-center">
                <li class=" fw-bold text-uppercase menu-item-header">Support</li>
                <a href="{{ Auth::user() ? route('payment.index') : route('students.index')}}">
                    <li class="footer-menu-item">Apply to Bootcamp</li>
                </a>
                <a href="{{ route('cw-program') }}">
                    <li class="footer-menu-item">Scholorship</li>
                </a>
                <a href="">
                    <li class="footer-menu-item">Contact Us</li>
                </a>
            </ul>
            <ul class=" text-center">
                <li class="fw-bold text-uppercase menu-item-header">Recent News</li>
                <a href="">
                    <li class="footer-menu-item">items</li>
                </a>
                <a href="">
                    <li class="footer-menu-item">items</li>
                </a>
                <a href="">
                    <li class="footer-menu-item">items</li>
                </a>
            </ul>
        </div>
    </div>
    <div class="icons-for-smaller-screens">

        <div class="footer-icons">
            <i class="footer-icon">
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
            </i>
            <i class="footer-icon">
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </i>
            <i class="footer-icon">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </i>
            <i class="footer-icon">
                <a href="#"><i class="fa-solid fa-share-from-square"></i></a>
            </i>
        </div>
        <p class="text-start mt-4  fst-italic copywrite-text">

            &copy; copyright Reserved with CodeWeekend
        </p>
    </div>

</footer>
<!-- footer ends here -->