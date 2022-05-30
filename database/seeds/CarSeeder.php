<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use \App\Car;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars = [['BMW', 'A3', 'NR103KL'],
            ['Skoda', 'Felicia', 'NR225OP'],
            ['BMW', 'A6', 'BL556TR'],
            ['KIA', 'Sportage', 'SA587LO'],
            ['Skoda', 'Superb', 'HL784KK'],
            ['Ford', 'Mustang', 'NR444Vb'],
            ['Peugeot', '307', 'NR117GH']];

        foreach ($cars as $car) {
            $car = Car::firstOrNew([
                'brand' => ucfirst($car[0]),
                'model' => ucfirst($car[1]),
                'license_number' => strtoupper($car[2]),
            ]);

            if ($car->exists) continue;

            $car->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $car->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            $car->save();

        }
    }
}
