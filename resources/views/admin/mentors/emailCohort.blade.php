<x-layout>
    <x-slot name="title">Send email to cohort</x-slot>
    <x-slot name="header">Send Email to cohort</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('Mentors.index') }}">All mentors</a>
    </x-slot>
    
    @if (Session::has('email-message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          
            {{ Session::get('email-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
 
    @endif

    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow"
            action="{{ route('mentor.sendMail') }}" method="POST" id="payment-form" >
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">Email Title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="email_title"
                        id="email_description" placeholder="Email Title" />

                    @error('email_title')
                        <span class="text-danger ">{{ $message }}</span>
                    @enderror
                </div>
            </div>






            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Email Description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <textarea class="tw-border tw-p-2 tw-rounded-md" name="email_description" id="email_description"
                        placeholder="Email Description" cols="30" rows="10"></textarea>
                    @error('email_description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id">
                        <option disabled selected>Select Chapter</option>

                        {{-- @if (Auth::user()->roles[0]->name == 'chapter') --}}

                        {{-- <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}</option>
                            @else   

                            
                            
                            
                            --}}
                        @if (Auth::user()->roles[0]->name == 'chapter')
                            @isset(Auth::user()->chapter)
                                <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}</option>
                            @endisset
                        @elseif (Auth::user()->roles[0]->name == 'organizer')
                            @isset(Auth::user()->organizer)
                                <option value="{{ Auth::user()->organizer->chapters->id }}">
                                    {{ Auth::user()->organizer->chapters->title }}</option>
                            @endisset
                        @else
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                            @endforeach
                        @endif








                        {{-- @endif --}}
                    </select>
                    @error('chapter_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="tw-text-right">
                <button type="submit" onclick="checkValidation()" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2 payment-gateway-btn"><i class="fa fa-spinner fa-spin louder show-loader email-louder"></i> Send</button>
            </div>

    </div>


    </form>
    </div>
    <style>
        .email-louder{
            display: none;
        }
        .visibility-email{
            pointer-events: none;
            cursor: not-allowed;
            opacity: .65;

        }

    </style>


    <script>
        function checkValidation(){
            // $(".payment-gateway-btn"). attr("disabled", true);
            
            $('.payment-gateway-btn').prop('disabled', false);
            $('.payment-gateway-btn').addClass('visibility-email')
            $('.louder').removeClass('email-louder')
            
            $('.louder').addClass('show-loader');
        }
     
    </script>


</x-layout>
