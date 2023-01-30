 <!-- Meet our Head Quarters section start -->
 <div class=" head-quarters-container">

    <h2 class="text-center mission-typo">Our Alumni</h2>

    <div class="card-group  ">
      @foreach ($alumnis as $alumni)
        <div class=" mentor-card">
          <img src="{{ asset('storage/alumnis/' . $alumni->photo) }}">
          <div class="card-body-content">
            <div class="card-body-text">

              <h5>{{ $alumni->name }}</h5>
              <p>{{ $alumni->description }}</p>
            </div>

            <div class="vector-img-card">
              <a class="vector-img" href="{{ $alumni->linkedin }}"><img src="Images/Vector.png" alt="" style="height: 24px; width: 24px;"></a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
    

      <a href="#" class="cw-btn load-more-btn">Load More</a>
    
  </div>
  <!-- Meet our Head Quarters section End -->