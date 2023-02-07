<div class="container news-container">
    <h1 class="text-center my-4 fw-bold mission-typo">
        News
    </h1>
    <div class="row">

        <div class="news-hero  d-flex flex-column justify-content-between col-12" data-aos="zoom-in"  >
            <input type="hidden" id="hero-img" value="{{ $first->image }}">
            
            <div class="text-center  news-hero-text">
                <h1>
                    {{ $first->title }}
                </h1>
                <p class="hero-text-description">
                    {{ Str::limit($first->description, 200, '...')  }}
                  <a class="read-more-link read-more-news" href="{{ route('newsDetails', $first) }}" data-aos="fade-right">read more  </a></a>
                </p>
                {{-- <p class="card-text "><small class="">Last updated 3 hrs ago</small></p> --}}
            </div>

        </div>
        <div class="card border-1 my-3">
            <h5 class="card-header">Recent</h5>
            <div class="card-body ">
                @foreach ($newses as $key=> $news)
                <p>
                    <a href="{{ route('newsDetails', $news) }}">{{ $news->title }}</a>
                </p>
                @php
                    if($key==7){
                        break;
                    }
                @endphp
                @endforeach
               
            </div>
        </div>

        <div class="cards-group news-cards-group d-flex flex-wrap justify-content-around text-center">
            @foreach ($newses as $news)
            <a href="{{ route('newsDetails', $news) }}" class="card mx-1 mb-3 col-sm-5 col-12 col-md-3" data-aos="fade-down">
                <div >
                    <div class="card-img-wrap">
                        <img  src="{{ asset('storage/posts/'. $news->image) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $news->title }}</h5>
                        <p class="card-text tw-truncate">{{ $news->description }}</p>
                        <p class="card-text"><small class="text-muted">Added {{ $news->created_at->diffForHumans() }}</small></p>
                        
                    </div>
                </div>
            </a>
            @endforeach
        

        </div>
        <div class="text-center my-3" data-aos="fade-up">
            <a href="{{ route('allnews') }}" class="cw-btn btn-dark-blue text-center">load More</a>

        </div>





    </div>



</div>

<script>
    let image = document.getElementById('hero-img').value;
    console.log(image);
    let container = document.querySelector('.news-hero');
    let url = "storage/posts/"+image;
    container.style.backgroundImage = "url("+url+")"
    console.log(url);
</script>

{{-- style.backgroundImage="url(images/img.jpg)" --}}