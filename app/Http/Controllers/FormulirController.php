<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Organisasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
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
                ->get();
        } else {
            // Query with filtering by instansi_id for operators
            $data = Formulir::with(['organisasi' => function ($query) {
                $query->withCount('formulir');
            }])
                ->where('instansi_id', $opdId)
                ->orderBy('created_at', 'desc')
                ->get();
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
        $data = Formulir::all()->sortByDesc('created_at');
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


        //menyimpan file dan encryprt
        $file = $request->file('per_email');
        $name_file = time() . '_' . $request->nama_lengkap . "." . $file->getClientOriginalExtension();

        // Baca isi file
        $fileContent = file_get_contents($file);

        // Enkripsi isi file
        $encryptedContent = Crypt::encrypt($fileContent);

        // Simpan file yang sudah dienkripsi
        Storage::put("private/email/{$name_file}", $encryptedContent);

        $file = $request->file('per_sertifikat');
        $name_file1 = time() . '_' . $request->nama_lengkap . "." . $file->getClientOriginalExtension();

        // Baca isi file
        $fileContent = file_get_contents($file);

        // Enkripsi isi file
        $encryptedContent = Crypt::encrypt($fileContent);

        // Simpan file yang sudah dienkripsi
        Storage::put("private/sertifikat/{$name_file1}", $encryptedContent);


        $file = $request->file('rekomendasi');
        $name_file2 = time() . '_' . $request->nama_lengkap . "." . $file->getClientOriginalExtension();

        // Baca isi file
        $fileContent = file_get_contents($file);

        // Enkripsi isi file
        $encryptedContent = Crypt::encrypt($fileContent);

        // Simpan file yang sudah dienkripsi
        Storage::put("private/rekomendasi/{$name_file2}", $encryptedContent);

        $file = $request->file('sk');
        $name_file3 = time() . '_' . $request->nama_lengkap . "." . $file->getClientOriginalExtension();

        // Baca isi file
        $fileContent = file_get_contents($file);

        // Enkripsi isi file
        $encryptedContent = Crypt::encrypt($fileContent);

        // Simpan file yang sudah dienkripsi
        Storage::put("private/sk/{$name_file3}", $encryptedContent);



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

    public function update_form(Request $request, $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nik' => "required|max:16|unique:formulirs,nik,{$id}",
            'jabatan' => 'required',
            'instansi_id' => 'required',
            'unit_kerja' => 'required',
            'no_hp' => 'required|max:12',
            'per_email' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'per_sertifikat' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'rekomendasi' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
            'sk' => 'nullable|file|mimes:pdf,jpg,jpeg|max:2048',
        ]);

        $formulir = Formulir::findOrFail($id);
        $formulir->nama_lengkap = $request->nama_lengkap;
        $formulir->nik = $request->nik;
        $formulir->jabatan = $request->jabatan;
        $formulir->instansi_id = $request->instansi_id;
        $formulir->unit_kerja = $request->unit_kerja;
        $formulir->no_hp = $request->no_hp;

        // Fungsi untuk menangani upload dan penggantian file lama
        function handleFileUpdate($request, $formulir, $fieldName, $folder)
        {
            if ($request->hasFile($fieldName)) {
                // Hapus file lama jika ada
                if ($formulir->$fieldName) {
                    Storage::delete("private/{$folder}/" . $formulir->$fieldName);
                }

                // Simpan file baru dengan nama unik
                $file = $request->file($fieldName);
                $fileName = time() . '_' . $formulir->nama_lengkap . "." . $file->getClientOriginalExtension();

                // Baca isi file dan enkripsi
                $fileContent = file_get_contents($file);
                $encryptedContent = Crypt::encrypt($fileContent);

                // Simpan file yang sudah dienkripsi
                Storage::put("private/{$folder}/{$fileName}", $encryptedContent);

                // Simpan nama file ke database
                return $fileName;
            }
            return $formulir->$fieldName;
        }

        // Perbarui data dengan fungsi handleFileUpdate
        $formulir->per_email = handleFileUpdate($request, $formulir, 'per_email', 'email');
        $formulir->per_sertifikat = handleFileUpdate($request, $formulir, 'per_sertifikat', 'sertifikat');
        $formulir->rekomendasi = handleFileUpdate($request, $formulir, 'rekomendasi', 'rekomendasi');
        $formulir->sk = handleFileUpdate($request, $formulir, 'sk', 'sk');

        $formulir->save();

        notify()->success('Formulir berhasil diperbarui!');
        return Redirect::route('sh_form');
    }

    public function delete_form($id)
    {
        $formulir = Formulir::findOrFail($id);

        // Hapus semua file terkait
        $fields = ['per_email' => 'email', 'per_sertifikat' => 'sertifikat', 'rekomendasi' => 'rekomendasi', 'sk' => 'sk'];
        foreach ($fields as $field => $folder) {
            if ($formulir->$field) {
                Storage::delete("private/{$folder}/" . $formulir->$field);
            }
        }

        // Hapus data dari database
        $formulir->delete();

        notify()->success('Formulir berhasil dihapus!');
        return Redirect::route('sh_form');
    }


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
        return Redirect::route('list_daftar');
    }


    //menampilkan file encrypt
    public function downloadFile($filename)
    {
        try {
            // Daftar folder yang mungkin berisi file
            $folders = [
                'private/email',
                'private/sertifikat',
                'private/rekomendasi',
                'private/email'
            ];

            $filePath = null;

            // Periksa setiap folder apakah file ada
            foreach ($folders as $folder) {
                $path = "{$folder}/{$filename}";
                if (Storage::exists($path)) {
                    $filePath = $path;
                    break; // Berhenti setelah menemukan file
                }
            }

            // Jika file tidak ditemukan, kembalikan pesan error
            if (!$filePath) {
                return response()->json(['error' => 'File not found']);
            }

            // Ambil isi file terenkripsi dari storage
            $encryptedContent = Storage::get($filePath);

            // Dekripsi isi file
            $decryptedContent = Crypt::decrypt($encryptedContent);

            // Menentukan MIME type berdasarkan ekstensi file
            $mimeType = Storage::mimeType($filePath) ?? 'application/octet-stream';

            // Cek apakah file adalah PDF, jika ya, tampilkan di browser
            $disposition = str_ends_with($filename, '.pdf') ? 'inline' : 'attachment';

            // Kirim file untuk di-download atau ditampilkan
            return response($decryptedContent)
                ->header('Content-Type', $mimeType)
                ->header('Content-Disposition', "{$disposition}; filename=\"{$filename}\"");
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to process file']);
        }
    }
}
