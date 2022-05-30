<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');
        for($i = 0; $i < 10; $i++) {
            DB::table('shifts')->insert([
                'started_at' => $date,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}
