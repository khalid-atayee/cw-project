<x-layout>
    <x-slot name="title">Create New Oraganizer</x-slot>
    <x-slot name="header">Create New Oraganizer</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('organizers.index') }}">All Organizers</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('organizers.store') }}" method="POST">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_name">Organizer Name</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="organizer_name" id="organizer_name" placeholder="Organizer name" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="description">description</label>
                <textarea class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="description" id="description" placeholder="Description" cols="30" rows="10"></textarea>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="organizer_image">Organizer Image</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="file" name="organizer_image" id="organizer_image" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="chapter_id">Select chapter</label>
                <select class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="chapter_id" id="chapter_id">
                    @foreach ($chapters as $chapter)
                        <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>