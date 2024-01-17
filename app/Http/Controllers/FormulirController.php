<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Organisasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use function PHPUnit\Framework\fileExists;

class FormulirController extends Controller
{
    public function sh_form()
    {

        $opdId = session('opd_yg_sdg_login');

        if (session('tipe') == 'admin') {
            // Query without filtering by instansi_id for admin
            $data = Formulir::with(['organisasi' => function ($query) {
                $query->withCount('formulir');
            }])
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        } else {
            // Query with filtering by instansi_id for operators
            $data = Formulir::with(['organisasi' => function ($query) {
                $query->withCount('formulir');
            }])
                ->where('instansi_id', $opdId)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }


        $organisasi = Organisasi::all();

        // // Menambahkan nomor baris pada setiap elemen formulir
        foreach ($data as $key => $formulir) {
            $formulir->line_number = $key + 1;
        }
        return view('formulir.form', compact('data', 'organisasi'));
    }


    public function list_daftar()
    {
        $data = Formulir::orderBy('created_at', 'desc')->paginate(10);
        foreach ($data as $key => $number) {
            $number->nomor_baris = $key + 1;
        }
        return view('formulir.list_pendaftar', compact('data'));
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
        $name_file = Str::random(20) . "." .  $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanEmail');
        $file->move($tujuan_upload, $name_file);

        $file = $request->file('per_sertifikat');
        $name_file1 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanSE');
        $file->move($tujuan_upload, $name_file1);

        $file = $request->file('rekomendasi');
        $name_file2 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/rekomendasi');
        $file->move($tujuan_upload, $name_file2);
        // $fileContent = file_get_contents($tujuan_upload . '/' . $name_file2);
        // $base64Encoded = base64_encode($fileContent);
        // $encodedFileName1 = 'encoded_' . $name_file2 . '.txt';
        // file_put_contents($tujuan_upload . '/' . $encodedFileName1, json_encode(['encoded_pdf' => $base64Encoded]));


        $file = $request->file('sk');
        $name_file3 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/sk');
        $file->move($tujuan_upload, $name_file3);
        // //membaca konten file
        // $fileContent = file_get_contents($tujuan_upload . '/' . $name_file3);

        // // Encode ke Base64
        // $base64Encoded = base64_encode($fileContent);

        // // Simpan representasi Base64 ke dalam file teks di direktori yang sama
        // $encodedFileName = 'encoded_' . $name_file3 . '.txt';
        // file_put_contents($tujuan_upload . '/' . $encodedFileName, json_encode(['encoded_pdf' => $base64Encoded]));

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
            'sk' => $name_file3,
        ]);

        notify()->success('Berhasil disimpan!');
        return Redirect::route('sh_form');
    }

    public function edit_form($id)
    {
        $organisasi = Organisasi::all();
        $data = Formulir::findOrFail($id);
        return view('formulir.edit_form', compact('data', 'organisasi'));
    }

    public function update_form(Request $request, Formulir $formulir)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => 'required|max:16',
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

        $file_lama = [
            public_path('file_upload/permohonanEmail') . '/' . $formulir->per_email,
            public_path('file_upload/permohonanSE') . '/' . $formulir->per_sertifikat,
            public_path('file_upload/rekomendasi') . '/' . $formulir->rekomendasi,
            public_path('file_upload/sk') . '/' . $formulir->sk,
        ];
        foreach ($file_lama as $file_baru)
            if (file_exists($file_baru)) {
                unlink($file_baru);
            }

        //menyimpan file uplaod kedalam direktori
        $file = $request->file('per_email');
        $name_file = Str::random(20) . "." .  $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanEmail');
        $file->move($tujuan_upload, $name_file);

        $file = $request->file('per_sertifikat');
        $name_file1 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/permohonanSE');
        $file->move($tujuan_upload, $name_file1);

        $file = $request->file('rekomendasi');
        $name_file2 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/rekomendasi');
        $file->move($tujuan_upload, $name_file2);

        $file = $request->file('sk');
        $name_file3 = Str::random(20) . "." . $file->getClientOriginalExtension();
        $tujuan_upload = public_path('file_upload/sk');
        $file->move($tujuan_upload, $name_file3);

        $formulir->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'instansi_id' => $request->instansi_id,
            'unit_kerja' => $request->unit_kerja,
            'no_hp' => $request->no_hp,
            'per_email' => $name_file,
            'per_sertifikat' => $name_file1,
            'rekomendasi' => $name_file2,
            'sk' => $name_file3,
            'status_berkas' => $request->status_berkas == 'on' ? 1 : 0,
            'pesan' => $request->pesan
        ]);

        notify()->success('Berhasil diupdate!');
        return Redirect::route('sh_form');
    }

    public function delete_form(Formulir $formulir)
    {
        $file_lama = [
            public_path('file_upload/permohonanEmail') . '/' . $formulir->per_email,
            public_path('file_upload/permohonanSE') . '/' . $formulir->per_sertifikat,
            public_path('file_upload/rekomendasi') . '/' . $formulir->rekomendasi,
            public_path('file_upload/sk') . '/' . $formulir->sk,
        ];
        foreach ($file_lama as $file_baru)
            if (file_exists($file_baru)) {
                unlink($file_baru);
            }

        $formulir->delete();
        notify()->success('Berhasil dihapus!');
        return Redirect::back();
    }

    // public function viewPdf($encodedFileName)
    // {
    //     $filePath = public_path('file_upload/rekomendasi' . $encodedFileName);

    //     if (file_exists($filePath)) {
    //         $jsonContent = file_get_contents($filePath);
    //         $data = json_decode($jsonContent, true);

    //         if (isset($data['encoded_pdf'])) {
    //             $base64Encoded = $data['encoded_pdf'];

    //             // Decode Base64 back to binary data
    //             $pdfContent = base64_decode($base64Encoded);

    //             // Menyajikan file PDF langsung ke browser
    //             return Response::make($pdfContent, 200, [
    //                 'Content-Type' => 'application/pdf',
    //                 'Content-Disposition' => 'inline; filename="file.pdf"',
    //             ]);
    //         }
    //     }

    //     return abort(404);
    // }

    public function show_pdf($id)
    {
        $dataForm = Formulir::findOrFail($id);
        return view('formulir.showpdf', compact('dataForm'));
    }


    public function update_status($id)
    {
        $data = Formulir::find($id);

        if ($data->status == 0) {
            $data->update([
                'status' => 1
            ]);
        } else {
            $data->update([
                'status' => 0
            ]);
        }

        return Redirect::back();
    }

    public function status_tte($id)
    {
        $data = Formulir::find($id);

        if ($data->status_tte == 0) {
            $data->update([
                'status_tte' => 1
            ]);
        } else {
            $data->update([
                'status_tte' => 0
            ]);
        }

        return Redirect::back();
    }

    public function status_tolak(Request $request, $id)
    {
        $data = Formulir::find($id);
        if ($data->status_berkas == 0) {
            $data->update([
                'status_berkas' => 1,
                'pesan' => $request->pesan

            ]);
        }
        notify()->warning('berkas telah di verfikasi');
        return Redirect::route('list_daftar');
    }
    public function status_verifikasi(Request $request, $id)
    {
        $data = Formulir::find($id);
        if ($data->status_berkas == 1) {
            $data->update([
                'status_berkas' => 0,
                'pesan' => $request->pesan

            ]);
        }

        return Redirect::back();
    }
}
