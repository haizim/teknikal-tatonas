<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'super admin',
            'email' => 'super_admin@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('super123'),
            'remember_token' => Hash::make('super123'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 'ACTIVE',
            'timezone' => 'UTC',
            'password_changed_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('admin123'),
            'remember_token' => Hash::make('admin123'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 'ACTIVE',
            'timezone' => 'UTC',
            'password_changed_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => Hash::make('user123'),
            'remember_token' => Hash::make('user123'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'status' => 'ACTIVE',
            'timezone' => 'UTC',
            'password_changed_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
