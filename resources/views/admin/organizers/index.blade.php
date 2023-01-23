<x-layout>
    <x-slot name="title">
        All Organizers
    </x-slot>
    <x-slot name="header">
        All Organizers
    </x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('organizers.create') }}">New
            Organizer</a>
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Chapter</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
{{-- 
                @if (Auth::user()->roles[0]->name == 'chapter')

                    <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                        <td class="tw-p-3">{{ Auth::user()->chapter->organizer->id }}</td>
                        <td class="tw-p-3">{{ Auth::user()->chapter->organizer->name }}</td>
                        <td class="tw-p-3">{{ Auth::user()->chapter->organizer->description }}</td>
                        <td class="tw-p-3">{{ Auth::user()->chapter->organizer->image }}</td>
                        <td class="tw-p-3">{{ Auth::user()->chapter->title }}</td>

                        <td class="tw-flex tw-space-x-2 tw-p-3">
                            <div>
                                <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white"
                                    href="">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>
                            <div>
                                <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                            <div>

                                <form class="" action=""
                                    onsubmit="return confirm('Are you sure to delete this chapter?')" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="tw-bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </div>


                        </td>
                    </tr>
                @else --}}
                    @foreach ($organizers as $organizer)
                        <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                            <td class="tw-p-3">{{ $organizer->id }}</td>
                            <td class="tw-p-3">{{ $organizer->name }}</td>
                            <td class="tw-p-3">{{ $organizer->description }}</td>
                            <td class="tw-p-3">{{ $organizer->image }}</td>
                            <td class="tw-p-3">{{ $organizer->chapters->title }}</td>

                            <td class="tw-flex tw-space-x-2 tw-p-3">
                                <div>
                                    <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white"
                                        href="">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                                <div>
                                    <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white"
                                        href="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </div>
                                <div>

                                    <form class="" action="{{ route('organizers.destroy', $organizer) }}"
                                        onsubmit="return confirm('Are you sure to delete this chapter?')"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="tw-bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </div>


                            </td>
                        </tr>
                    @endforeach

                {{-- @endif --}}






            </tbody>
        </table>
    </div>
</x-layout>
