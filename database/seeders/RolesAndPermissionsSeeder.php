<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert Roles
        $adminId = DB::table('roles')->insertGetId(['name' => 'Admin']);
        $userId = DB::table('roles')->insertGetId(['name' => 'User']);
        
        // Insert Permissions 
        $permissions = [
            'create_contact',
            'read_contact',
            'update_contact',
            'delete_contact',
            'create_user'
        ];

        $permissionIds = [];
        foreach ($permissions as $permission) {
            $permissionIds[$permission] = DB::table('permissions')->insertGetId(['name' => $permission]);
        }

        // Admin get all the permissions 
        foreach ($permissionIds as $pid) {
            DB::table('role_permission')->insertGetId([
                'role_id' => $adminId,
                'permission_id' => $pid
            ]);
        }

        //Initially the user will get only the Read contacts permission
        DB::table('role_permission')->insertGetId([
            'role_id' => $userId,
            'permission_id' => $permissionIds['read_contact']
        ]);

        // Create Root Admin User
        DB::table('users')->insert([
            'name' => 'Root Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role_id' => $adminId,
            'created_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
