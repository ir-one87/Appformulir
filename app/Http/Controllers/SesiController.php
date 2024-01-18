<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
            } elseif (Auth::user()->role == 'operator') {
                session(['name' => 'operator' . " " . Auth::user()->name]);
                session(['tipe' => 'operator']);
                session(['opd_yg_sdg_login' => Auth::user()->opd_id]);
                notify()->success('Selamat Datang Operator', Auth::user()->name);
                return redirect('/formulir');
            }
        } else {
            return redirect('/')->with('error', 'Data yang di masukan tidak valid');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();

        return Redirect::route('formlogin');
    }

    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }

    public function formRegis()
    {
        $opd = Organisasi::all();
        return view('sesi.formregis', compact('opd'));
    }

    public function RegisAkun(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'role' => 'required',
            'opd_id' => 'required'
        ], [
            'name.required' => 'Nama User wajid di isi',
            'email.required' => 'masukan email yang valid',
            'password' => 'Password wajib di isi',
            'role' => 'Wajib dipilih',
            'opd_id' => 'pilih OPD'
        ]);

        $infoakun = [
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'email' => $request->email,
            'opd_id' => $request->opd_id
        ];

        User::create($infoakun);
        notify()->success('Berhasil Dibuat');
        return redirect('/pengguna');
    }


    public function delete_akun($id)
    {
        try {
            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Jika pengguna ditemukan, hapus dan beri pemberitahuan
            $user->delete();
            notify()->success('Berhasil dihapus!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Tangkap pengecualian jika pengguna tidak ditemukan
            notify()->error('Pengguna tidak ditemukan!');
        }

        // Kembalikan ke halaman sebelumnya
        return redirect()->back();
        // // Temukan pengguna berdasarkan ID
        // $user = User::findOrFail($id);

        // // Pastikan pengguna ditemukan sebelum dihapus
        // if ($user) {
        //     $user->delete();
        //     notify()->success('Berhasil dihapus!');
        // } else {
        //     notify()->error('Pengguna tidak ditemukan!');
        // }

        // // Kembalikan ke halaman sebelumnya
        // return redirect()->back();
    }
}
