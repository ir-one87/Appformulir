<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_opd'];

    public function formulir()
    {
        return $this->hasMany(Formulir::class, 'instansi_id');
    }

    public function User()
    {
        return $this->hasMany(User::class, 'opd_id');
    }
}
