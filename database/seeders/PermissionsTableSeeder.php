<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'permission-index',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:56:57',
                'updated_at' => '2023-01-12 21:56:57',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'permission-create',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:56:57',
                'updated_at' => '2023-01-12 21:56:57',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'permission-edit',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:56:57',
                'updated_at' => '2023-01-12 21:56:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'permission-delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:56:57',
                'updated_at' => '2023-01-12 21:56:57',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'role-edit',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:57:51',
                'updated_at' => '2023-01-12 21:57:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'role-index',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:57:51',
                'updated_at' => '2023-01-12 21:57:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'role-create',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:57:51',
                'updated_at' => '2023-01-12 21:57:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'role-delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 21:57:51',
                'updated_at' => '2023-01-12 21:57:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'user-create',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 22:00:28',
                'updated_at' => '2023-01-12 22:00:28',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'user-index',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 22:00:28',
                'updated_at' => '2023-01-12 22:00:28',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'user-edit',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 22:00:28',
                'updated_at' => '2023-01-12 22:00:28',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'user-delete',
                'guard_name' => 'web',
                'created_at' => '2023-01-12 22:00:28',
                'updated_at' => '2023-01-12 22:00:28',
            ),
        ));
        
        
    }
}