<x-layout>
    <x-slot name="title">Edit, {{ $news->title }}</x-slot>
    <x-slot name="header">Edit, {{ $news->title }}</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('news.update',$news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Title</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="title" value="{{ $news->title ?? old('title') }}" id="title" placeholder="Post title" />
            </div>
            @error('title')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Description</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description ...">{{ $news->description ?? old('description') }}</textarea>
            </div>
            @error('description')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="photo">Photo</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="photo" value="" id="photo" />
            </div>
            @error('photo')
                <span class="text-red-500 text-xs text-center">{{ $message }}</span>
            @enderror

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>