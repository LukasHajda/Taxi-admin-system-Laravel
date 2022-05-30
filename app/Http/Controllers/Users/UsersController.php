<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Traits\UploadTrait;
use App\User;
use Illuminate\Http\Request;

class UsersController extends AdminController
{

    use UploadTrait;

    // DONE
    public function index(){
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    // DONE
    public function create(){
        return view('admin.users.create');
    }

    // DONE
    public function update(UpdateUserRequest $request, $id) {
        $user = User::findOrFail($id);

        $user->update($request->all());

        $this->addRole($user, $request->role);

        $user->save();

        $this->upload_image($request,'image', 'users', $user, 'profile');
        $this->_setFlashMessage($request, 'success', "Zamestnanec <b>$user->username</b> je úspešne upravený.");

        return redirect()->route('users.index');
    }

    // DONE
    public function edit($id){
        $user = User::findOrFail($id);

        $givenRole = ($user->supervisor == 1) ? "Supervisor" : (($user->operator == 1) ? "Operátor" : "Vodič");

        return view('admin.users.edit', compact('user', 'givenRole'));
    }

    // DONE
    public function delete(Request $request, $id){
        $user = User::findOrFail($id);

        $this->_setFlashMessage($request, 'success', " Zamestnanec <b>$user->username</b> bol vymazaný");

        $user->delete();

        return redirect()->route('users.index');
    }

    // DONE
    public function store(CreateUserRequest $request) {
        $user = User::create($request->all());

        $pass  = $request->password;
        $user->password = bcrypt($pass);

        $this->addRole($user, $request->role);

        $this->upload_image($request,'image', 'users', $user, 'profile');

        $user->save();

        $this->_setFlashMessage($request, 'success', " Zamestnanec <b>$user->username</b> bol vytvoreny" );

        return redirect()->route('users.index');
    }

    /**
     * @param $user 'user who will be updated'
     * @param $role 'what role will he get'
     */
    private function addRole($user, $role) {
        $user->driver = ( strcmp($role, "Vodič") == 0 ) ? 1 : 0;
        $user->operator = ( strcmp($role, "Operátor") == 0 ) ? 1 : 0;
        $user->supervisor = ( strcmp($role, "Supervisor") == 0 ) ? 1 : 0;
    }
}


