<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserNameAjaxRequest;
use App\User;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getUserName(UserNameAjaxRequest $request) {
        $last_name = $request->last_name == null ? "" : $request->last_name;

        $username = User::where('last_name', $last_name)->orderBy('created_at', 'desc')->first();

        if (!$username) {
            return response()->json(array('username'=> 'x' . $last_name), 200);
        }

        if ($username == "") {
            return response()->json(array('username'=> ""), 200);
        }

        $number = preg_match("/([0-9]+)/", $username);

        if (!$number) {
            return response()->json(array('username'=> 'x' . $last_name), 200);
        } else {
            $num = intval($number[0][0]);
            $num += 1;
            $result = 'x' . $last_name . $num;
            return response()->json(array('username'=> $result), 200);
        }

    }

    public function getDonutData() {

        $drives = DB::select("SELECT place_from AS Place, COUNT(*) AS Amount FROM `drives` GROUP BY place_from ORDER BY Amount DESC LIMIT 5");

        return response()->json(array('drives'=> $drives), 200);
    }

    public function getBestDrivers() {
        $bestDrivers = DB::select("SELECT CONCAT(users.first_name, ' ', users.last_name) as Name, SUM(salary) as Summary FROM `drives` Inner join users on users.id = drives.driver_id GROUP by Name ORDER BY Summary DESC LIMIT 7");

        return response()->json(array('drivers'=> $bestDrivers), 200);

    }

    public function getMostUsedCars() {
        $cars = DB::select("SELECT CONCAT(cars.brand, ' ', cars.model) AS Car, COUNT(*) AS Amount FROM `drives` INNER JOIN cars ON cars.id = drives.car_id GROUP BY Car");

        return response()->json(array('cars'=> $cars), 200);
    }
}
