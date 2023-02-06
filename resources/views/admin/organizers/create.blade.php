<x-layout>
    <x-slot name="title">Create New Oraganizer</x-slot>
    <x-slot name="header">Create New Oraganizer</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('organizers.index') }}">All Organizers</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('organizers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_name">Organizer Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="name" id="organizer_name" value="{{ old('name') }}" placeholder="Organizer name" />

                    @error('name')
                    <span class="text-danger ">{{ $message }}</span>
                        
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_name">Organizer Email</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input  class="tw-border tw-p-2 tw-rounded-md" type="text" name="email" id="organizer_name" value="{{ old('email') }}" placeholder="Organizer name" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>

            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_name">Organizer Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="password" name="password" value="{{ old('password') }}" id="organizer_name" placeholder="Organizer name" />
                @error('password')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>





            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <textarea class="tw-border tw-p-2 tw-rounded-md" name="description"  id="description"  placeholder="Description" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_name">Linkedin URL</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="url" name="linkedin" value="{{ old('linkedin') }}" id="linkedin" placeholder="Linkedin URL" />
                @error('linkedin')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_image">Organizer Image</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input class=" tw-border tw-p-2 tw-rounded-md" type="file" name="image" id="organizer_image" />
                @error('image')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <select class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id">
                    <option disabled selected>Select Chapter</option>

                    @if (Auth::user()->roles[0]->name=='chapter')

                        <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}</option>
                    @else                        
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                        @endforeach
                    @endif
                </select>
                @error('chapter_id')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-text-right">
                <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>

        </form>
    </div>
</x-layout>
{{-- {{ Auth::user()->roles[0]->name }} --}}