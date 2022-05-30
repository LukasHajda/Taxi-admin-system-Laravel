<?php

namespace App\Http\Controllers\Users;

use App\Car;
use App\Http\Requests\CreateCarRequest;
use App\Http\Requests\UpdateCarRequest;
use Illuminate\Http\Request;

class CarsController extends AdminController
{
    public function index(){
        $cars = Car::all();

        return view('admin.cars.index', compact('cars'));
    }

    public function create(){
        return view('admin.cars.create');
    }

    public function update(UpdateCarRequest $request, $id) {
        $car = Car::findOrFail($id);

        $car->update($request->all());

        $car->save();

        $this->_setFlashMessage($request, 'success', "Vozidlo <b>$car->brand . ' ' . $car->model . ' ŠPZ: ' . $car->license_number</b> je úspešne upravené.");

        return redirect()->route('cars.index');
    }

    public function edit($id){
        $car = Car::findOrFail($id);

        return view('admin.cars.edit', compact('car'));
    }

    public function delete(Request $request, $id){
        $car = Car::findOrFail($id);

        $this->_setFlashMessage($request, 'success', " Vozidlo <b>$car->brand . ' ' . $car->model . ' ŠPZ: ' . $car->license_number</b> bolo vymazané");

        $car->delete();

        return redirect()->route('cars.index');
    }

    public function store(CreateCarRequest $request) {
        $car = Car::create($request->all());

        $this->_setFlashMessage($request, 'success', " Vozidlo <b>$$car->brand . ' ' . $car->model . ' ŠPZ: ' . $car->license_number</b> bolo vytvorené" );

        return redirect()->route('cars.index');
    }
}
