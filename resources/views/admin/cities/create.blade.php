<x-layout>
    <x-slot name="title">Create New City</x-slot>
    <x-slot name="header">Create New City</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('cities.index') }}">All Cities</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow"
            action="{{ route('cities.store') }}" method="POST">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="city_name">City name</label>
                <div class="d-flex flex-column w-100">

                    <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ old('city_name') }}" type="text" name="city_name"
                        id="city_name" placeholder="city name" />
                    @error('city_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="country">Country</label>
                <div class="d-flex flex-column w-100">
                    <input class="tw-w-[80%] tw-border tw-p-2 tw-rounded-md" value="{{ old('country') }}" type="text" name="country"
                        id="country" placeholder="country" />
                    @error('country')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="tw-text-right">
                <button class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>
