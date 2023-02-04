<x-layout>
    <x-slot name="title">All City</x-slot>
    <x-slot name="header">List of Cities</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('cities.create') }}">New City</a>
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>City</th>
                    <th>County</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $city->id }}</td>
                    <td class="tw-p-3">{{ $city->city_name }}</td>
                    <td class="tw-p-3">{{ $city->country }}</td>
                    <td class="tw-p-3">{{ $city->created_at }}</td>
                    <td class="tw-p-3">{{ $city->updated_at }}</td>
                    
                    <td class="tw-flex tw-space-x-2 tw-p-3 tw-items-center">
                        {{-- <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div> --}}
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('cities.edit',$city) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('cities.destroy',$city) }}" onsubmit="return confirm('Are you sure to delete this chapter?')" method="POST">
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