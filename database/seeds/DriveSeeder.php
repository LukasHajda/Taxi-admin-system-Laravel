<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = ['Nitra', 'Klokocina', 'Bratislava', 'Trnava', 'Trencin', 'Kosice', 'Poprad', 'Sobrance', 'Velky kyr', 'Banovce', 'Zilina', 'Novy svet'];
        $driver_ids = [2, 3, 7, 8, 10, 17, 18, 19, 20, 21, 22, 22];
        for($i = 0; $i < 50; $i++) {
            $phone = "";
            for($j = 0; $j < 10; $j++) {
                $phone .= rand(0, 9);
            }
            DB::table('drives')->insert([
                'place_from' => $places[rand(0, 11)],
                'place_to' => $places[rand(0, 11)],
                'phone_number' => $phone,
                'salary' => rand(2, 10),
                'distance' => rand(20, 100),
                'driver_id' => $driver_ids[rand(0, 11)],
                'shift_id' => rand(1, 10),
                'car_id' => rand(1, 7),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
