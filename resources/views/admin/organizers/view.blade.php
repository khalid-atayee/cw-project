<x-layout>
    <x-slot name="title"> Organizer Details</x-slot>
    <x-slot name="header"> Organizer Details</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('organizers.index') }}">All Organizer</a>
    </x-slot>
    <div class="container py-4">
        <header class="pb-3 mb-4 border-bottom">

            <span class="fs-4"> Chapter Title: <strong> {{ $organizer->chapters->title }} </strong></span>
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
                    <td>{{$organizer->name }}</td>
                    <td>{{$organizer->email }}</td>
                    <td>{{$organizer->description }}</td>
                    <td>
                        <img src="{{ asset('storage/organizerImage/' .$organizer->image) }}" alt=""
                            style="width: 80px;height:80px">

                    </td>
                </tr>

            </tbody>
        </table>

        <h3>Mentors</h3>
        @if (count($organizer->chapters->mentor))
        <div class="row row-cols-1 row-cols-md-3 g-4">

                @foreach ($organizer->chapters->mentor as $mentor)
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
                <h4 class="text-muted">This Organizer doesn't have any Mentor to be displayed, please add mentor first</h4>

            @endif




        <footer class="pt-3 mt-4 text-muted border-top">
            All rights reserved  © 2023
        </footer>
    </div>

</x-layout>
