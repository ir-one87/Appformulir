@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <!-- data Siswa -->
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Formulir Pendaftaran SE</h3>
                </div>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap <p class="d-inline text-danger">* sesuai nama KTP</p></label>
                                <input type="text" class="form-control" placeholder="masukan nama lengkap"
                                    name="nama_lengkap">
                                @error('nama_lengkap')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>NIK / Nomor Induk Kependudukan<p class="d-inline text-danger"> *</p></label>
                                <input type="number" class="form-control" placeholder="Masukan Nomor Kependudukan"
                                    name="nik">
                                @error('nik')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Jabatan<p class="d-inline text-danger"> *
                                    </p></label>
                                <input type="text" class="form-control" placeholder="masukan nama jabatan"
                                    name="jabatan">
                                @error('jabatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Nama Instansi<p class="d-inline text-danger"> *</p>
                                </label>
                                <select class="form-control" name="jenis_kelamin">
                                    <option selected value="">-- pilih OPD --</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit Kerja <p class="d-inline text-danger"> *</p></label>
                                <input type="text" class="form-control" placeholder="masukan unit kerja"
                                    name="unit_kerja">
                                @error('unit_kerja')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>No Hp/Whatsapp <p class="d-inline text-danger">*</p></label>
                                <input type="number" class="form-control" name="no_hp">
                                @error('no_hp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-title mt-4">
                            <h3>Upload Berkas</h3>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Permohonan Email Dinas <p class="d-inline text-danger">*</p></label>
                                <input type="file" class="form-control" name="foto" accept=".pdf, .jpg, .jpeg">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    *) jenis file yang diupload : jpg, jpeg. ukuran maks 2 Mb
                                </small>
                                @error('per_email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Permohonan Penerbitan Sertifikat<p class="d-inline text-danger">*</p></label>
                                <input type="file" class="form-control" name="file_form" accept=".pdf, .jpg, .jpeg">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    *) jenis file yang diupload : jpg, jpeg. ukuran maks 2 Mb
                                </small>
                                @error('per_sertifikat')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Rekomendasi<p class="d-inline text-danger">*</p></label>
                                <input type="file" class="form-control" name="file_form" accept=".pdf, .jpg, .jpeg">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    *) jenis file yang diupload : jpg, jpeg. ukuran maks 2 Mb
                                </small>
                                @error('rekomendasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>SK Jabatan / Pengangkatan<p class="d-inline text-danger">*</p></label>
                                <input type="file" class="form-control" name="file_form" accept=".pdf, .jpg, .jpeg">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    *) jenis file yang diupload : jpg, jpeg. ukuran maks 2 Mb
                                </small>
                                @error('rekomendasi')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-dark" type="button"><i class="icon-rotate-ccw"></i> Kembali</button>
                            <button class="btn btn-primary" type="submit"><i class="icon-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- end data Orang Tua Siswa -->
    </div>
</div>

<!-- Row end -->

@endsection