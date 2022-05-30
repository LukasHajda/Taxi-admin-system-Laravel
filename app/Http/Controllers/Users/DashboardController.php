<?php

namespace App\Http\Controllers\Users;

use App\Drive;

class DashboardController extends AdminController
{
    public function index(){
        return view('admin.dashboard.index');
    }

    public function overview(){

        $drives = Drive::all();

        return view('admin.dashboard.overview', compact('drives'));
    }
}
