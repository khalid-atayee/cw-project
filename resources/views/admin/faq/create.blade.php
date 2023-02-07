<x-layout>
    <x-slot name="title">Create New FAQ</x-slot>
    <x-slot name="header">Create New FAQ</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('faq.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Title</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Title..." />
            </div>
            @error('title')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">Description</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" cols="30" rows="10" placeholder="Description ...">{{ old('description') }}</textarea>
            </div>
            @error('description')
                <span class="tw-text-red-500 tw-text-xs tw-text-center">{{ $message }}</span>
            @enderror


            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>