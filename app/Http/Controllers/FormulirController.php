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

    public function save_form(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required',
            'jabatan' => 'required',
            'instansi_id' => 'required',
            'unit_kerja' => 'required',
            'no_hp' => 'required',
            'per_email' => 'required',
            'per_sertifikat' => 'required',
            'rekomendasi' => 'required',
            'sk' => 'required',
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
}
