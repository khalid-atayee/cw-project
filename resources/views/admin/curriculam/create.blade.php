<x-layout>
    <x-slot name="title">Create New Curriculum</x-slot>
    <x-slot name="header">Create New Curriculum</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('curriculum.index') }}">All
            Curriculum</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" id="form-id">
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">Module Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="name" id="mentor_name"
                        placeholder="Module name" />

                    <span class="text-danger error" id="error-name"></span>

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <textarea class="tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
                <span class="text-danger error" id="error-description"></span>
                
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class=" tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id_select"
                        onclick="changeDropDown('{{ route('curriculum.store') }}','chapter_id_select','POST','multiple-select-field','','')">
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
                            
                        @else
                            @foreach ($chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                            @endforeach
                        @endif
                    </select>

                    <span class="text-danger error" id="error-chapter_id"></span>

                </div>
            </div>
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select Mentors</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything"
                        name="mentors[]" multiple>
                        <option disabled selected>Select Chapter</option>


                    </select>
                    <span class="text-danger error" id="error-mentors"></span>

                </div>
            </div>

            <div class="tw-flex tw-w-[100%]">
                <div class="container tw-w-[100%]">
                    <div class="card">
                        <div class="card-header">
                            <h4> please Specify the Topics
                            </h4>
                        </div>

                        <div class="card-body">

                            <div style="display: flex;justify-content:space-between">
                                <button id="close-btn" type="button" class="btn btn-primary float-right">Add</button>
                                <h5>Please click to add button to increment the input fields</h5>

                            </div>
                            {{-- table start --}}
                            <table class="table">

                                <tbody>

                                </tbody>



                            </table>


                            {{-- table end --}}

                        </div>
                    </div>

                </div>





            </div>

            <div class="tw-text-right">
                <button type="button"
                    onclick="postSerializeForm('{{ route('curriculum.serializeForm') }}','POST','form-id')"
                    class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>
        </form>

    </div>
</x-layout>
