<x-layout>
    <x-slot name="title">Feedbacks </x-slot>
    <x-slot name="header">Feedbacks</x-slot>

    <x-slot name="button">
        All Feedbacks
    </x-slot>
    <div class="">
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($feedbacks as $feedback)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-2">{{ $feedback->id }}</td>
                    <td class="tw-p-2">{{ $feedback->full_name }}</td>
                    <td class="tw-p-2">{{ $feedback->email }}</td>
                    <td class="tw-p-2">{{ $feedback->message }}</td>
                    <td class="tw-p-2">{{ $feedback->created_at }}</td>
                    
                    {{-- <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        <div>
                            <button onclick="data({{ $alumni }})" class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('alumnis.edit', $alumni) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('alumnis.destroy', $alumni) }}" onsubmit="return confirm('Are you sure to delete this chapter?')" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                           
                        </div>
                       
                        
                    </td> --}}
                </tr>
                @endforeach
                
            </tbody>
        </table>
</x-layout>