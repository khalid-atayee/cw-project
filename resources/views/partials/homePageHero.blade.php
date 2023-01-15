<!-- home page hero section start here -->
<div class="shape2">
    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <path fill="#D9D9D9"
        d="M52.4,-53.3C62.2,-42.5,60.6,-21.3,59.8,-0.8C59,19.7,59,39.4,49.2,52.2C39.4,65,19.7,70.9,1.2,69.8C-17.3,68.6,-34.7,60.3,-47.6,47.5C-60.5,34.7,-68.9,17.3,-71.3,-2.4C-73.7,-22.1,-69.9,-44.1,-57,-55C-44.1,-65.8,-22.1,-65.3,-0.4,-64.9C21.3,-64.5,42.5,-64.2,52.4,-53.3Z"
        transform="translate(100 100)" />
    </svg>
  </div>
  <div class="shape1">

    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
      <path fill="#D9D9D9"
        d="M58.2,-35.7C67.7,-17.2,62.4,7.9,50.2,24.6C38,41.2,19,49.6,-4.7,52.3C-28.5,55.1,-56.9,52.2,-69.9,35C-83,17.8,-80.5,-13.6,-66.3,-34.9C-52.1,-56.1,-26,-67.2,-0.8,-66.7C24.4,-66.2,48.7,-54.2,58.2,-35.7Z"
        transform="translate(100 100)" />
    </svg>
  </div>
  <div class="home-page-hero-section">
    <div class="landing-container">

      <div class="landing-content">


        <span class="largest-typo">Learn To Code,<br> Change your life</span>
        <p class="landing-paragraph textAlign-left">As a team of outstanding consultants, our goal is to assist you and
          your team in elevating your business and maximising it's present on the web.</p>

        <a class="cw-btn apply-btn" href="{{ Auth::user() ? route('payment.index') : route('students.index')}}">Apply Now</a>

      </div>

      <img class="responsive" src="{{ asset('images/making-difference.png') }}"
        alt="codeweekend landing page avatar shows a person is following their targeted goal">
    </div>

  </div>

  <!-- home page hero section end here -->