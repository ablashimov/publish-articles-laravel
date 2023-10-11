<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolePermissionUserCreationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'User is allowed to manage posts',
        ]);

        $createPost = Permission::create([
            'name' => 'create-post',
            'display_name' => 'Create Posts',
            'description' => 'create new blog posts',
        ]);

        $admin->attachPermission($createPost);

        $user = User::create([
            'name' => 'John',
            'email' => 'john2@gmail.com',
            'password' => bcrypt('12348765')
        ]);

        $user->attachRole($admin);
    }
}
