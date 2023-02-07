<div class="container news-container">
    <h1 class="text-center my-4 fw-bold">
        News
    </h1>
    <div class="row">

        <div class="news-hero  d-flex flex-column justify-content-between col-12" data-aos="zoom-in">
            <div></div>

            <div class="text-center  p-1 news-hero-text">
                <h1>
                    {{ $first->title }}
                </h1>
                <p class="px-2">
                    {{ $first->description }}
                </p>
                {{-- <p class="card-text "><small class="">Last updated 3 hrs ago</small></p> --}}
            </div>

        </div>
        <div class="card border-1 my-3">
            <h5 class="card-header">Recent</h5>
            <div class="card-body ">
                @foreach ($newses as $news)
                <p>
                    <a href="">{{ $news->title }}</a>
                </p>
                @endforeach
               
            </div>
        </div>

        <div class="cards-group news-cards-group d-flex flex-wrap justify-content-around text-center">
            @foreach ($newses as $news)
            <a href="#" class="card me-3 mb-3 col-sm-5 col-12 col-md-3" data-aos="fade-down">
                <div>
                    <div class="card-img-wrap">
                        <img style="height: 350px;" src="{{ asset('storage/posts/'. $news->image) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                        <p class="card-text tw-truncate">{{ $news->description }}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                    </div>
                </div>
            </a>
            @endforeach
            

        </div>
        <div class="text-center my-3" data-aos="fade-up">
            <button class="cw-btn btn-dark-blue text-center">load More</button>
        </div>

    </div>

</div>