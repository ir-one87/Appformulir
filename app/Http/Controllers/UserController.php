<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function user_opd()
    {

        $users = User::all();
        $users->transform(function ($user, $key) {
            $user->index = $key + 1;
            return $user;
        });
        return view('sesi.list_akun', compact('users'));
    }

    public function edit_akun($id)
    {
        $opd = Organisasi::all();
        $akuns = User::findOrFail($id);
        return view('sesi.formEdit', compact('akuns', 'opd'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:25',
            'password' => 'required',
            'email' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'role' => $request->role,
            'opd_id' => $request->opd_id
        ]);

        notify()->success('berhasil diupdate');
        return Redirect::route('pengguna');
    }
}
