<x-layout>
    <x-slot name="title">Update Mentor</x-slot>
    <x-slot name="header">update Mentor</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('Mentors.index') }}">All mentors</a>
    </x-slot>
 
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('Mentors.update',$mentor->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">mentor Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" value="{{ $mentor->name }}" type="text" name="name" id="mentor_name" placeholder="mentor name" />

                    @error('name')
                    <span class="text-danger ">{{ $message }}</span>
                        
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_email">mentor Email</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input  class="tw-border tw-p-2 tw-rounded-md" type="text" value="{{ $mentor->email }}" name="email" id="mentor_email" placeholder="mentor email" />
                @error('email')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>

            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description" cols="30" rows="10">{{ $mentor->description }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>
            <td class="tw-flex">
                <img src="{{ asset('storage/mentorImage/'.$mentor->image) }}" alt="" style="width: 60px;height:60px">
                
               </td>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_image">mentor Image</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input class=" tw-border tw-p-2 tw-rounded-md" type="file" name="image" id="mentor_image" />
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
                        @isset(Auth::user()->chapter)
                        <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}</option>

                        @endisset 
                            

                    @elseif (Auth::user()->roles[0]->name=='organizer')
                        @isset(Auth::user()->organizer)

                        <option value="{{ Auth::user()->organizer->chapters->id }}">{{ Auth::user()->organizer->chapters->title }}</option>
                            
                        @endisset
                        @else
                    @foreach ($organizers as $organizer)



                        @if ($organizer->chapters)

                        <option value="{{ $organizer->chapters->id }}" {{ $organizer->chapters->id==$mentor->chapter_id ? 'selected' : '' }}>{{ $organizer->chapters->title }}</option>
                            
                        @endif
                    @endforeach
                    @endif
                </select>
                @error('chapter_id')
                <span class="text-danger">{{ $message }}</span>
                
                @enderror
            </div>
        </div>

            <div class="tw-text-right">
                <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Update</button>
            </div>


        </form>
    </div>
</x-layout>