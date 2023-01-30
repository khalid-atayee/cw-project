<x-layout>
    <x-slot name="title">Alumnis </x-slot>
    <x-slot name="header">Alumnis</x-slot>

    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2" href="{{ route('alumnis.create') }}">New Alumni</a>
    </x-slot>
    <div class="">
        <table class="tw-w-full tw-divide-y-2">
            <thead class="tw-bg-gray-200">
                <tr class="tw-text-left">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Graduation Year</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnis as $alumni)
                <tr class="tw-border-b-2 hover:tw-bg-blue-50">
                    <td class="tw-p-2">{{ $alumni->id }}</td>
                    <td class="tw-p-2">{{ $alumni->name }}</td>
                    <td class="tw-p-2">{{ $alumni->description }}</td>
                    <td class="tw-p-2">{{ $alumni->graduation_year }}</td>
                    <td class="tw-p-2">{{ $alumni->created_at }}</td>
                    <td class="tw-p-2">{{ $alumni->updated_at }}</td>
                    
                    <td class="tw-flex tw-space-x-2 tw-p-2 tw-items-center">
                        <div>
                            <button onclick="data({{ $alumni }})" class="tw-bg-orange-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white">
                                <i class="fa fa-eye"></i>
                            </button>
                        </div>
                        <div>
                            <a class="tw-bg-blue-500 tw-px-2 tw-py-1 tw-rounded-md tw-text-white" href="{{ route('alumnis.edit', $alumni) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>
                        <div>
                            
                            <form class="" action="{{ route('alumnis.destroy', $alumni) }}" onsubmit="return confirm('Are you sure to delete this alumni?')" method="POST">
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
    <div style="display: none;" id="selected-alumni" class="tw-fixed tw-top-0 tw-bottom-0 tw-right-0 tw-left-0 tw-m-auto tw-bg-gray-200/50 tw-flex tw-items-center" >
            <div class="tw-w-max tw-h-max tw-m-auto tw-items-center tw-bg-white rounded-md tw-top-0 tw-bottom-0 tw-right-0 tw-left-0 tw-fixed tw-p-2 shadow-md">
                <button class="tw-float-right" onclick="closepop()">X</button>
                <div class="tw-flex tw-flex-col tw-space-y-3 tw-items-center tw-py-3 tw-px-10" id="alumni-data">
                    
                    {{-- <img id="photo" src="{{ asset('storage/alumnis/'}) }} + " alt="" class="tw-w-[300px] tw-h-[300px] tw-rounded-full"> --}}
                </div>
                
            </div>
    </div>
</x-layout>

<script>
    const selectedAlumni = document.getElementById('selected-alumni')
    const alumniData = document.getElementById('alumni-data')
    function data(data){
        
        let name = data['name']
        let description = data['description']
        let graduation_year = data['graduation_year']
        let photo = data['photo']
        let linkedin = data['linkedin']
        console.log(photo)
        alumniData.innerHTML = `<img src='storage/alumnis/${photo}' class="tw-w-[300px] tw-h-[300px] tw-rounded-full" />`
        alumniData.innerHTML += `<a href="${linkedin}" target="_blank"><i class="fa fa-linkedin tw-text-blue-500 tw-border tw-rounded-full tw-bg-white tw-p-2"></i></a>`
        alumniData.innerHTML += `<h1 class="tw-text-2xl tw-font-[roboto]">${name}</h1>`
        alumniData.innerHTML += `<p>${description}</p>`
        alumniData.innerHTML += `<p>${graduation_year}</p>`

        
        selectedAlumni.style.display = "block"
        
    }
    function closepop(){
        selectedAlumni.style.display = "none"
    }
</script>