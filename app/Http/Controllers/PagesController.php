<?php

namespace App\Http\Controllers;

use App\Shift;
use App\User;
use App\UserShift;

class PagesController extends Controller
{
    public function index(){

        $users = User::all();



        return view('web.pages.index', compact('users'));
    }
}
