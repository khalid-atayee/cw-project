<x-layout>
    <x-slot name="title">{{ $alumni->name }}</x-slot>
    <x-slot name="header">Edit, {{ $alumni->name }}</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('alumnis.update', $alumni) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="name">Name</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="name" value="{{ $alumni->name ?? old('name') }}" id="name" placeholder="Name..." />
            </div>
            @error('name')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Description</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description ...">{{ $alumni->description ?? old('description') }}</textarea>
            </div>
            @error('description')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="graduation_year">Graduation Year</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="date" name="graduation_year" value="{{ $alumni->graduation_year ?? old('graduation_year') }}" id="graduation_year" placeholder="type year" />
            </div>
            @error('graduation_year')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="photo">Photo</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="photo" value="" id="photo" />
            </div>
            @error('photo')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="linkedin">LinkedIn URL</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="linkedin" value="{{ $alumni->linkedin }}" id="linkedin" placeholder="LinkedIn url here" />
            </div>
            @error('linkedin')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Update</button>
            </div>


        </form>
    </div>
</x-layout>