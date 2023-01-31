{{-- <div class="tw-w-[15%] tw-top-0 tw-bottom-0 tw-left-0 tw-fixed tw-bg-[#14213D] tw-text-gray-100"> --}}
<div class="tw-w-[20%] tw-top-0 tw-bottom-0 tw-left-0 tw-bg-[#14213D] tw-text-gray-100" style="min-height: 100vh;background-color:#2B3750">
    <div class="">
        <div class="tw-w-[100%] tw-mx-auto tw-shadow-md tw-shadow-indigo-600 " style="background-color: #2B3750;">
            <h1 style="font-size: 2rem; padding:1em .2em">CodeWeekend</h1>
        </div>
        <div id="nav-links" class=" tw-flex tw-flex-col tw-bg-blue-500/40 tw-divide-y tw-divide-indigo-900 tw-mt-4  tw-text-xl tw-font-[roboto-bold]" style="background-color: #2B3750">
            <a id="dashboard" class="tw-px-4 tw-py-3  tw-flex tw-justify-between tw-items-center " href="{{ route('dashboard') }}" >
                <div class="tw-space-x-2">
                    <span><i class="fa fa-home"></i></span>
                    <span>Dashboard</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @role('admin')
            <a id="chapters" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center " href="{{ route('chapters.index') }}" >
                <div class="tw-space-x-2">
                    <span><i class="fa fa-book"></i></span>
                    <span>Chapters</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            
            @endrole
            @role('admin|chapter')
            <a id="organizers" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('organizers.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-user"></i></span>
                    <span>Organizers</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

            @role('admin|organizer|chapter')
            <a id="mentors" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('Mentors.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-user"></i></span>
                    <span>Mentors</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

            @role('admin|organizer|chapter')

            <a id="assignments" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('curriculum.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-circle"></i></span>
                    <span>Curriculum</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

            @role('admin|organizer|mentor|chapter')
            <a id="sessions" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('sessions.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-phone"></i></span>
                    <span>Sessions</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

            @role('admin|mentor|organizer|chapter')
            <a id="assignments" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('assignments.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-circle"></i></span>
                    <span>Assignments</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

          

            @role('admin')
            <a id="cities" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('cities.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-globe"></i></span>
                    <span>Cities</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole
            @role('admin|organizer|mentor|chapter')
            <a id="students" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('students.create') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-square"></i></span>
                    <span>Students</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole

            @role('admin')
            <a id="alumni" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-graduation-cap"></i></span>
                    <span>Alumni</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
    
            <a id="feedback" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('feedbacks') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-commenting"></i></span>
                    <span>Feedback</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="teams" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('team.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-users"></i></span>
                    <span>Teams</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="news" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-circle"></i></span>
                    <span>News</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>

            <a id="news" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('users.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-circle"></i></span>
                    <span>User management</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            @endrole
            {{-- =++++==== --}}
            <!-- Example split danger button -->
          
        </div>
    </div>
</div>

<script>

const navLinks = document.getElementById('nav-links')
// navLinks.addEventListener("click", function(e){
//     alert(e.target.id);
// })

</script>