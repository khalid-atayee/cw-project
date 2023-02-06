<x-layout>
    <x-slot name="title">
        All Mentors
    </x-slot>
    <x-slot name="header">
        All Mentors
    </x-slot>
    <x-slot name="button">
        @role('admin|chapter')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('Mentors.create') }}">New Mentor</a>
        @endrole

        @role('admin|chapter|organizer')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('mentor.createMail') }}">Email Cohort</a>
        @endrole

    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Linkedin</th>
                    <th>Image</th>
                    <th>Chapter</th>
                    <th>Organizer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($mentors as $mentor)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $mentor->id }}</td>
                    <td class="tw-p-3">{{ $mentor->name }}</td>
                    <td class="tw-p-3">{{ $mentor->description }}</td>
                    <td class="tw-p-3">{{ $mentor->linkedin }}</td>

                    <td class="tw-p-3">
                        <img src="{{ asset('storage/mentorImage/'.$mentor->image) }}" alt="" style="width: 30px;height:30px">
                        
                       </td>
                    <td class="tw-p-3">{{ $mentor->chapters->title }}</td>
                    <td class="tw-p-3">{{ $mentor->organizers->name }}</td>
                    
                    <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        {{-- <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div> --}}
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('Mentors.edit',$mentor->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div> 
                            
                            <form  action="{{ route('Mentors.destroy',$mentor->id) }}" onsubmit="return confirm('Are you sure to delete this mentor?')" method="POST">
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