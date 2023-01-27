<x-layout>
    <x-slot name="title">Update session</x-slot>
    <x-slot name="header">Update session</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('sessions.index') }}">All session</a>
    </x-slot>
    <div>
        <form method="POST" class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" id="form-id" action="{{ route('sessions.update',$session->id) }}" >
            @method('put')
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">Session Title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" value="{{ $session->title }}" type="text" name="title" id="title"
                        placeholder="Session Title" />

                        @error('title')
                            
                        <span class="text-danger error" id="error-title">{{ $message }}</span>
                        @enderror


                </div>
            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description"
                        cols="30" rows="10">{{ $session->description }}</textarea>
                        @error('description')
                            
                        <span class="text-danger" id="error-description">{{ $message }}</span>
                        @enderror


                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date1">Start date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="datetime-local" name="start_date"
                        id="start_date" value="{{ $session->start_date}}" placeholder="Start Date" />
                    @error('start_date')
                        
                    <span class="text-danger error" id="error-start_date">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date1">End date</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="datetime-local" value="{{ $session->end_date }}" name="end_date" id="end_date"
                        placeholder="End Date" />

                        @error('end_date')
                            
                        <span class="text-danger error" id="error-end_date">{{ $message }}</span>
                        @enderror

                </div>
            </div>




            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select
                        onclick="changeDropDown('{{ route('sessions.store') }}','chapter_id_select','POST','mentors_select','curriculam', '')"
                        class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id_select">
                        <option disabled selected>Select Chapter</option>


                        @if (Auth::user()->roles[0]->name == 'chapter')
                            @isset(Auth::user()->chapter)
                                <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}</option>
                            @endisset
                        @elseif (Auth::user()->roles[0]->name == 'organizer')
                            @isset(Auth::user()->organizer)
                                <option value="{{ Auth::user()->organizer->chapters->id }}">
                                    {{ Auth::user()->organizer->chapters->title }}</option>
                            @endisset
                        @elseif (Auth::user()->roles[0]->name == 'mentor')
                            @isset(Auth::user()->mentor)
                                <option value="{{ Auth::user()->mentor->chapters->id }}">
                                    {{ Auth::user()->mentor->chapters->title }}</option>
                            @endisset
                        @else
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}" {{ $chapter->id==$session->chapter_id ? 'selected' :'' }}>
                                    {{ $chapter->title }}
                                </option>
                            @endforeach
                        @endif
                    </select>

                    @error('chapter_id')
                        
                    <span class="text-danger error" id="error-chapter_id">{{ $message }}</span>
                    @enderror

                </div>
            </div>
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentors">Select Mentor</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="mentors_select" data-placeholder="Choose anything" name="mentor_id">
                        <option disabled selected>please specify</option>
                        @foreach ($mentors as $mentor)

                        <option value="{{ $mentor->id }}" {{ $mentor->id==$session->mentor_id ? 'selected' : '' }}>
                            {{ $mentor->name }}
                        </option>
                            
                        @endforeach


                    </select>
                    @error('mentor_id')
                        
                    <span class="text-danger error" id="error-mentor_id">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum1">Select Curriculum</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="curriculam" data-placeholder="Choose anything"
                        name="curriculam_template_id"
                        onclick="changeDropDown('{{ route('sessions.item') }}','curriculam','POST','curriculam_template_item','','')">
                        <option disabled selected>please specify</option>
                        @foreach ($curriculums as $curriculum)
                        <option value="{{ $curriculum->id }}" {{ $curriculum->id ==$session->curriculam_template_id ? 'selected' : ''}}>
                            {{ $curriculum->module_name }}
                        </option>
                            
                        @endforeach

                    </select>
                    @error('curriculam_template_id')
                        
                    <span class="text-danger error" id="error-curriculam_template_id">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Curriculum Topic</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="curriculam_template_item" data-placeholder="Choose anything"
                        name="curriculam_template_item_id">
                        <option disabled selected>please specify</option>
                        @foreach ($curriculum_items as $curriculum_item)
                            <option value="{{ $curriculum_item->id }}" {{ $curriculum_item->id == $session->curriculam_template_item_id ? 'selected' : '' }}>
                                {{ $curriculum_item->item_name }}
                            </option>
                            
                        @endforeach

                    </select>
                    @error('curriculam_template_item_id')
                        
                    <span class= "text-danger error" id="error-curriculam_template_item_id">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="tw-text-right">
                <button type="submit" 
                    class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Update</button>
            </div>
        </form>

    </div>
</x-layout>

