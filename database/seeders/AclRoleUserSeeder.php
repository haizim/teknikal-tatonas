<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AclRoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acl_role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);

        DB::table('acl_role_user')->insert([
            'role_id' => '2',
            'user_id' => '2',
        ]);

        DB::table('acl_role_user')->insert([
            'role_id' => '3',
            'user_id' => '3',
        ]);
    }
}
