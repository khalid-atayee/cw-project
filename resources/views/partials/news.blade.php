<div>
    <div class="sm:tw-flex sm:tw-flex-col sm:tw-max-w-[80%] sm:tw-mx-auto sm:tw-p-10">
        <div class="tw-flex tw-flex-col tw-border tw-rounded-md tw-overflow-hidden tw-shadow">
            <div>
                <img src="{{ asset('storage/posts/'. $firstNews->image) }}" alt="" class="tw-w-full">
            </div>
            <div class="tw-p-3">
                <h1 style="font-family: roboto,'Times New Roman', Times, serif;" class="tw-text-5xl tw-uppercase tw-text-center tw-text-red-400">{{ $firstNews->title }}</h1>
            </div>
            <div>
                <p class="tw-text-center tw-px-10 tw-py-3">
                    {{ $firstNews->description }}
                </p>
            </div>

        </div>
        
        <!-- recent posts -->
        <div class="tw-p-10 tw-border tw-mt-10 tw-rounded-md tw-shadow">
            <h1 class="tw-border-b-2 tw-font-bold tw-text-xl">
                Recents
            </h1>
            <div class="tw-flex tw-flex-col tw-p-2">
                @foreach ($newses as $news)
                <a class="tw-underline" href="">{{ $news->title }}</a>
                @endforeach
               
            </div>

        </div>
        <!-- more posts -->
        <div class="md:tw-grid md:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-3  tw-mt-10">
            @foreach ($newses as $news)
                <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
                    <img class="tw-w-full" src="{{ asset('storage/posts/' . $news->image) }}" alt="">
                    <h1 class="tw-text-2xl font-[roboto] tw-p-2">{{ $news->title }}</h1>
                    <p class="tw-truncate tw-p-2">{{ $news->description }}</p>
                    <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="{{ route('newsDetails',$news) }}">Read More</a>
                </div>
            @endforeach
{{-- 
            <div class="tw-flex tw-flex-col sm:tw-max-w-md tw-rounded-md tw-overflow-hidden tw-border">
                <img class="tw-w-full" src="{{ asset('images/news_images/office.jpg') }}" alt="">
                <h1 class="tw-text-2xl font-[roboto] tw-p-2">Using responsive utility variants to build adaptive user interfaces.</h1>
                <p class="tw-truncate tw-p-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque odit cupiditate doloremque itaque. Nesciunt, incidunt dolorum reprehenderit eos sequi deleniti vero doloremque unde modi quibusdam. Nisi atque ex vel corrupti.</p>
                <a class="tw-px-5 tw-py-3 tw-bg-[#111B31] tw-text-[#FFFFFF] tw-text-center tw-text-xl tw-mx-10 tw-my-2 tw-rounded-md" href="{{ route('newsDetails') }}">Read More</a>
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
</div>