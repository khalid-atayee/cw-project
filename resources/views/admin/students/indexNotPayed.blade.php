<x-layout>
    <x-slot name="title">
        Not payed students  
    </x-slot>
    <x-slot name="header">
        Not payed Students
    </x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('students.create') }}">Payed Students</a>
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
                    @role('admin|organizer')
                    <th>Actions</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $student->id }}</td>
                    <td class="tw-p-3">{{ $student->fname.' '.$student->lname  }}</td>
                    <td class="tw-p-3">{{ $student->gender==1 ? 'male' : 'female' }}</td>
                    <td class="tw-p-3">{{ $student->dob }}</td>
                    <td class="tw-p-3">{{  $student->chapters->title  }}</td>
                    <td class="tw-p-3">{{isset( $student->chapters->organizer )? $student->chapters->organizer->name : 'you did not created organizer yet' }}</td>
                    <td class="tw-p-3">{{ $student->location }}</td>
                    <td class="tw-p-3">{{ $student->email }}</td>
                    <td class="tw-p-3">{{ $student->phone }}</td>
                    @role('admin|organizer')
                    <td class="tw-p-3"><a class="btn btn-sm btn-primary" href="{{ route('students.show',$student->id) }}">Pay</a></td>
                    @endrole
                    
                 
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-layout>