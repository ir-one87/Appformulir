<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FormulirController extends Controller
{
    public function sh_form()
    {
        $formulirs = Formulir::all();
        return view('formulir.form', compact('formulirs'));
    }


    public function list_daftar()
    {
        $formulirs = Formulir::orderBy('created_at', 'desc')->paginate(10);
        return view('formulir.list_pendaftar', compact('formulirs'));
    }


    public function save_form(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|unique:formulirs,nik|max:16',
            'jabatan' => 'required',
            'instansi_id' => 'required',
            'unit_kerja' => 'required',
            'no_hp' => 'required|max:12',
            'per_email' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
            'per_sertifikat' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
            'rekomendasi' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
            'sk' => 'required|file|mimes:pdf,jpg,jpeg|max:2048',
        ],  [
            'nama_lengkap.required' => 'nama lengkap sesuai KTP',
            'jabatan.required' => 'jabatan wajib di isi',
            'no_hp.required' => 'No Hp wajib di isi',
            'nik.required' => 'NIK wajib di isi',
            'unit_kerja.required' => 'wajib di isi',
            'per_email.mimes' => 'File harus berformat PDF JPG JPEG',
            'per_email.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'per_sertifikat.mimes' => 'File harus berformat PDF JPG JPEG',
            'per_sertfikat.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'rekomendasi.mimes' => 'File harus berformat PDF JPG JPEG',
            'rekomendasi.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'sk.mimes' => 'File harus berformat PDF JPG JPEG',
            'sk.max' => 'Ukuran file tidak boleh lebih dari 2MB.',
            'nik.unique' => 'NIK sudah ada dalam database'
        ]);
        //menyimpan file uplaod kedalam direktori
        $file = $request->file('per_email');
        $name_file = time() . "." .  $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanEmail');
        $file->move($tujuan_upload, $name_file);

        $file = $request->file('per_sertifikat');
        $name_file1 = time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanSE');
        $file->move($tujuan_upload, $name_file1);

        $file = $request->file('rekomendasi');
        $name_file2 = time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/rekomendasi');
        $file->move($tujuan_upload, $name_file2);

        $file = $request->file('sk');
        $name_file3 = time() . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/sk');
        $file->move($tujuan_upload, $name_file3);

        Formulir::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'instansi_id' => $request->instansi_id,
            'unit_kerja' => $request->unit_kerja,
            'no_hp' => $request->no_hp,
            'per_email' => $name_file,
            'per_sertifikat' => $name_file1,
            'rekomendasi' => $name_file2,
            'sk' => $name_file3
        ]);

        notify()->success('Berhasil disimpan!');
        return Redirect::route('sh_form');
    }

    public function edit_form($id)
    {
        $data = Formulir::findOrFail($id);
        return view('formulir.edit_form', compact('data'));
    }
}
