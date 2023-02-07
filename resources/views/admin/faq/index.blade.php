<x-layout>
    <x-slot name="title">Frequently Asked Questions </x-slot>
    <x-slot name="header">Frequently Asked Questions</x-slot>

    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('faq.create') }}">New FAQ</a>
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-2">{{ $faq->id }}</td>
                    <td class="tw-p-2">{{ $faq->title }}</td>
                    <td class="tw-p-2">{{ $faq->description }}</td>
                    <td class="tw-p-2">{{ $faq->created_at }}</td>
                    
                    <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        {{-- <div>
                            <button onclick="data({{ $alumni }})" class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div> --}}
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('faq.edit', $faq) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('faq.destroy', $faq) }}" onsubmit="return confirm('Are you sure to delete this FAQ?')" method="POST">
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
