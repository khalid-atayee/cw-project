@extends('index')
@section('content')
@include('partials.header')

<div class="container news-container">
    <h1 class="text-center my-4 fw-bold mission-typo">
        News
    </h1>
    <div class="row">

        <div class="d-flex flex-column justify-content-between col-12 tw-border" data-aos="zoom-in">
            <div class="tw-w-full">
                <img class="news-hero  d-flex flex-column justify-content-between col-12 " style="object-fit: cover" id="hero-image-news" src="{{ asset('storage/posts/' . $news->image) }}" alt="">
            </div>

            <div class="text-center  p-1 tw-bg-white font-family-class">
                <h1 class="tw-text-gray-800">
                    {{ $news->title }}
                </h1>
                <p class="px-2 tw-text-gray-800 font-family-class">
                    {{ $news->description }}
                </p>
                {{-- <p class="card-text "><small class="">Last updated 3 hrs ago</small></p> --}}
            </div>

        </div>
        <div class="card border-1 my-3">
            <h5 class="card-header font-family-class">Recent</h5>
            <div class="card-body  font-family-class">
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
            @foreach ($newses as $key=> $news)
            <a href="{{ route('newsDetails', $news) }}" class="card me-3 mb-3 col-sm-5 col-12 col-md-3" data-aos="fade-down">
                <div>
                    <div class="card-img-wrap">
                        <img style="height: 350px;" src="{{ asset('storage/posts/'. $news->image) }}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold font-family-class">{{ $news->title }}</h5>
                        <p class="card-text tw-truncate font-family-class">{{ $news->description }}</p>
                        <p class="card-text font-family-class"><small class="text-muted">Added {{ $news->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </a>
            @php
            if($key==5){
                break;
            }
        @endphp
            @endforeach
            

        </div>
        <div class="text-center my-3" data-aos="fade-up">
            <a href="{{ route('allnews') }}" class="cw-btn btn-dark-blue text-center font-family-class">load More</a>
        </div>

    </div>

</div>

@include('partials.signIn')
@include('partials.signUp')
@include('partials.footer')
<div class="location-main-container locationToggle" id="locationModalId">

    <div class="location-container">
        <form action="{{ route('cw-location') }}" method="POST">
            @csrf
            <div class="location-header">
                <h3 class="header-typo"><i class="fa-solid fa-location-dot "></i> <strong> Your location Preference
                    </strong> </h3>

                <span class="sign-close-icon" onclick="closeLocationModal()">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
            <div class="location-main">
                <p class="header-typo">location</p>

                <p class="select-location-par">
                    <select class="js-example-basic-single" style="width: 100%" name="newsDetails">
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->title }} - {{ $chapter->city->city_name }}
                            </option>
                        @endforeach
                    </select>
                </p>

            </div>

            <div class="location-footer">
                <button type="button" onclick="closeLocationModal()" class="btn btn-outline-secondary">Cancel</button>
                <button type="submit" class="btn btn-primary">Save</button>


            </div>
        </form>




    </div>
</div>

@endsection