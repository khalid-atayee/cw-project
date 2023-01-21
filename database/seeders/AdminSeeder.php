<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=  User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('codeweekend123'), // codeweekend123
        
        ]);
        $permissions = [
            ['name'=>'dashboard'],
            ['name'=>'chapter'],
            ['name'=>'organizers'],
           [ 'name'=>'mentors'],
           [ 'name'=>'sessions'],
            ['name'=>'assignments'],
           [ 'name'=>'cities'],
            ['name'=>'students'],
            ['name'=>'alumni'],
            ['name'=>'feedback'],
           [ 'name'=>'teams'],
            ['name'=>'news']
        
        ];
        foreach ($permissions as $permission) {
            
            Permission::create($permission);
        }
        Role::create(['name'=>'organizer']);
        Role::create(['name'=>'mentor']);
        Role::create(['name'=>'chapter']);
        Role::create(['name'=>'student']);

        $role = Role::create(['name'=>'admin']);
        $permissions = Permission::all();
        foreach ($permissions as $permission) {

            $role->givePermissionTo($permission->name);
            
        }
        $user->assignRole([$role->id]);
    }
}
