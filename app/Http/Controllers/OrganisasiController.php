<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrganisasiController extends Controller
{
    public function sh_organisasi()
    {
        $dataopd = Organisasi::all();
        $dataopd->each(function ($dataopd, $index) {
            $dataopd->setAttribute('nomor', $index + 1);
        });
        return view('organisasi.list_opd', compact('dataopd'));
    }

    public function save_opd(Request $request)
    {
        $request->validate([
            'nama_opd' => 'required|max:100',
        ]);

        Organisasi::create([
            'nama_opd' => $request->nama_opd,
        ]);

        notify()->success('Berhasil di Simpan!');
        return Redirect::route('sh_organisasi');
    }

    public function update_opd(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama_opd' => 'required',
        ]);

        $organisasi->update([
            'nama_opd' => $request->nama_opd,
        ]);

        notify()->success('Berhasil Di Update');
        return Redirect::route('sh_organisasi');
    }

    public function delete_opd(Organisasi $organisasi)
    {
        $organisasi->delete();
        notify()->success('Berhasil Di Hapus');
        return Redirect::back();
    }
}
