<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function index()
    {
        $user = User::all();
        //$roles = Role::all();
        //return dd($roles);
        return view('admin.users.index', compact('user'));
    }

    public function edit(User $user)
   {
       $roles = Role::all();
       //return dd($roles);
        return view('admin.users.edit', compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user)->with('mensaje', 'El rol se almaceno correctamente');
    }
}
