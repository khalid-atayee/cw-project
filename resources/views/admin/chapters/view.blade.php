<x-layout>
    <x-slot name="title"> Chapter Details</x-slot>
    <x-slot name="header"> Chapter Details</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('chapters.index') }}">All Chapters</a>
    </x-slot>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">

            <span class="fs-4"> Chapter Title: <strong> {{ $chapter->title }} </strong></span>
            </a>
        </header>
        <h3>Organizer</h3>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Organizer Name</th>
                    <th>Organizer Email</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($chapter->organizer))
                    <tr class="chapter-info">

                        <td>{{ $chapter->organizer->name }}</td>
                        <td>{{ $chapter->organizer->email }}</td>
                        <td>{{ $chapter->organizer->description }}</td>
                        <td>
                            <img src="{{ asset('storage/organizerImage/' . $chapter->organizer->image) }}" alt=""
                                style="width: 80px;height:80px">

                        </td>

                    </tr>
                @else
                    <p class="text-muted text-center">Organizer didn't assigned to this chapter yet</p>
                @endif

            </tbody>
        </table>

        <h3>Mentors</h3>
        @if (count($chapter->mentor))
            <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ($chapter->mentor as $mentor)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/mentorImage/' . $mentor->image) }}" class="card-img-top"
                                alt="" style="height: 40vh; object-fit:cover">
                            <div class="card-body">
                                <h5 class="card-title">Name: {{ $mentor->name }}</h5>
                                <h5 class="card-title">Email: {{ $mentor->email }}</h5>

                                <p class="card-text">{{ $mentor->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @else
            <p class="text-muted text-center">This Chapter doesn't have any Mentor to be displayed, please add mentor
                first</p>

        @endif

        <br><br>
        <h3>Template of Curriculum</h3>
        <div class="card-group gap-3">

            {{-- @if (isset($chapter[0]->curriculumTemplate)) --}}
            @foreach ($chapter->curriculumTemplate as $curriculum)
                <div class="card curriculam-cards rounded-2 col-md mx-2">
                    <div class="card-body">
                        <p class="text-center border-bottom p-2"><span> Module Name: <strong>
                                    {{ $curriculum->module_name }}</strong></span> </p>
                        <div class="description-container text-center border-bottom p-2">
                            <p> Module description:</p>
                            <p>
                                {{ $curriculum->description }}

                            </p>

                        </div>
                        <div class="d-flex justify-content-between border-bottom my-2">
                            <p class="">organizer</p>
                            <img src="{{ asset('storage/organizerImage/' . $curriculum->organizers->image) }}"
                                class="image-fluid" alt="" onclick="showUserToggle({{ $curriculum->organizers }},'organizerImage')">
                        </div>
                        <div class="d-flex justify-content-between border-bottom my-2">
                            <p class="">Mentors</p>
                            <div class="mentors-images d-flex">
                            {{-- ====++++++==== --}}
                                @php
                                    $mentor_ids = [];
                                    // foreach ($topic as $key => $mentor) {
                                    $mentor_ids[0] = json_decode($curriculum->mentor_ids, true);
                                    
                                @endphp

                                @foreach ($mentor_ids[0] as $id)
                                    @php
                                        $mentor = App\Models\Mentor::find((int) $id);
                                    @endphp

                                    <img src="{{ asset('storage/mentorImage/' . $mentor->image) }}"
                                        onclick="showUserToggle({{ $mentor }},'mentorImage')"
                                        class="image-fluid  " alt="">
                                @endforeach

                                {{-- ======++++===== --}}



                                {{-- @foreach ($curriculum->organizers->chapters->mentor as $mentor)
                                    <img src="{{ asset('storage/mentorImage/' . $mentor->image) }}" class="image-fluid  "
                                        alt="">
                                @endforeach --}}


                            </div>
                        </div>
                        <p class="card-text">
                        <ul class="list-group">
                            <p class="fw-bold">Topics</p>
                            @foreach ($curriculum->CurriculamTemplateItem as $item)
                                <li class="list-group-item">{{ $item->item_name }}</li>
                            @endforeach

                        </ul>
                        </p>
                    </div>
                </div>
            @endforeach

            {{-- @else
                    <p class="text-muted text-center">Curriculum not created for this chapter yet</p>
                    
                @endif --}}


        </div>




        <footer class="pt-3 mt-4 text-muted border-top">
            All rights reserved © 2023
        </footer>
    </div>

    {{-- modal start here --}}

    <div class="mentor-main-container mentorToggle" id="mentorModalId">

        <div class="mentor-container">
        </div>
    </div>


    {{-- modal end here --}}

</x-layout>
