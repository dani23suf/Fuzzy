<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        //  untuk menampilkan list user dengan membawa data user  dengan roles nya
        $users =  User::get();
        // dd($users);
        return view('hak_akses.list', [
            "title" => "List User"
        ], compact('users'));
    }

    public function edit($id)
    {
        $this->authorize('isAdmin');
        $user  = User::find($id);
        $roles = Role::all();
        return view('hak_akses.edit', [
            "title" => "Edit User"
        ], compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('isAdmin');
        // mencari data di user sesuai id
        $user = User::find($id);

        // memvalidasi data inputan 
        $validatedData = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'kota' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required'],

        ]);


        $user->name = $request->name;
        $user->username = $request->username;
        $user->kota = $request->kota;
        $user->tanggal_lahir = $request->tanggal_lahir;


        if ($request->role) 
        {
            $user->role_id = $request->role;
        }

        $user->update();


        return redirect()->route('list.user')->with('success', 'Data User Berhasil Di Update');
    }

    public function deleteUser(Request $request, $id)
    {
        $this->authorize('isAdmin');
        // mencari user berdasarkan id 
        $user = User::find($id);

        // lalu delete user berdasarkan id

        $user->delete();

        // redirect ke list.user

        return redirect(route('list.user'))->with('success', 'User deleted!');
    }

}
