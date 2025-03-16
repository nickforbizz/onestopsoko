<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Disable foreign key constraints
        Schema::disableForeignKeyConstraints();

        // Truncate the permissions table
        DB::table('permissions')->truncate();

        // Enable foreign key constraints
        Schema::enableForeignKeyConstraints();

        $users = User::where('active', 1)->get();



        // Users 
        Permission::create([
            'name' => 'create users',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit users',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete users',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'activate users',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'deactivate users',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);




        // Post Categories
        Permission::create([
            'name' => 'create post categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit post categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete post categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'publish post categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'unpublish post categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);




        // Posts
        Permission::create([
            'name' => 'create posts',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit posts',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete posts',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'publish posts',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'unpublish posts',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);






        // product Categories
        Permission::create([
            'name' => 'create product categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit product categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete product categories',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);



        // Posts
        Permission::create([
            'name' => 'create product',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit product',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete product',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        // Suppliers
        Permission::create([
            'name' => 'create supplier',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit supplier',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete supplier',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        // Clients
        Permission::create([
            'name' => 'create client',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit client',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete client',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);



        // Inventory
        Permission::create([
            'name' => 'create inventory',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit inventory',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete inventory',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        // Order
        Permission::create([
            'name' => 'create order',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit order',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete order',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);



        // Order Dtails
        Permission::create([
            'name' => 'create order_detail',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit order_detail',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete order_detail',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        // Transations
        Permission::create([
            'name' => 'create transaction',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit transaction',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete transaction',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        // Requests
        Permission::create([
            'name' => 'create request',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit request',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete request',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);



        // Roles
        Permission::create([
            'name' => 'create roles',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit roles',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete roles',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);




        // Permissions
        Permission::create([
            'name' => 'create permissions',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit permissions',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete permissions',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);


        

        // Params
        Permission::create([
            'name' => 'create params',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'edit params',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
        Permission::create([
            'name' => 'delete params',
            'guard_name' => 'web',
            'created_by' => $users->random()->id
        ]);
    }
}
