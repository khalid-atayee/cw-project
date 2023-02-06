<x-layout>
    <x-slot name="title">Team </x-slot>
    <x-slot name="header">Team</x-slot>

    <x-slot name="button">
        <a id="new-member-btn" onclick="showSpinner()" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('team.create') }}">New Member</a>
    </x-slot>
    <div class="">
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Major</th>
                    <th>Role</th>
                    <th>Linkedin </th>
                    <th>Short Bio</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $team)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-2">{{ $team->id }}</td>
                    <td class="tw-p-2">{{ $team->name }}</td>
                    <td class="tw-p-2">{{ $team->major }}</td>
                    <td class="tw-p-2">{{ $team->role }}</td>
                    <td class="tw-p-2">{{ $team->linkedin }}</td>
                    <td class="tw-p-2">{{ $team->short_bio }}</td>
                    <td class="tw-p-2">{{ $team->photo }}</td>
                    
                    <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        <div>
                            <a href="{{ route('team.show', $team) }}" class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('team.edit', $team) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('team.destroy', $team) }}" onsubmit="return confirm('Are you sure to delete this team memeber?')" method="POST">
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

