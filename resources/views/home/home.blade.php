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
    @endsection
