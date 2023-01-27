<x-layout>
    <x-slot name="title">Update User</x-slot>
    <x-slot name="header">Update User</x-slot>
    <x-slot name="button">
        <a class="tw-bg-blue-500 tw-rounded-md tw-p-2 tw-text-white" href="{{ route('users.index') }}">All Users</a>
    </x-slot>
    <div>
        <form class="tw-flex tw-flex-col tw-space-y-2 tw-border tw-p-5 tw-rounded-md tw-shadow" action="{{ route('users.update',$user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="user_name">User Name</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                    <input class=" tw-border tw-p-2 tw-rounded-md" type="text" name="user_name" value="{{ $user->name }}" id="user_name" placeholder="User name" />

                    @error('user_name')
                    <span class="text-danger ">{{ $message }}</span>
                        
                    @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="user_name">User Email</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">

                <input  class="tw-border tw-p-2 tw-rounded-md" type="text" name="user_email" value="{{ $user->email }}" id="user_name" placeholder="User Email" />
                @error('user_email')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>

            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="user_name">Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="password" value="{{ $user->password }}" name="user_password" id="user_name" placeholder="User Password" />
                @error('user_password')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>

            <div class="tw-flex">
                <label class="tw-w-[20%] tw-p-2" for="user_name">Confirm Password</label>
                <div class="tw-w-[80%]" style="display: grid;grid-template-column:1fr">
                
                <input class=" tw-border tw-p-2 tw-rounded-md" type="password" value="{{ $user->password }}" name="user_cpassword" id="user_name" placeholder="confirm password" />
                @error('user_password')
                <span class="text-danger">{{ $message }}</span>
                    
                @enderror
                </div>
            </div>


            <div class="tw-text-right">
                <button type="submit" class="tw-bg-blue-500 tw-text-white tw-rounded-md tw-p-2">Update</button>
            </div>


        </form>
    </div>
</x-layout>