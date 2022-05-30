<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email', 'admin')->count() > 0){
            DB::table('users')->insert([
                'username' => 'admin',
                'first_name' => 'admin',
                'last_name' => 'admin',
                'email' => 'admin',
                'password' => bcrypt('admin'),
                'admin' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
