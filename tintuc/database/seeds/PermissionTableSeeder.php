<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name_permission' =>'user-list',
            'display_permission' => 'Danh sachs user',
            'created_by'	=> 1,
            'updated_by'	=> 1,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'user-add',
            'display_permission' => 'Them user',
            'created_by'	=> 2,
            'updated_by'	=> 2,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'user-edit',
            'display_permission' => 'Sua user',
            'created_by'	=> 3,
            'updated_by'	=> 3,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'user-delete',
            'display_permission' => 'Xoa user',
            'created_by'	=> 4,
            'updated_by'	=> 4,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'role-list',
            'display_permission' => 'Danh sach role',
            'created_by'	=> 5,
            'updated_by'	=> 5,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'role-add',
            'display_permission' => 'them role',
            'created_by'	=> 6,
            'updated_by'	=> 6,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'role-edit',
            'display_permission' => 'sua user',
            'created_by'	=> 7,
            'updated_by'	=> 7,
        ]);

        DB::table('users')->insert([
            'name_permission' =>'role-delete',
            'display_permission' => 'Danh sachs user',
            'created_by'	=> 8,
            'updated_by'	=> 8,
        ]);
    }
}
