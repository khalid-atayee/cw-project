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
        @font-face{
            font-family: roboto-bold;
            src: url('{{ asset('fonts/Roboto-Bold.ttf') }}');
        }
        @font-face{
            font-family: roboto-thin;
            src: url('{{  asset('fonts/Roboto-Thin.ttf') }}');
        }
    </style>
    <title>{{ $title ?? "Codeweekend" }}</title>
</head>
<body>

    {{-- side bar or nav links --}}
    <div class="tw-w-[15%] tw-top-0 tw-bottom-0 tw-left-0 tw-fixed tw-bg-[#14213D] tw-text-gray-100">
        <div class="tw-sticky tw-top-1">
            <div class="tw-w-[50%] tw-mx-auto tw-shadow-md tw-shadow-indigo-600 tw-m-2 tw-rounded-md tw-border tw-border-indigo-600">
                <img src="{{ asset('images/codeweekend.png') }}" alt="">
            </div>
            <div id="nav-links" class=" tw-flex tw-flex-col tw-bg-blue-500/40 tw-divide-y tw-divide-indigo-900 tw-mt-4 tw-font-[roboto-bold] tw-sticky tw-top-1">
                <a id="dashboard" class="tw-px-4 tw-py-3 tw-bg-blue-600 tw-flex tw-justify-between tw-items-center" href="{{ route('dashboard') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-home"></i></span>
                        <span>Dashboard</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                
                <a id="chapters" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('chapters.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-book"></i></span>
                        <span>Chapters</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="organizers" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('organizers.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-user"></i></span>
                        <span>Organizers</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="mentors" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-user"></i></span>
                        <span>Curriculam Modules</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="mentors" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-user"></i></span>
                        <span>Mentors</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="sessions" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-phone"></i></span>
                        <span>Sessions</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="assignments" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-circle"></i></span>
                        <span>Assignments</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="cities" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('cities.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-globe"></i></span>
                        <span>Cities</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="students" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-square"></i></span>
                        <span>Students</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="alumni" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('alumnis.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-graduation-cap"></i></span>
                        <span>Alumni</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="feedback" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('feedbacks') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-commenting"></i></span>
                        <span>Feedback</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="teams" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('team.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-users"></i></span>
                        <span>Teams</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
                <a id="news" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('news.index') }}">
                    <div class="tw-space-x-2">
                        <span><i class="fa fa-newspaper-o"></i></span>
                        <span>News</span>
                    </div>
                    <i class="fa fa-angle-left"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- content section --}}
    <div class="tw-relative tw-overflow-scroll">
        <div class="tw-w-[85%] tw-top-0 tw-bottom-0 tw-right-0 tw-fixed tw-overflow-y-auto">
            <div class="tw-flex tw-flex-col">
        
                <div class="tw-bg-[#14213D]/90 tw-p-2 tw-text-gray-100 tw-flex tw-items-center tw-justify-between">
                    <div>
                        <i class="fa fa-bars"></i>
                    </div>
                    <div class="tw-flex tw-mr-6 tw-sticky tw-top-0">
                        <img class="tw-w-[50px] tw-h-[50px] tw-rounded-full" src="{{ asset('images/jamshidHashimi.jpg') }}" alt="" />
                        <i class="fa-login"></i>
                    </div>
                </div>
        
                <div>
        
                    <div class="tw-p-3 tw-flex tw-flex-col tw-space-y-2">
                        <div class="tw-flex tw-justify-between tw-bg-border tw-p-3 tw-border-b-2 tw-font-[roboto-bold]">
                            <h1 class="tw-text-xl">{{ $header ?? "Codeweekend" }}</h1>
                            <div class="">
                                {{ $button ?? "Action btn" }}
                            </div>
                        </div>
                        {{-- main page content here change data depend on page. --}}
                        <div class="tw-overflow-y-scroll">
                            {{ $slot }}
                        </div>
                        
                    </div>
                    
                </div>
        
            </div>
        </div>
    </div>
   
  
    <script src="{{ asset('tw-elements/dist/js/index.min.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>