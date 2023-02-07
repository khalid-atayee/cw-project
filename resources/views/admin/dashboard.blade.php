<x-layout>
    <x-slot name="title">Dashboard</x-slot>
    <x-slot name="header">Codeweekend is the unique platform to innovation</x-slot>
    <x-slot name="button">Join Us</x-slot>
    <div>

        @role('admin')
            <div class="row">
                <div class="col-lg-4  col-6 ">
                    <!-- small box -->
                    <div class="small-box  customContainer">
                        <div class="inner">
                            <h3>{{ $chapter }}</h3>

                            <p>All Chapters</p>
                        </div>

                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4  col-6 ">
                    <!-- small box -->
                    <div class="small-box bg-success customContainer">
                        <div class="inner">
                            <h3>{{ $organizers }}</h3>

                            <p>All Organizers</p>
                        </div>

                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4  col-6  ">
                    <!-- small box -->
                    <div class="small-box bg-warning customContainer">
                        <div class="inner">
                            <h3>{{ $mentors }}</h3>

                            <p>All Mentors</p>
                        </div>

                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-7  col-6  mt-4 " style="margin: auto">
                    <!-- small box -->
                    <div class="small-box bg-danger customContainer">
                        <div style="display: flex;justify-content:space-around;">

                            <div class="inner">
                                <h3>{{ $student_with_payment }}</h3>

                                <p>Students who payed</p>
                            </div>

                            <div class="inner">
                                <h3>{{ $student_with_not_payment }}</h3>

                                <p>Students who not payed</p>
                            </div>
                        </div>


                        <p>Registered Students</p>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>

                </div>



                <!-- ./col -->
            </div>
        @endrole
        @role('admin')
            <div class="row mt-3">
                @foreach ($chapters as $chapter)
                    <div class="col-lg-6  col-6 mt-4 ">
                        <!-- small box -->
                        <div class="small-box bg-warning customContainer">
                            <h5>{{ $chapter->title . ' ' . $chapter->city->city_name }} </h5>
                            <p>Chapter</p>
                            <br>
                            <div style="display: flex;justify-content:space-around">
                                <div class="inner">

                                    @if (isset($chapter->organizer))
                                        <h3>{{ $chapter->organizer()->distinct()->count() }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif

                                    <p>Organizer</p>
                                </div>

                                <div class="inner">
                                    @if (isset($chapter->mentor))
                                        <h3>{{ $chapter->mentor->count() }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif



                                    <p>Mentors</p>
                                </div>


                                <div class="inner">
                                    @if (isset($chapter->students))
                                        <h3>{{ $chapter->students->where('payment', 1)->count() }}</h3>
                                    @else
                                        <h3>0</h3>
                                    @endif

                                    <p>Students</p>
                                </div>

                            </div>


                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                @endforeach

            </div>
        @endrole

        @role('chapter')
            @php
                $chapter = App\Models\Chapter::Where('user_id', Auth::user()->id)->first();
            @endphp

            <div class="row mt-3">

                <div class="col-lg-6  col-6 mt-4 ">
                    <!-- small box -->
                    <div class="small-box bg-warning customContainer">
                        <h5>{{ $chapter->title . ' ' . $chapter->city->city_name }} </h5>
                        <p>Chapter</p>
                        <br>
                        <div style="display: flex;justify-content:space-around">
                            <div class="inner">

                                @if (isset($chapter->organizer))
                                    <h3>{{ $chapter->organizer()->distinct()->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Organizer</p>
                            </div>

                            <div class="inner">
                                @if (isset($chapter->mentor))
                                    <h3>{{ $chapter->mentor->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif



                                <p>Mentors</p>
                            </div>


                            <div class="inner">
                                @if (isset($chapter->students))
                                    <h3>{{ $chapter->students->where('payment', 1)->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Students</p>
                            </div>

                        </div>


                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

            </div>

        @endrole

        @role('organizer')
            @php
                $organizer = App\Models\Organizer::Where('user_id', Auth::user()->id)->first();
            @endphp
            <div class="row mt-3">

                <div class="col-lg-6  col-6 mt-4 ">
                    <!-- small box -->
                    <div class="small-box bg-warning customContainer">
                        <h5>{{ $organizer->chapters->title . ' ' . $organizer->chapters->city->city_name }} </h5>
                        <p>Chapter</p>
                        <br>
                        <div style="display: flex;justify-content:space-around">
                            <div class="inner">

                                @if (isset($organizer))
                                {{-- as we know every chapter has only one organizer  so we assigned it to one --}}
                                    <h3>1</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Organizer</p>
                            </div>

                            <div class="inner">
                                @if (isset($organizer->chapters->mentor))
                                    <h3>{{ $organizer->chapters->mentor->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif



                                <p>Mentors</p>
                            </div>


                            <div class="inner">
                                @if (isset($organizer->chapters->students))
                                    <h3>{{ $organizer->chapters->students->where('payment', 1)->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Students</p>
                            </div>

                        </div>


                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

            </div>



        @endrole


        @role('mentor')
            @php
                $mentor = App\Models\Mentor::Where('user_id', Auth::user()->id)->first();
            @endphp
            <div class="row mt-3">

                <div class="col-lg-6  col-6 mt-4 ">
                    <!-- small box -->
                    <div class="small-box bg-warning customContainer">
                        <h5>{{ $mentor->chapters->title . ' ' . $mentor->chapters->city->city_name }} </h5>
                        <p>Chapter</p>
                        <br>
                        <div style="display: flex;justify-content:space-around">
                            <div class="inner">

                                @if (isset($mentor))
                                {{-- as we know every chapter has only one organizer  so we assigned it to one --}}
                                    <h3>1</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Organizer</p>
                            </div>

                            <div class="inner">
                                @if (isset($mentor->chapters->mentor))
                                    <h3>{{ $mentor->chapters->mentor->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif



                                <p>Mentors</p>
                            </div>


                            <div class="inner">
                                @if (isset($mentor->chapters->students))
                                    <h3>{{ $mentor->chapters->students->where('payment', 1)->count() }}</h3>
                                @else
                                    <h3>0</h3>
                                @endif

                                <p>Students</p>
                            </div>

                        </div>


                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>

            </div>



        @endrole

    </div>
</x-layout>
