<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $counttteterbit = Formulir::where('status_tte', 1)->count();
        $countbelumterbit = Formulir::where('status_tte', 0)->count();

        $countselesai = Formulir::where('status', 1)->count();
        $countbelumselesai = Formulir::where('status', 0)->count();
        $count1 = Formulir::count();
        // $count2 = Formulir::select('instansi_id', \DB::raw('count(*) as count'))
        //     ->groupBy('instansi_id')
        //     ->get()->count();
        $count2 = Formulir::select('instansi_id')->groupBy('instansi_id')->get()->count();
        // $page = (7000);
        $data = Formulir::with('Organisasi')->orderBy('created_at', 'desc')->get();
        foreach ($data as $key => $formulir) {
            $formulir->line_number = $key + 1;
        }
        return view('dashboard', compact('data', 'count1', 'count2', 'countselesai', 'countbelumselesai', 'counttteterbit', 'countbelumterbit'));
    }
}
