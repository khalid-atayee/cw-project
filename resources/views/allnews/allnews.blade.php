@extends('index')
@section('content')
@include('partials.header')

<div class="container">
<div class="text-header-title m-5">

    <h2 class="text-center font-family-class mission-typo">All News</h2>
</div>
    <div class="cards-group news-cards-group d-flex flex-wrap justify-content-around text-center">
        @foreach ($newses as $news)
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
        @endforeach
        
    
    </div>
</div>


@include('partials.footer')
<div class="location-main-container locationToggle" id="locationModalId" style="z-index: 4">

    <div class="location-container">
        <form action="">
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
                    <select class="js-example-basic-single" style="width: 100%" name="home">
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

