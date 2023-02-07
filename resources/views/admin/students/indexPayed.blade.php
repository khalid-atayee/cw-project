<x-layout>
    <x-slot name="title">
        All students  
    </x-slot>
    <x-slot name="header">
        All Students
    </x-slot>
    <x-slot name="button">
        @role('admin|organizer')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('students.notPayed') }}">Not Payed Students</a>
        @endrole
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>full name</th>
                    <th>gender</th>
                    <th>dob</th>
                    <th>chapter</th>
                    <th>organizer</th>
                    <th>location</th>
                    <th>email</th>
                    <th>phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $student->id }}</td>
                    <td class="tw-p-3">{{ $student->fname.' '.$student->lname  }}</td>
                    <td class="tw-p-3">{{ $student->gender==1 ? 'male' : 'female' }}</td>
                    <td class="tw-p-3">{{ $student->dob }}</td>
                    <td class="tw-p-3">{{ $student->chapters->title }}</td>
                    <td class="tw-p-3">{{ $student->chapters->organizer->name }}</td>
                    <td class="tw-p-3">{{ $student->location }}</td>
                    <td class="tw-p-3">{{ $student->email }}</td>
                    <td class="tw-p-3">{{ $student->phone }}</td>

                    
                    {{-- <td class="tw-flex tw-space-x-2 tw-p-3">
                        <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="" onsubmit="return confirm('Are you sure to delete this chapter?')" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="tw-bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                           
                        </div>
                       
                        
                    </td> --}}
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-layout>