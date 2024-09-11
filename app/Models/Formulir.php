<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Formulir extends Model
{
    use HasFactory;

    protected $fillable = ['nama_lengkap', 'nik', 'instansi_id', 'jabatan', 'unit_kerja', 'no_hp', 'per_email', 'per_sertifikat', 'rekomendasi', 'sk', 'status', 'status_berkas', 'status_tte', 'pesan'];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'instansi_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'opd_id');
    }

    // Mutator untuk mengenkripsi NIK saat disimpan
    public function setNikAttribute($value)
    {
        $this->attributes['nik'] = Crypt::encryptString($value);
    }

    // Accessor untuk mendekripsi NIK saat diakses
    public function getNikAttribute($value)
    {
        return Crypt::decryptString($value);
    }

    // Mutator untuk mengenkripsi no_hp saat disimpan
    public function setNoHpAttribute($value)
    {
        $this->attributes['no_hp'] = Crypt::encryptString($value);
    }

    // Accessor untuk mendekripsi no_hp saat diakses
    public function getNoHpAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
