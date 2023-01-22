<x-layout>
    <x-slot name="title">Create New assignment</x-slot>
    <x-slot name="header">Create New assignment</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('assignments.index') }}">All
            assignment</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" id="form-id">
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">assignment Title</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="title" id="title"
                        placeholder="assignment Title" />

                    <span class="text-danger error" id="error-title"></span>

                </div>
            </div>


            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description"
                        cols="30" rows="10"></textarea>
                    <span class="text-danger" id="error-description"></span>


                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">assignment url</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="url" id="url"
                        placeholder="assignment Url" />
                    <span class="text-danger" id="error-url"></span>


                </div>
            </div>





            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select
                        onchange="changeDropDown('{{ route('assignments.store') }}','chapter_id_select','POST','student_select','session_id','mentor_id')"
                        class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id_select">
                        <option disabled selected>Select Chapter</option>
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                        @endforeach
                    </select>

                    <span class="text-danger error" id="error-chapter_id"></span>

                </div>
            </div>
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentors">Select Student</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="student_select" data-placeholder="Choose anything"
                        name="student_id">

                    </select>
                    <span class="text-danger error" id="error-student_id"></span>

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum1">Select session</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="session_id" data-placeholder="Choose anything" name="session_id">

                    </select>
                    <span class="text-danger error" id="error-session_id"></span>
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Mentor</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="mentor_id" data-placeholder="Choose anything"
                        name="mentor_id">

                    </select>
                    <span class="text-danger error" id="error-mentor_id"></span>
                </div>
            </div>


                <div class="tw-flex">
                    <label class="tw-w-[20%] tw-p-2" for="curriculum_topic">Select Grade</label>
                    <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                        <select class="form-select" id="curriculam_template_item" data-placeholder="Choose anything"
                            name="grade_id">
                            <option disabled selected>please specify</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->grade_title }}</option>
                            @endforeach

                        </select>
                        <span class="text-danger error" id="error-grade_id"></span>
                    </div>
                </div>










                <div class="tw-text-right">
                    <button type="button" onclick="postSerializeForm('{{ route('assignments.submit') }}','POST','form-id')"
                        class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
                </div>
        </form>

    </div>
</x-layout>
