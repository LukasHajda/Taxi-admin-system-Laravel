<?php

namespace App\Http\Controllers\Users;

use App\Car;
use App\Drive;
use App\Http\Requests\CreateDriveRequest;
use App\Http\Requests\UpdateDriveRequest;
use App\Shift;
use App\User;
use Illuminate\Http\Request;

class DrivesController extends AdminController
{
    public function index() {

        $drives = Drive::all();

        return view('admin.drives.index', compact('drives'));
    }

    public function create(){
        $drivers = User::where('driver', 1)->get();
        $cars = Car::all();
        $shifts = Shift::all();

        return view('admin.drives.create', compact('drivers', 'cars', 'shifts'));
    }

    public function update(UpdateDriveRequest $request, $id) {
        $drive = Drive::findOrFail($id);


        $drive->update($request->all());

        $drive->save();

        $this->_setFlashMessage($request, 'success', "Objednávka <b>$drive->place_from . ' - ' . $drive->place_to</b> je úspešne upravená.");

        return redirect()->route('drives.index');
    }

    public function edit($id){
        $drive = Drive::findOrFail($id);
        $drivers = User::where('driver', 1)->get();
        $cars = Car::all();
        $shifts = Shift::all();

        return view('admin.drives.edit', compact('drive', 'drivers', 'cars', 'shifts'));
    }

    public function delete(Request $request, $id){
        $drive = Drive::findOrFail($id);

        $this->_setFlashMessage($request, 'success', " Objednávka <b>$drive->place_from . ' - ' . $drive->place_to</b> bola vymazana");

        $drive->delete();

        return redirect()->route('drives.index');
    }

    public function store(CreateDriveRequest $request) {
        $drive = Drive::create($request->all());

        $drive->save();

        $this->_setFlashMessage($request, 'success', " Objednávka <b>$drive->place_from . ' - ' . $drive->place_to</b> bola vytvorená" );

        return redirect()->route('users.index');
    }
}
