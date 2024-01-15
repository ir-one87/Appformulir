<?php

namespace App\Http\Controllers;

use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SesiController extends Controller
{
    public function sesi_index()
    {
        return view('sesi.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ], [
            'name' => 'nama pengguna wajib diisi',
            'password' => 'password wajib diisi',
            'captcha' => 'kode captcha yang dimasukan salah',

        ]);

        $infoLogin = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin)) {
            if (Auth::user()->role == 'admin') {
                session(['name' => 'Administrator']);
                session(['tipe' => 'admin']);
                notify()->success('Selamat Datang', Auth::user()->name);
                return redirect('/dashboard')->with('success', 'Selamat Datang' . " " . Auth::user()->name);
            }
            if (Auth::user()->role == 'operator') {
                session(['name' => 'operator' . " " . Auth::user()->name]);
                session(['tipe' => 'operator']);
                session(['opd_yg_sdg_login' => Auth::user()->opd_id]);
                notify()->success('Selamat Datang Operator', Auth::user()->name);
                return redirect('/formulir');
            }
        }
        return redirect('/sesi')->with('error', 'Data yang di masukan tidak valid');
    }

    public function logout(User $user)
    {

        Auth::logout();
        session()->flush();

        return Redirect::route('formlogin');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }
}
