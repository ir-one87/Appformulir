<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    public function formulir()
    {
        return $this->belongsTo(Formulir::class, 'formulir');
    }

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'organisasi');
    }
}
