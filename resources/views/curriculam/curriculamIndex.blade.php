@extends('index')
@section('content')
@include('partials.header')
@include('partials.curriculamItem')
@include('partials.footer')
{{-- modal start here --}}

<div class="mentor-main-container mentorToggle" id="mentorModalId">

    <div class="mentor-container">
    </div>
</div>


{{-- modal end here --}}
    
@endsection