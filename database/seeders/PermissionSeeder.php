<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'admin_access',
            ],
            [
                'id'    => 2,
                'title' => 'cashier_access',
            ],
            [
                'id'    => 3,
                'title' => 'student_access',
            ]
        ];

        Permission::insert($permissions);
    }
}
