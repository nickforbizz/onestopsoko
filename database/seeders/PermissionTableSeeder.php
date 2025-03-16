<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionTableSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key constraints
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        $users = User::where('active', 1)->get();

        $permissions = [
            'users' => ['create', 'edit', 'delete', 'activate', 'deactivate'],
            'post categories' => ['create', 'edit', 'delete', 'publish', 'unpublish'],
            'posts' => ['create', 'edit', 'delete', 'publish', 'unpublish'],
            'product categories' => ['create', 'edit', 'delete'],
            'product' => ['create', 'edit', 'delete'],
            'supplier' => ['create', 'edit', 'delete'],
            'client' => ['create', 'edit', 'delete'],
            'inventory' => ['create', 'edit', 'delete'],
            'order' => ['create', 'edit', 'delete'],
            'order_detail' => ['create', 'edit', 'delete'],
            'transaction' => ['create', 'edit', 'delete'],
            'request' => ['create', 'edit', 'delete'],
            'roles' => ['create', 'edit', 'delete'],
            'permissions' => ['create', 'edit', 'delete'],
            'params' => ['create', 'edit', 'delete'],
        ];

        foreach ($permissions as $entity => $actions) {
            foreach ($actions as $action) {
                Permission::create([
                    'name' => "{$action} {$entity}",
                    'guard_name' => 'web',
                    'created_by' => $users->random()->id
                ]);
            }
        }
    }

}
