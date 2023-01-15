<x-layout>
    <x-slot name="title">
        All Chapters
    </x-slot>
    <x-slot name="header">
        All Chapters
    </x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('chapters.create') }}">New Chapter</a>
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Title</th>
                    <th>City</th>
                    <th>Fees</th>
                    <th>Duration</th>
                    <th>Started date</th>
                    <th>Ended date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($chapters as $chapter)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $chapter->id }}</td>
                    <td class="tw-p-3">{{ $chapter->title }}</td>
                    <td class="tw-p-3">{{ "Kabul" }}</td>
                    <td class="tw-p-3">{{ $chapter->fees }}</td>
                    <td class="tw-p-3">{{ $chapter->duration }}</td>
                    <td class="tw-p-3">{{ $chapter->start_date }}</td>
                    <td class="tw-p-3">{{ $chapter->end_date }}</td>
                    <td class="tw-flex tw-space-x-2 tw-p-3 items-center">
                        <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('chapters.destroy',$chapter) }}" onsubmit="return confirm('Are you sure to delete this chapter?')" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="tw-bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                           
                        </div>
                       
                        
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-layout>