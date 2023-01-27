<x-layout>
    <x-slot name="title">Update assignment</x-slot>
    <x-slot name="header">Update assignment</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('assignments.index') }}">All
            assignment</a>
    </x-slot>
    <div>
        <form method="POST" action="{{ route('assignments.update',$assignment->id) }}" class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" id="form-id">
            @csrf
            @method('PUT')
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">assignment Title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" value="{{ $assignment->title }}" type="text" name="title" id="title"
                        placeholder="assignment Title" />
                    @error('title')
                        
                    <span class="text-danger error" id="error-title">{{ $message }}</span>
                    @enderror

                </div>
            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description"
                        cols="30" rows="10">{{ $assignment->description }}</textarea>

                        @error('description')
                            
                        <span class="text-danger" id="error-description">{{ $message }}</span>
                        @enderror


                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">assignment url</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <input class=" tw-border tw-p-2 tw-rounded-md" value="{{ $assignment->url }}" type="text" name="url" id="url"
                        placeholder="assignment Url" />
                        @error('url')
                            
                        <span class="text-danger" id="error-url">{{ $message }}</span>
                        @enderror


                </div>
            </div>





            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select
                        onclick="changeDropDown('{{ route('assignments.store') }}','chapter_id_select','POST','student_select','session_id','mentor_id')"
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
                                <option value="{{ $chapter->id }}" {{ $chapter->id== $assignment->chapter_id ? 'selected' : '' }}>
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
                <label class="tw-w-[20%] tw-p-2" for="mentors">Select Student</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="student_select" data-placeholder="Choose anything"
                        name="student_id">
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ $student->id == $assignment->student_id ? 'selected' : '' }}>
                            {{ $student->fname.' '.$student->lname }}
                        </option>
                            
                        @endforeach

                    </select>

                    @error('student_id')
                        
                    <span class="text-danger error" id="error-student_id">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum1">Select session</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="session_id" data-placeholder="Choose anything" name="session_id">
                        <option disabled selected>please specify</option>
                        @foreach ($sessions as $session)
                        <option value="{{ $session->id }}" {{ $session->id == $assignment->session_id ? 'selected' : '' }}>
                            {{ $session->title }}</option>
                            
                        @endforeach


                    </select>
                    @error('session_id')
                        
                    <span class="text-danger error" id="error-session_id">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Mentor</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="mentor_id" data-placeholder="Choose anything" name="mentor_id">
                        <option disabled selected>please specify</option>
                        @foreach ($mentors as $mentor)
                        <option value="{{ $mentor->id }}" {{ $mentor->id == $assignment->mentor_id ? 'selected' : '' }}>
                            {{ $mentor->name }}</option>
                            
                        @endforeach


                    </select>
                    @error('mentor_id')
                        
                    <span class="text-danger error" id="error-mentor_id">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Grade</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="curriculam_template_item" data-placeholder="Choose anything"
                        name="grade_id">
                        <option disabled selected>please specify</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}" {{ $grade->id==$assignment->grade_id ? 'selected' : '' }}>
                                {{ $grade->grade_title }}</option>
                        @endforeach

                    </select>
                    @error('grade_id')
                        
                    <span class="text-danger error" id="error-grade_id">{{ $message }}</span>
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
