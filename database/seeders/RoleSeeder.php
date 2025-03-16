<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = ['superadmin', 'admin', 'writer', 'user'];

        collect($roles)->each(fn($role) => Role::create(['name' => $role]));

        if ($permissions = Permission::pluck('name')->toArray()) {
            Role::findByName('superadmin')->givePermissionTo($permissions);
        }

    }
}
