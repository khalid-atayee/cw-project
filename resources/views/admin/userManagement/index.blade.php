<x-layout>
    <x-slot name="title">
        All Users
    </x-slot>
    <x-slot name="header">
        All Users
    </x-slot>
    <x-slot name="button">
        @if ($authorityCheck=='all')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.admin') }}">Admin</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.organizer') }}">Organizer</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.mentor') }}">Mentor</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.chapter') }}">Chapter</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.student') }}">Student</a>

        @elseif ($authorityCheck=='admin')
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.create') }}">Create Admin</a>


        @elseif ($authorityCheck=='mentor')
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('Mentors.create') }}">Create Mentor</a>

        

        @elseif ($authorityCheck=='organizer')
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('organizers.create') }}">Create organizer</a>


        @elseif ($authorityCheck=='chapter')
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('organizers.create') }}">create chapter</a>


        @elseif ($authorityCheck=='student')
            <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('users.index') }}">All</a>
            {{-- <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('organizers.create') }}">Create organizer</a> --}}

        @endif

        


        


    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Authority</th>
                    @if ($flag)
                        
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key=> $user)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $user->id }}</td>
                    <td class="tw-p-3">{{ $user->name }}</td>
                    <td class="tw-p-3">{{ $user->email }}</td>
                    @foreach ($user->roles as $item)
                        
                    <td class="tw-p-3">{{ $item->name }}</td>
                    @endforeach

                    @if ($flag)
                        
                    
                    
                    <td class="tw-flex tw-space-x-2 tw-p-3">
                        <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white" href="">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('users.edit',$user->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('users.destroy',$user->id) }}" onsubmit="return confirm('Are you sure to delete this User? if you delete this user all its child will be deleted.')" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="tw-bg-red-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                           
                        </div>
                       
                        
                    </td>
                    @endif
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</x-layout>