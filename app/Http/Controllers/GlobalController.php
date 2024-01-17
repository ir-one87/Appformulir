<?php

namespace App\Http\Controllers;

use App\Models\Organisasi;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function nama_opd($id)
    {
        $data = Organisasi::find($id);
        return $data->nama_opd;
    }
}
