<x-layout>
    <x-slot name="title"> Curriculum Details</x-slot>
    <x-slot name="header"> Curriculum Details</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('curriculum.index') }}">All
            Organizer</a>
    </x-slot>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">

            <span class="fs-4"> Chapter Title: <strong> {{ $curriculumTemplates->organizers->chapters->title }}
                </strong></span>
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
                <tr class="chapter-info">
                    <td>{{ $curriculumTemplates->organizers->name }}</td>
                    <td>{{ $curriculumTemplates->organizers->email }}</td>
                    <td>{{ $curriculumTemplates->organizers->description }}</td>
                    <td>
                        <img src="{{ asset('storage/organizerImage/' . $curriculumTemplates->organizers->image) }}"
                            alt="" style="width: 80px;height:80px">

                    </td>
                </tr>

            </tbody>
        </table>
        <br><br>
        <h3>Curriculum of this Module</h3>
        <div class="card curriculam-cards rounded-2 col-md mx-2">
            <div class="card-body">
                <p class="text-center border-bottom p-2"><span> Module Name: <strong>
                            {{ $curriculumTemplates->module_name }}</span> </p>

                <div class="description-container text-center border-bottom p-2">
                    <p> Module description:</p>
                    <p>
                        {{ $curriculumTemplates->description }}
    
                    </p>

                </div>


                <div class="d-flex justify-content-between border-bottom my-2">
                    <p class="">organizer</p>
                    <img src="{{ asset('storage/organizerImage/' . $curriculumTemplates->organizers->image) }}"
                        onclick="showUserToggle({{ $curriculumTemplates->organizers }},'organizerImage')"
                        class="image-fluid" alt="">
                </div>
                <div class="d-flex justify-content-between border-bottom my-2">
                    <p class="">Mentors</p>
                    <div class="mentors-images d-flex">
                        @foreach ($curriculumTemplates->organizers->chapters->mentor as $mentor)
                            <img src="{{ asset('storage/mentorImage/' . $mentor->image) }}"
                                onclick="showUserToggle({{ $mentor }},'mentorImage')" class="image-fluid  "
                                alt="">
                        @endforeach


                    </div>
                </div>
                <p class="card-text">
                <ul class="list-group">
                    <p class="fw-bold">Topics</p>
                    @foreach ($curriculumTemplates->CurriculamTemplateItem as $item)
                        <li class="list-group-item">{{ $item->item_name }}</li>
                    @endforeach

                </ul>
                </p>
            </div>
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
