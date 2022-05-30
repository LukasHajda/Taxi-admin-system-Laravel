<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [['Karol', 'Barber'],
            ['Ivana', 'Allen'],
            ['Jozef', 'Baxter'],
            ['Martin', 'Walters'],
            ['Bonifac', 'Cardenas'],
            ['Kristina', 'Aguilar'],
            ['Ludovit', 'Klein'],
            ['John', 'Ewing'],
            ['Palo', 'Terry'],
            ['Karol', 'Joseph'],
            ['Lucia', 'Lutz'],
            ['Ernest', 'Fuentes'],
            ['Bozena', 'Lambert'],
            ['Sofia', 'Hill'],
            ['John', 'Case'],
            ['Ivan', 'Benitez'],
            ['Boris', 'Little'],
            ['Magdalena', 'Dickson'],
            ['Alena', 'Duke'],
            ['Lukas', 'Mcmillan'],
            ['Bronislava', 'Hicks']];

        $count = 0;
        foreach ($names as $name) {
            $username = 'x' . $name[1];
            $pn = "";
            for ($number = 0; $number < 10; $number++) {
                $pn .= mt_rand(0, 9);
            }

            DB::table('users')->insert([
                'first_name' => $name[0],
                'last_name' => $name[1],
                'username' => $username,
                'email' => $username . '@gmail.com',
                'phone_number' => $pn,
                'driver' => ($count >= 11) ? 1 : 0,
                'operator' => ($count >= 4 && $count < 11) ? 1 : 0,
                'supervisor' => ($count >= 0 && $count < 4) ? 1 : 0,
                'password' => bcrypt('test123'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            $count++;
        }
    }
}
