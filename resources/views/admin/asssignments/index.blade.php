<x-layout>
    <x-slot name="title">
        All Assignments
    </x-slot>
    <x-slot name="header">
        All Assignments
    </x-slot>
    <x-slot name="button">
        @role('admin|mentor')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('assignments.create') }}">New Assignment</a>
        @endrole
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Chapter title</th>
                    <th>Student name</th>
                    <th>Session title</th>
                    <th>Mentor</th>
                    <th>Grade</th>
                    @role('admin|mentor')
                    <th>Email</th>
                    @endrole
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignments as $assignment)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $assignment->id }}</td>
                    <td class="tw-p-3">{{ $assignment->title }}</td>
                    <td class="tw-p-3">{{ $assignment->chapters->title }}</td>
                    <td class="tw-p-3">{{ $assignment->students->fname.' '. $assignment->students->lname }}</td>
                    <td class="tw-p-3">{{ $assignment->sessions->title }}</td>
                    <td class="tw-p-3">{{ $assignment->mentors->name }}</td>
                    <td class="tw-p-3">{{ $assignment->grades->grade_title }}</td>
                    @role('admin|mentor')
                    <td class="tw-p-3">
                        <a class="btn btn-sm btn-primary" href="{{ route('assignments.show',$assignment->id) }}">Email</a>
                    </td>

                    @endrole
                    {{-- <td class="tw-p-3">{{ $session->chapter->organizer->name }}</td> --}}
                    

                    <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('assignments.edit',$assignment->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('assignments.destroy',$assignment->id) }}" onsubmit="return confirm('Are you sure to delete this news?')" method="POST">
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