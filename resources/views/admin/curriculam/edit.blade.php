<x-layout>
    <x-slot name="title">Update Curriculum</x-slot>
    <x-slot name="header">Update Curriculum</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('curriculum.index') }}">All
            Curriculum</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow"
            action="{{ route('curriculum.update', $curriculumTemplateItem[0]->CurriculamTemplate->id) }}" method="POST"
            id="form-id">
            @csrf
            @method('PUT')
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="mentor_name">Module Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text"
                        value="{{ $curriculumTemplateItem[0]->CurriculamTemplate->module_name }}" name="name"
                        id="mentor_name" placeholder="Module name" />
                    @error('name')
                        <span class="text-danger error" id="error-name">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                    <textarea class="tw-border tw-p-2 tw-rounded-md" name="description"  id="description" placeholder="Description"
                        cols="30" rows="10">{{ $curriculumTemplateItem[0]->CurriculamTemplate->description }}</textarea>
                    @error('description')
                        <span class="text-danger error" id="error-name">{{ $message }}</span>
                    @enderror
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
                                    <option value="{{ Auth::user()->chapter->id }}">{{ Auth::user()->chapter->title }}
                                    </option>
                                @endisset
                            @elseif (Auth::user()->roles[0]->name == 'organizer')
                                @isset(Auth::user()->organizer)
                                    <option value="{{ Auth::user()->organizer->chapters->id }}">
                                        {{ Auth::user()->organizer->chapters->title }}</option>
                                @endisset
                            @else
                                @foreach ($chapters as $key => $chapter)
                                    <option value="{{ $chapters[$key]->id }}"
                                        {{ $chapters[$key]->id == $curriculumTemplateItem[$key]->CurriculamTemplate->chapter_id ? 'selected' : '' }}>
                                        {{ $chapters[$key]->title }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('chapter_id')
                            <span class="text-danger error" id="error-chapter_id">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="tw-flex">
                    <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select Mentors</label>
                    <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                        <select class="form-select" id="multiple-select-field" data-placeholder="Choose anything"
                            name="mentors[]" multiple>

                            @foreach ($mentors as $key => $mentor)
                           
                                @if (count($ids)-1>=$key)
                                    <option value="{{ $mentors[$key]->id }}"
                                        {{ $mentors[$key]->id == $ids[$key] ? 'selected' : '' }}> {{ $mentors[$key]->name }}</option>
                                @else
                                    <option value="{{ $mentors[$key]->id }}">{{ $mentors[$key]->name }}</option>
                                @endif
                            @endforeach


                        </select>
                        @error('mentors')
                            <span class="text-danger error" id="error-mentors">{{ $message }}</span>
                        @enderror

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
                                    <button id="close-btn" type="button"
                                        class="btn btn-primary float-right">Add</button>
                                    <h5>Please click to add button to increment the input fields</h5>

                                </div>
                                {{-- table start --}}
                                <table class="table">

                                    <tbody>
                                        @foreach ($curriculumTemplateItem as $item)
                                            <tr>

                                                <td colspan="2"><input class="form-control"
                                                        value="{{ $item->item_name }}" type="text" name="topic[]"
                                                        id="topic">
                                                    <div class="error  error-topic text-danger">
                                                </td>
                                                <td colspan="2"><button class="btn btn-danger" style="margin:5px"
                                                        id="removeBtn"><i style="font-size: 20px;"
                                                            class="btn-close btn-close-white glyphicon glyphicon-remove">
                                                        </i></button></td>


                                            </tr>
                                        @endforeach




                                    </tbody>



                                </table>


                                {{-- table end --}}

                            </div>
                        </div>

                    </div>





                </div>

                <div class="tw-text-right">
                    <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Update</button>
                </div>
        </form>

    </div>
</x-layout>
