<?php

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
        $this->call(AdminSeeder::class);
        $this->call(CarSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(UserShiftSeeder::class);
        $this->call(DriveSeeder::class);
    }
}
