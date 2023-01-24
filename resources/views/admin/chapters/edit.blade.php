<x-layout>
    <x-slot name="title">Update Chapter</x-slot>
    <x-slot name="header">Update Chapter</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('chapters.index') }}">All Chapters</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('chapters.update',$chapter) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Chapter title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->title }}" type="text" name="title" id="title" placeholder="Chapter tilte" />
                @error('title')
                    <span class="text-danger ">{{ $message }}</span>
                        
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="city_id">Select City</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <select class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="city_id" id="city_id">
                    <option value="" disabled >please specify</option>
                    @foreach($cities as $city)
                        <option value="{{$city->id}}" {{  $city->id==$chapter->city_id ? 'selected': ''  }}>{{ $city->city_name }}</option>
                    @endforeach
                </select>
                @error('city_id')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="fees">Chapter Fees</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->fees }}" type="number" name="fees" id="fees" placeholder="Chapter fees" />
                @error('fees')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="duration">Chapter duration</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->duration }}" type="number" name="duration" id="duration" placeholder="Chapter duration" />
                @error('duration')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date">Start date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->start_date }}" type="date" name="start_date" id="start_date" />
                @error('start_date')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="end_date">End date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="date" value="{{ $chapter->end_date }}" name="end_date" id="end_date" />
                @error('end_date')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>
            {{-- <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_email">Chapter Email</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->users->email }}" type="text" name="chapter_email" id="chapter_email" placeholder="Chapter email" />
                @error('chapter_email')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Chapter Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->users->password }}" type="password" name="chapter_password" id="title" placeholder="Chapter password" />
                @error('chapter_password')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Chapter Confirm Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ $chapter->users->password }}" type="password" name="confirm_password" id="title" placeholder="Chapter password" />
                @error('confirm_password')
                <span class="text-danger ">{{ $message }}</span>
                    
                @enderror
                
                </div>
            </div> --}}
            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Edit</button>
            </div>


        </form>
    </div>
</x-layout>