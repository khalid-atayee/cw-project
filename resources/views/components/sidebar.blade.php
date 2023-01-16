<div class="tw-w-[15%] tw-top-0 tw-bottom-0 tw-left-0 tw-fixed tw-bg-[#14213D] tw-text-gray-100">
    <div class="">
        <div class="tw-w-[50%] tw-mx-auto tw-shadow-md tw-shadow-indigo-600 tw-m-2 tw-rounded-md tw-border tw-border-indigo-600">
            <img src="{{ asset('images/codeweekend.png') }}" alt="">
        </div>
        <div id="nav-links" class=" tw-flex tw-flex-col tw-bg-blue-500/40 tw-divide-y tw-divide-indigo-900 tw-mt-4  tw-text-xl tw-font-[roboto-bold]">
            <a id="dashboard" class="tw-px-4 tw-py-3 tw-bg-blue-600 tw-flex tw-justify-between tw-items-center" href="{{ route('dashboard') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-home"></i></span>
                    <span>Dashboard</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="chapters" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('chapters.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-book"></i></span>
                    <span>Chapters</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="organizers" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('organizers.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-user"></i></span>
                    <span>Organizers</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="mentors" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-user"></i></span>
                    <span>Mentors</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="sessions" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-phone"></i></span>
                    <span>Sessions</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="assignments" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-circle"></i></span>
                    <span>Assignments</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="cities" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="{{ route('cities.index') }}">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-globe"></i></span>
                    <span>Cities</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="students" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-square"></i></span>
                    <span>Students</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="alumni" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-graduation-cap"></i></span>
                    <span>Alumni</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="feedback" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-commenting"></i></span>
                    <span>Feedback</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="teams" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-users"></i></span>
                    <span>Teams</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
            <a id="news" class="tw-px-4 tw-py-3 hover:tw-text-gray-300 tw-flex tw-justify-between tw-items-center" href="">
                <div class="tw-space-x-2">
                    <span><i class="fa fa-newspaper-o"></i></span>
                    <span>News</span>
                </div>
                <i class="fa fa-angle-left"></i>
            </a>
        </div>
    </div>
</div>

<script>
const navLinks = document.getElementById('nav-links')
// navLinks.addEventListener("click", function(e){
//     alert(e.target.id);
// })

</script>