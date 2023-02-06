<x-layout>
    <x-slot name="title">Create New User</x-slot>
    <x-slot name="header">Create New User</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('users.index') }}">All Users</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="admin_name">Admin Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="admin_name" value="{{ old('admin_name') }}" id="admin_name" placeholder="admin name" />

                    @error('admin_name')
                    <span class="text-danger ">{{ $message }}</span>
                        
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="admin_name">admin Email</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input  class="tw-border tw-p-2 tw-rounded-md" type="text" name="admin_email" value="{{ old('admin_email') }}" id="admin_name" placeholder="admin Email" />
                @error('admin_email')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>

            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="admin_name">Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="password" name="admin_password" value="{{ old('admin_password') }}" id="admin_name" placeholder="admin Password" />
                @error('admin_password')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="admin_name">Confirm Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="password" name="admin_cpassword" id="admin_name" placeholder="confirm password" />
                @error('admin_password')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>


            <div class="tw-text-right">
                <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Save</button>
            </div>


        </form>
    </div>
</x-layout>