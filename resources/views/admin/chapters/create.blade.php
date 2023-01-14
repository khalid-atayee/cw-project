<x-layout>
    <x-slot name="title">Create New Chapter</x-slot>
    <x-slot name="header">Create New Chapter</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('chapters.index') }}">All Chapters</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('chapters.store') }}" method="POST">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="title">Chapter title</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="text" name="title" id="title" placeholder="Chapter tilte" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="city_id">Select City</label>
                <select class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" name="city_id" id="city_id">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="fees">Chapter Fees</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="number" name="fees" id="fees" placeholder="Chapter fees" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="duration">Chapter duration</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="number" name="duration" id="duration" placeholder="Chapter duration" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="start_date">Start date</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="date" name="start_date" id="start_date" />
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="end_date">End date</label>
                <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" type="date" name="end_date" id="end_date" />
            </div>
            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>