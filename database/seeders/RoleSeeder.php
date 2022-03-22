<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        $permissions = [
            'blog-view', 'blog-create', 'blog-edit', 'blog-delete',
            'room-view', 'room-create', 'room-edit', 'room-delete',
            'staff-view', 'staff-create', 'staff-edit', 'staff-delete',
            'transport-view', 'transport-create', 'transport-edit', 'transport-delete'
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }


        $role = Role::firstOrCreate([
            'name' => 'administration'
        ]);

        $role->syncPermissions($permissions);
    }
}
