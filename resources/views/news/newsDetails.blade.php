@extends('index')
@section('content')
@include('partials.header')
<div class="sm:tw-max-w-[80%] sm:tw-mx-auto sm:tw-p-10 tw-border">
    <div class="md:tw-flex">
        <div class="md:tw-w-4/6">
            <!-- post details -->
            <div class="tw-flex tw-flex-col">
                <img src="{{ asset('storage/posts/' . $news->image) }}" class="tw-w-full tw-rounded-md" alt="">
                <h1 class="tw-text-3xl tw-p-3 sm:tw-p-0 lg:tw-text-6xl">{{ $news->title }}</h1>
                <p class="tw-p-6 sm:tw-p-2 tw-text-justify">
                    {{ $news->title }}
                </p>
            </div>
        </div>
        <div class="md:tw-w-2/6 tw-flex tw-mt-5 sm:tw-mt-0 tw-flex-col tw-pl-2">
            <!-- related news -->
            <h1 class="font-[roboto]">Related News</h1>
            <div>
                @foreach ($newses as $news)
                <a class="text-ellipsis  tw-text-gray-800 tw-border tw-rounded-md tw-p-2 tw-block tw-mb-2 hover:tw-border-gray-600 " href="{{ route('newsDetails', $news) }}">{{ $news->title }}</a>    
                @endforeach

            </div>
        </div>
    </div>
    <h1 class="tw-text-3xl tw-py-10 tw-pl-2 sm:tw-pl-0 tw-border-b">Recent Posts</h1>
    
    <div class="md:tw-grid md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-3 tw-space-y-3 sm:tw-space-y-0  tw-mt-10">

        @foreach ($newses as $news)
            <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
                <img class="tw-w-full" src="{{ asset('storage/posts/' . $news->image) }}" alt="">
                <h1 class="tw-text-2xl font-[roboto] tw-p-2">{{ $news->title }}</h1>
                <p class="tw-truncate tw-p-2">{{ $news->title }}</p>
                <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="{{ route('newsDetails', $news) }}">Read More</a>
            </div>
        @endforeach
        {{-- <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
            <img class="tw-w-full" src="{{ asset('images/news_images/office.jpg') }}" alt="">
            <h1 class="tw-text-2xl font-[roboto] tw-p-2">Using responsive utility variants to build adaptive user interfaces.</h1>
            <p class="tw-truncate tw-p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odit cupiditate doloremque itaque. Nesciunt, incidunt dolorum reprehenderit eos sequi deleniti vero doloremque unde modi quibusdam. Nisi atque ex vel corrupti.</p>
            <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="./postDetails.html">Read More</a>
        </div>
        <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
            <img class="tw-w-full" src="{{ asset('images/news_images/office.jpg') }}" alt="">
            <h1 class="tw-text-2xl font-[roboto] tw-p-2">Using responsive utility variants to build adaptive user interfaces.</h1>
            <p class="tw-truncate tw-p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odit cupiditate doloremque itaque. Nesciunt, incidunt dolorum reprehenderit eos sequi deleniti vero doloremque unde modi quibusdam. Nisi atque ex vel corrupti.</p>
            <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="./postDetails.html">Read More</a>
        </div>
        <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
            <img class="tw-w-full" src="{{ asset('images/news_images/office.jpg') }}" alt="">
            <h1 class="tw-text-2xl font-[roboto] tw-p-2">Using responsive utility variants to build adaptive user interfaces.</h1>
            <p class="tw-truncate tw-p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odit cupiditate doloremque itaque. Nesciunt, incidunt dolorum reprehenderit eos sequi deleniti vero doloremque unde modi quibusdam. Nisi atque ex vel corrupti.</p>
            <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="./postDetails.html">Read More</a>
        </div>
        <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
            <img class="tw-w-full" src="{{ asset('images/news_images/office.jpg') }}" alt="">
            <h1 class="tw-text-2xl font-[roboto] tw-p-2">Using responsive utility variants to build adaptive user interfaces.</h1>
            <p class="tw-truncate tw-p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odit cupiditate doloremque itaque. Nesciunt, incidunt dolorum reprehenderit eos sequi deleniti vero doloremque unde modi quibusdam. Nisi atque ex vel corrupti.</p>
            <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="./postDetails.html">Read More</a>
        </div> --}}
       
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