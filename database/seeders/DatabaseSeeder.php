<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AclRolesSeeder::class,
            AclRoleUserSeeder::class,
            MasterSensorSeeder::class,
            HardwareSeeder::class,
            HardwareDetailSeeder::class,
            TransaksiSeeder::class,
            TransaksiDetailSeeder::class
        ]);
    }
}
