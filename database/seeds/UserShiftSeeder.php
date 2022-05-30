<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $supervisorsID = [2, 3, 4, 5];
        $operatorsID = [6, 7, 8, 9, 10, 11, 12];

        for($shift_id = 1; $shift_id < 11; $shift_id++) {
            // Supervisor
            DB::table('user_shift')->insert([
                'user_id' => $supervisorsID[rand(0, 3)],
                'shift_id' => $shift_id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            // Operators
            $randOPe = rand(0, 6);
            for($ope = 0; $ope < $randOPe; $ope++) {
                DB::table('user_shift')->insert([
                    'user_id' => $operatorsID[$ope],
                    'shift_id' => $shift_id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }

            // Drivers
            for($dr = 0; $dr < 7; $dr++) {
                DB::table('user_shift')->insert([
                    'user_id' => rand(13, 22),
                    'shift_id' => $shift_id,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }

        }
    }
}
