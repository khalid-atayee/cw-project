<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    {{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('tw-elements/dist/css/index.min.css') }}">
    <style>
        @font-face {
            font-family: roboto-bold;
            src: url('{{ asset(' fonts/Roboto-Bold.ttf') }}');
        }

        @font-face {
            font-family: roboto-thin;
            src: url('{{  asset(' fonts/Roboto-Thin.ttf') }}');
        }
    </style>
    <title>{{ $title ?? "Codeweekend" }}</title>
</head>

<body>

    <div class="">
        <x-sidebar />

        <x-content :header="$header" :button="$button">

            {{ $slot }}

        </x-content>

    </div>




    <script src="{{ asset('tw-elements/dist/js/index.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>