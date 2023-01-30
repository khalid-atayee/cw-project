<x-layout>
    <x-slot name="title">{{ $news->title }}</x-slot>
    <x-slot name="header">Details</x-slot>
    <x-slot name="button"><x-back /></x-slot>

    <div>
        <div class="tw-flex tw-flex-col tw-px-10">
            <h1 class="tw-text-xl tw-font-[roboto]">{{ $news->title }}</h1>
            <p>{{ $news->description }}</p>
            <img class="tw-w-[50%] tw-h-[50%]" src="{{ asset('storage/posts/' . $news->image) }}" alt="">
        </div>
    </div>


</x-layout>