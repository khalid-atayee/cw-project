<x-layout>
    <x-slot name="title">Send email to cohort</x-slot>
    <x-slot name="header">Send Email to cohort</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('Mentors.index') }}">All mentors</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow"
            action="{{ route('mentor.sendMail') }}" method="POST" >
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
                            @else                         --}}
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                        @endforeach
                        {{-- @endif --}}
                    </select>
                    @error('chapter_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
                <div class="tw-text-right">
                    <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Send</button>
                </div>

    </div>


    </form>
    </div>
</x-layout>
