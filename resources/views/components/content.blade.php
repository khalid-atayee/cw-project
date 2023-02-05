<div class="tw-w-[80%] ">
    <div class="tw-flex tw-flex-col">

        <div class="tw-bg-[#14213D]/90 tw-p-2 tw-text-gray-100 tw-flex tw-justify-between">
            <div>
                
            </div>
            <div class=" tw-flex tw-mr-6 tw-w-[100%]">
                <div class="tw-flex tw-justify-between tw-w-full tw-items-center">
                    <i class="fa fa-bars"></i>
                    <div class="tw-flex tw-justify-center tw-items-center">
                        <a class="btn btn-primary" href="{{ route('cw-home') }}" style="margin-right: 1em" role="button">Want to visit Website</a>
                        <img class="tw-w-[50px] tw-h-[50px] tw-rounded-full" src="{{ asset('images/jamshidHashimi.jpg') }}" alt="" />
                    </div>
                    
                    {{-- <i class="fa-login"></i> --}}
                </div>
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
                <div class="">
                    {{ $slot }}
                </div>
                
            </div>
            
        </div>

    </div>
</div>