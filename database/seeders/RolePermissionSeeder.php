<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);
        $roleExaminer = Role::create(['name' => 'examiner']);

        // Create permissions
        $permissionCreateExam = Permission::create(['name' => 'create exam']);
        $permissionEditExam = Permission::create(['name' => 'edit exam']);
        $permissionDeleteExam = Permission::create(['name' => 'delete exam']);
        $permissionViewReport = Permission::create(['name' => 'view report']);

        // Assign permissions to roles
        $roleAdmin->givePermissionTo([$permissionCreateExam, $permissionEditExam, $permissionDeleteExam, $permissionViewReport]);
        $roleExaminer->givePermissionTo($permissionViewReport);
    }
}
