<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->foreignId('instansi_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nik');
            $table->string('jabatan');
            $table->string('unit_kerja');
            $table->string('no_hp');
            $table->string('per_email');
            $table->string('per_sertifikat');
            $table->string('rekomendasi');
            $table->string('sk');
            $table->boolean('status')->default(false);
            $table->boolean('status_berkas')->default(false);
            $table->boolean('status_tte')->default(false);
            $table->text('pesan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulirs');
    }
};
