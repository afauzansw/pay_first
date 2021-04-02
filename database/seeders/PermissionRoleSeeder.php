<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        $cashier_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 6) != 'admin_';
        });

        Role::findOrFail(2)->permissions()->sync($cashier_permissions);
        $student_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 8) == 'student_';
        });

        Role::findOrFail(3)->permissions()->sync($student_permissions);

        // $admin_permissions = Permission::all();
        // Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        // $staff_permissions = $admin_permissions->filter(function ($permission) {
        // return substr($permission->title, 0, 6) != 'admin_';
        // });

        // Role::findOrFail(2)->permissions()->sync($staff_permissions);
        // $user_permissions = $admin_permissions->filter(function ($permission) {
        // return substr($permission->title, 0, 5) == 'user_';
        // });
        // Role::findOrFail(3)->permissions()->sync($user_permissions);

    }
}
