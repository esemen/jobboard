<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DefaultRolesAndPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Super Admin Role
        $role = Role::firstOrCreate([
            'name' => 'Super Administrator'
        ]);

        // System Admin Role
        $role = Role::firstOrCreate([
            'name' => 'System Administrator'
        ]);

        // System Debug Permission
        $permission = Permission::firstOrCreate([
            'name' => 'system.debug'
        ]);
        $permission->assignRole(['System Administrator']);

        // Company Roles
        $role = Role::firstOrCreate([
            'name' => 'Company Administrator'
        ]);

        $companyPermissions = [
            'company.update', 'company.delete',
            'job.create', 'job.edit', 'job.delete', 'job.publish'
        ];

        foreach ($companyPermissions as $companyPermission) {
            $permission = Permission::firstOrCreate([
                'name' => $companyPermission
            ]);

            $role->givePermissionTo($permission);
        }
    }
}
