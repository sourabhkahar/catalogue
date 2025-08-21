<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'user']);

        $user = \App\Models\User::factory()->create([
            'name' => 'bruce wayne',
            'email' => 'bruce@gmail.com',
        ]);
        $user->assignRole($role1);

         $user = \App\Models\User::factory()->create([
            'name' => 'peter parker',
            'email' => 'peter@gmail.com',
        ]);
        $user->assignRole($role2);
    }
}
