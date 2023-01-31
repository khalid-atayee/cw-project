<x-layout>
    <x-slot name="title">Create New Post</x-slot>
    <x-slot name="header">Create New Post</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Title</label>
                <div class="d-flex flex-column w-100">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Post title" />
                @error('title')
                    <span class="tw-text-red-500 tw-text-xs tw-text-left">{{ $message }}</span>
                @enderror
                </div>
            </div>
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Description</label>
                <div class="d-flex flex-column w-100">
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description ...">{{ old('description') }}</textarea>
                @error('description')
                    <span class="tw-text-red-500 tw-text-xs tw-text-left">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="photo">Photo</label>
                <div class="d-flex flex-column w-100">
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="photo" value="" id="photo" />
                @error('photo')
                    <span class="tw-text-red-500 tw-text-xs tw-text-left">{{ $message }}</span>
                @enderror
                </div>
            </div>

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>