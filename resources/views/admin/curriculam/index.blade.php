<x-layout>
    <x-slot name="title">
        All Curriculum
    </x-slot>
    <x-slot name="header">
        All Curriculum
    </x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('curriculum.create') }}">New curriculum</a>
    </x-slot>
    <div>
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Module name</th>
                    {{-- <th>Module description</th> --}}
                    <th>Organizer name</th>
                    <th>Chapter name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($curriculumTemplates as $curriculumTemplate)
                {{-- {{ dd($curriculumTemplate->organizers->name) }} --}}
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-3">{{ $curriculumTemplate->id }}</td>
                    <td class="tw-p-3">{{ $curriculumTemplate->module_name }}</td>
                    {{-- <td class="tw-p-3">{{ $curriculumTemplate->description }}</td> --}}
                    <td class="tw-p-3">{{ $curriculumTemplate->organizers->name }}</td>
                    <td class="tw-p-3">{{ $curriculumTemplate->organizers->chapters->title }}</td>
                                      
                    <td class="tw-flex tw-space-x-2 tw-p-3">
                        <div>
                            <a class="tw-bg-orange-500 tw-px-2 tw-py-0.5 tw-rounded-md tw-text-white" href="{{ route('curriculum.show',$curriculumTemplate->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('curriculum.edit',$curriculumTemplate->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div> 
                            
                            <form class="" action="{{ route('curriculum.destroy',$curriculumTemplate->id) }}" onsubmit="return confirm('Are you sure to delete this Curricullum?')" method="POST">
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