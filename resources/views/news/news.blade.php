@extends('index')
@section('content')
@include('partials.header')

@if (count($newses))
@include('partials.news')

@else
<div style="height:50vh; display:grid; place-items:center;">

    <h3 class="text-center text-muted">No News Posted yet</h3>
</div>
    
@endif



@include('partials.signIn')
@include('partials.footer')
@endsection
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

    
