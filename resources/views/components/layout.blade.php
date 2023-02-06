<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    {{-- <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />



    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('tw-elements/dist/css/index.min.css') }}">

    <style>
        @font-face{
            font-family: roboto-bold;
            src: url('{{ asset('fonts/Roboto-Bold.ttf') }}');
        }

        /* @font-face {
            font-family: roboto-thin;

            src: url('{{ asset('fonts/Roboto-Thin.ttf') }}');
        } */

        a {
            text-decoration: none;
            color: #b8bbbfd8;
        }
        .chapter-info>td {
            height: 100px;
            vertical-align: middle;
        }

        .curriculam-cards img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin: -5px;
            padding: 0;
        }

        .curriculam-cards {
            min-width: 17rem;
            border: 0;
            box-shadow: 0 0 3px rgba(0, 0, 0, 0.3);
        }

        .apply-now-card {
            border: none;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        @media (max-width: 500px) {
            .container {
                text-align: center;
            }
        }

        .mentor-main-container {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .6);
            display: grid;
            place-items: center;


        }

        .mentor-container {

            display: flex;
            flex-direction: column;
            /* gap: .9em; */
            border-radius: 15px;
            padding: .5em 1em;
            background-color: white;
            max-width: 100%;
            width: 350px;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: .3em;
        }
        .mentor-container>img{
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: auto;
        }

        .mentorToggle{
            display: none;
        }
        .sign-close-icon{
            display: block;
            text-align: right;
            color: red;
            font-size: 1rem;
            cursor: pointer;

        }
        .image-fluid{
            cursor: pointer;
        }
        .customContainer{
            padding: 2em;
            text-align: center;

          

        }
        .small-box{
            background-color: #14213d !important;
            opacity: 1.8;
            color: rgba(255, 255, 255, 0.825);
            border-radius:10px;
            
        }
    </style>
    <title>{{ $title ?? 'Codeweekend' }}</title>
</head>
<body>

    <div style="display: flex">
        <x-sidebar />

        <x-content :header="$header" :button="$button">
            @if (Session::has('success-message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong>
                {{ Session::get('success-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (Session::has('fail-message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error! </strong>
                {{ Session::get('success-message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif


            {{ $slot }}

        </x-content>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('admin.coreJsAdmin.customJsAdmin')

    <script src="{{ asset('tw-elements/dist/js/index.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>

