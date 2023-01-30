<x-layout>


<x-slot name="title">Posts </x-slot>
<x-slot name="header">Posts</x-slot>

<x-slot name="button">
    <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('news.create') }}">New Post</a>
</x-slot>
<div class="">
    <table class="tw-w-full tw-divide-y-2">
        <thead class="tw-bg-gray-200">
            <tr class="tw-text-left">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($newses as $news)
            <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                <td class="tw-p-2">{{ $news->id }}</td>
                <td class="tw-p-2">{{ $news->title }}</td>
                <td class="tw-p-2">{{ $news->description }}</td>
                <td class="tw-p-2">{{ $news->image }}</td>
                <td class="tw-p-2">{{ $news->created_at }}</td>
                <td class="tw-p-2">{{ $news->updated_at }}</td>
                
                <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                    <div>
                        <a href="{{ route('news.show',$news) }}" class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                            <i class="fa fa-eye"></i>
                        </a>
                    </div>
                    <div>
                        <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('news.edit',$news) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </div>
                    <div>
                        
                        <form class="" action="{{ route('news.trash', $news) }}" onsubmit="return confirm('Are you sure to delete this news?')" method="POST">
                            @csrf
                            {{-- @method('delete') --}}
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

</x-layout>