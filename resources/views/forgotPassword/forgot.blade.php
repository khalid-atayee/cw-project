@extends('index')

  

@section('content')

@include('partials.header')
<div class="resetPasswordForm">
    
    @include('partials.forgotPassword')
    <div class="forgot-otp-input-view">
    
    </div>
</div>

@include('partials.footer')
@include('partials.signIn')
@include('partials.location')


@endsection
