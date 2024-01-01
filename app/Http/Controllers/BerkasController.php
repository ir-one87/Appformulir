<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function PHPSTORM_META\map;

class BerkasController extends Controller
{
    public function sh_berkas()
    {
        $berkas = Berkas::all();
        // Tambahkan nomor baris pada data
        $berkas->each(function ($berkas, $index) {
            $berkas->setAttribute('nomor', $index + 1);
        });
        return view('berkas.list_berkas', compact('berkas'));
    }

    public function unduh_berkas()
    {
        $berkas = Berkas::all();
        // Tambahkan nomor baris pada data
        $berkas->each(function ($berkas, $index) {
            $berkas->setAttribute('nomor', $index + 1);
        });
        return view('berkas.unduh_berkas', compact('berkas'));
    }

    public function save_berkas(Request $request)
    {
        $request->validate([
            'nama_berkas' => 'required|max:50',
            'file_berkas' => 'required|file|mimes:pdf',
        ], [
            'nama_berkas.required' => 'nama wajib di isi',
            'file_berkas.mimes' => 'file upload di izinkan hanya pdf',
        ]);

        $files = $request->file('file_berkas');
        $name_file = time() . '_' . $request->nama_berkas . '.' . $files->getClientOriginalExtension();
        $tujuan_upload = ('berkas_upload');
        $files->move($tujuan_upload, $name_file);

        Berkas::create([
            'nama_berkas' => $request->nama_berkas,
            'file_berkas' => $name_file
        ]);

        notify()->success('Berhasil Disimpan');
        return Redirect::route('sh_berkas');
    }

    public function update_berkas(Request $request, Berkas $berkas)
    {
        $request->validate([
            'nama_berkas' => 'required|max:50',
            'file_berkas' => 'required|file|mimes:pdf',
        ], [
            'nama_berkas.required' => 'nama wajib di isi',
            'file_berkas.mimes' => 'file upload di izinkan hanya pdf',
        ]);

        $file_berkas_lama = public_path('berkas_upload') . '/' . $berkas->file_berkas;
        if (file_exists($file_berkas_lama)) {
            unlink($file_berkas_lama);
        }

        $files = $request->file('file_berkas');
        $name_file = time() . '_' . $request->nama_berkas . '.' . $files->getClientOriginalExtension();
        $tujuan_upload = ('berkas_upload');
        $files->move($tujuan_upload, $name_file);


        $berkas->update([
            'nama_berkas' => $request->nama_berkas,
            'file_berkas' => $name_file
        ]);

        notify()->success('Data Berhasil diUpdate !');
        return Redirect::route('sh_berkas');
    }

    public function delete_berkas(Berkas $berkas)
    {
        $file_berkas_lama = public_path('berkas_upload') . '/' . $berkas->file_berkas;
        if (file_exists($file_berkas_lama)) {
            unlink($file_berkas_lama);
        }

        $berkas->delete();
        notify()->success('Oke Berhasil Di Hapus!');
        return Redirect::back();
    }
}
