<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function Show_List(Request $request)
    {
        $list_opd = Organisasi::all();
        $selectedOpd = $request->input('sembarang', ''); // Mengambil nilai dari form select

        $dataPendaftar = Formulir::with('organisasi')
            ->when($selectedOpd, function ($query, $selectedOpd) {
                return $query->where('instansi_id', $selectedOpd);
            })

            ->get();

        return view('rekap.list_perOPD', compact('list_opd', 'dataPendaftar', 'selectedOpd'));

        // $organisasi = Organisasi::all();
        // $formulirs = Formulir::all();
        // // Menambahkan nomor baris pada setiap elemen formulir
        // foreach ($formulirs as $key => $formulir) {
        //     $formulir->line_number = $key + 1;
        // }
        // return view('rekap.list_perOPD', compact('formulirs', 'organisasi'));
    }

    public function rekap_opd()
    {

        $countselesai = Formulir::where('status', 1)->count();
        $countbelum = Formulir::where('status', 0)->count();
        $counttteterbit = Formulir::where('status_tte', 1)->count();
        $countbelumterbit = Formulir::where('status_tte', 0)->count();
        $forms = Organisasi::withCount(['formulir'])->get();
        $forms->each(function ($form, $index) {
            $form->row_number = $index + 1;
        });
        return view('rekap.rekap_perOPD', compact('forms', 'countselesai', 'countbelum', 'counttteterbit', 'countbelumterbit'));
    }

    public function detail($id)
    {
        $datadetail = Formulir::findOrFail($id);
        return view('rekap.detail', compact('datadetail'));
    }
}
