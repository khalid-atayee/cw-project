<div class="container mx-auto">
    <header class="curriculam-hero text-center my-2">

        <h1 class="mission-typo">
            What will you learn?
        </h1>
        <p class="some-paragraph-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati ipsum,
            similique, sint ad dignissimos
            ratione esse atque facilis dicta quis tenetur ipsam at aliquid quod vitae vel magni reiciendis aut.</p>
    </header>

    <div class=" curriculam-cards-page">

        @foreach ($data->curriculumTemplate as $topic)
            <div class="card curriculam-cards rounded-2 col-md  mx-2">
                <div class="card-body">
                    <p class="text-center border-bottom p-2">Module 1:<span class="fw-bold ">
                            {{ $topic->module_name }}</span> </p>
                    <div class="d-flex justify-content-between border-bottom my-2">
                        <p class="">organizer</p>
                        <img src="{{ asset('storage/organizerImage/' . $topic->organizers->image) }}"
                            class="image-fluid  " onclick="showUserToggle({{ $topic->organizers }},'organizerImage')" alt="">
                    </div>
                    <div class="d-flex justify-content-between border-bottom my-2">
                        <p class="">Mentors</p>
                        <div class="mentors-images d-flex">
                            @php
                                $mentor_ids = [];
                                // foreach ($topic as $key => $mentor) {
                                    $mentor_ids[0] = json_decode($topic->mentor_ids, true);
                                
                                @endphp
                                    
                                    @foreach ($mentor_ids[0] as $id)
                                    @php
                                        $mentor = App\Models\Mentor::find((int)$id);
                                    @endphp
                                  
                                    <img src="{{ asset('storage/mentorImage/' . $mentor->image) }}"
                                        onclick="showUserToggle({{ $mentor }},'mentorImage')" class="image-fluid  "
                                        alt=""> 
                                   @endforeach
                          
                        </div>
                    </div>
                    <p class="card-text">
                    <ul class="list-group curriculam-list">
                        <p class="fw-bold">The Title Here</p>

                        @foreach ($topic->CurriculamTemplateItem as $key => $item)
                            <li class="list-group-item">{{ $item->item_name }}</li>
                        @endforeach
                    </ul>
                    </p>
                </div>
            </div>
        @endforeach

    </div>





</div>
<div class="container-fluid footer-curriculam-container" style="background-color:#14213D;  ">
    <div class="container card my-4 apply-now-card " style="background: transparent; color: white;">

        <div class="card-body">
            <h5 class="mission-typo">Codeweekend Coding Bootcamp</h5>
            <p class="some-paragraph-title">Learn from A to Z of the web development including but not limited to the
                full
                stack web developemnt</p>
            <br><br>
            <div class="curriculam-page-btn">

                <a href="{{ Auth::user() ? route('payment.index') : route('students.index') }}" class="cw-btn">Apply
                    Now</a>
            </div>
            <br>
        </div>
    </div>
</div>
