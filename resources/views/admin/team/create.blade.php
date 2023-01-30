<x-layout>
    <x-slot name="title">Add New Team member</x-slot>
    <x-slot name="header">Add New Team member</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="name">Name</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="name" id="name" value="{{ old('name') }}" id="title" placeholder="Name please..." />
            </div>
            @error('name')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="major">Major</label>
                <input type="text" class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="major" id="major" placeholder="major ..." />
            </div>
            @error('major')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="role">Role</label>
                <input type="text" class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="role" id="role" placeholder="role ..." />
            </div>
            @error('role')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="short_bio">Short Bio</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="short_bio" id="short_bio" cols="30" rows="10" placeholder="short bio..."></textarea>
            </div>
            @error('short_bio')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="photo">Photo</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="photo" id="photo" />
            </div>
            @error('photo')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>