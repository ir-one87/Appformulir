<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_opd()
    {
        $users = User::paginate(20);
        $users->transform(function ($user, $key) {
            $user->index = $key + 1;
            return $user;
        });
        return view('sesi.list_akun', compact('users'));
    }
}
