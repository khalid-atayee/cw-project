<div class="tw-w-[85%] tw-top-0 tw-bottom-0 tw-right-0 tw-fixed">
    <div class="tw-flex tw-flex-col">

        <div class="tw-bg-[#14213D]/90 tw-p-2 tw-text-gray-100 tw-flex tw-justify-between">
            <div>
                <span>|||</span>
            </div>
            <div class="tw-flex tw-mr-6">
                <img class="tw-w-[50px] tw-h-[50px] tw-rounded-full" src="{{ asset('images/jamshidHashimi.jpg') }}" alt="" />
                <i class="fa-login"></i>
            </div>
        </div>

        <div>

            <div>
                {{ $slot }}
            </div>
            
        </div>

    </div>
</div>