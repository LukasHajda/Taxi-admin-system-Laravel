<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests\CreateShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Shift;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShiftsController extends AdminController
{
    public function index() {
        $shifts = Shift::all();

        return view('admin.shifts.index', compact('shifts'));
    }

    public function create() {
        $drivers = User::where('driver', 1)->get();
        $supervisors = User::where('supervisor', 1)->get();
        $operators = User::where('operator', 1)->get();
        $allShifts = Shift::all();
        return view('admin.shifts.create', compact('drivers', 'supervisors', 'operators', 'allShifts'));
    }

    public function update(UpdateShiftRequest $request, $id) {

        $shift = Shift::findOrFail($id);

        $dt = Carbon::now();
        $time = $dt->toTimeString();

        $date = explode("-", $request->started_at);

        $shift->started_at = ($date[2] . '-' . $date[1] . '-' . $date[0] . '-' . $time);

        $shift->users()->detach();
        $shift->users()->attach($request->drivers);
        $shift->users()->attach($request->operators);
        $shift->users()->attach($request->supervisor);


        $shift->save();

        $this->_setFlashMessage($request, 'success', "Smena <b>$shift->id </b> je úspešne upravená.");

        return redirect()->route('shifts.index');
    }

    public function edit($id){
        $shift = Shift::findOrFail($id);
        $drivers = User::where('driver', 1)->get();
        $supervisors = User::where('supervisor', 1)->get();
        $operators = User::where('operator', 1)->get();
        $allShifts = Shift::all();

        return view('admin.shifts.edit', compact('shift', 'drivers', 'supervisors', 'operators', 'allShifts'));
    }

    public function delete(Request $request, $id){
        $shift = Shift::findOrFail($id);

        $this->_setFlashMessage($request, 'success', " Smena <b>$shift->id</b> bola vymazaná");

        $shift->delete();

        return redirect()->route('shifts.index');
    }

    public function store(CreateShiftRequest $request) {

//        dd($request);
        $newShift = new Shift;

        $dt = Carbon::now();
        $time = $dt->toTimeString();

        $date = explode("-", $request->started_at);

        $newShift->started_at = ($date[2] . '-' . $date[1] . '-' . $date[0] . '-' . $time);

        $newShift->save();

        $newShift->users()->attach($request->drivers);
        $newShift->users()->attach($request->operators);
        $newShift->users()->attach($request->supervisor);

        $newShift->save();

        $this->_setFlashMessage($request, 'success', " Smena <b>$newShift->started_at</b> je vytvorená" );

        return redirect()->route('shifts.index');
    }
}
