<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    public function sh_form()
    {
        return view('formulir.form');
    }
}
