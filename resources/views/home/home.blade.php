@extends('index')
@section('content')
    @include('partials.header')




    @if (Session::has('success-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Well done {{ Auth::user()->name }}</strong>
            {{ Session::get('success-message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif @if (Session::has('fail-message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error! {{ Auth::user()->name }}</strong>
                {{ Session::get('success-message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif



        @include('partials.needIntern')
        @include('partials.homePageHero')
        @include('partials.whatWeDo')
        @include('partials.founderMessage')
        @include('partials.whatMakeUsDifferent')
        @include('partials.cardVission')
        @include('partials.slider')
        @include('partials.meetOurTeam')
        @include('partials.codingBootcampLocation')
        @include('partials.faq')
        @include('partials.getInTouch')
        @include('partials.signIn')
        {{-- @include('partials.signUp') --}}
        @include('partials.partners')
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
