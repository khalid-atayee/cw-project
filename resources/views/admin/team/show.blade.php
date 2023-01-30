<x-layout>
    <x-slot name="title">{{ $team->name }}</x-slot>
    <x-slot name="header">{{ $team->name }}</x-slot>
    <x-slot name="button">
        <x-back />
    </x-slot>
    <div>
        <div class="tw-flex tw-flex-col tw-space-y-3 tw-ml-3 tw-overflow-y-scroll">
            <h1 class="tw-text-2xl">{{ $team->name }}</h1>
            <ul class="tw-list-disc tw-pl-4 tw-space-y-2">
                <li>{{ $team->major }}</li>
                <li>{{ $team->role }}</li>
                <li>{{ $team->short_bio }}</li>
                <li>{{ $team->created_at }}</li>
                
            </ul>
            <img class="tw-w-[60%] tw-rounded-md" src="{{ asset('storage/team/'. $team->photo) }}" alt="">
        </div>
    </div>
</x-layout>