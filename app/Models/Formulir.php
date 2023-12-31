<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulir extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap', 'nik', 'instansi_id', 'jabatan', 'unit_kerja', 'no_hp', 'per_email', 'per_sertifikat', 'rekomendasi', 'sk', 'status', 'status_berkas', 'status_tte', 'pesan'];
}
