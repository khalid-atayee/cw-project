<x-layout>
    <x-slot name="title">Create New Alumni</x-slot>
    <x-slot name="header">Create New Alumni</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('alumnis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="name">Name</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="name" value="{{ old('name') }}" id="name" placeholder="Name..." />
            </div>
            @error('name')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Description</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description ...">{{ old('description') }}</textarea>
            </div>
            @error('description')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="graduation_year">Graduation Year</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="date" name="graduation_year" value="{{ old('graduation_year') }}" id="graduation_year" placeholder="type year" />
            </div>
            @error('graduation_year')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="photo">Photo</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="photo" value="" id="photo" />
            </div>
            @error('photo')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="linkedin">LinkedIn URL</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="linkedin" value="" id="linkedin" placeholder="LinkedIn url here" />
            </div>
            @error('linkedin')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>