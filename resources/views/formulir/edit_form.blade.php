@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <!-- formulir pendaftaran -->
    <div class="col-12">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Formulir Pendaftaran SE</h3>
                </div>
            </div>
            <form action="{{ route('update_form', $data) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap <p class="d-inline text-danger">* sesuai nama KTP</p></label>
                                <input type="text" class="form-control" placeholder="masukan nama lengkap"
                                    name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                                @error('nama_lengkap')
                                <div class="alert alert-info">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>NIK / Nomor Induk Kependudukan<p class="d-inline text-danger"> *</p></label>
                                <input type="number" class="form-control" id="nik"
                                    placeholder="Masukan Nomor Kependudukan" name="nik" value="{{ $data->nik }}">
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
                                    name="jabatan" value="{{ $data->jabatan }}">
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
                                <select class="form-control" name="instansi_id">
                                    <option selected value="{{ $data->instansi_id }}">{{ $data->organisasi->nama_opd }}
                                    </option>
                                    @foreach($organisasi as $item)
                                    <option value="{{ $data->instansi_id }}">{{ $item->nama_opd}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit Kerja <p class="d-inline text-danger"> *</p></label>
                                <input type="text" class="form-control" placeholder="masukan unit kerja"
                                    name="unit_kerja" value="{{ $data->unit_kerja }}">
                                @error('unit_kerja')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>No Hp/Whatsapp <p class="d-inline text-danger">*</p></label>
                                <input type="number" class="form-control" name="no_hp" value="{{ $data->no_hp }}">
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
                                <input type="file" class="form-control" name="per_email" accept=".pdf, .jpg, .jpeg"
                                    value="{{ $data->per_email }}">
                                {{-- @if(isset($data->per_email))
                                <!-- Pastikan variabel $oldFileName sudah di-set di controller -->
                                <p>File Lama: {{ ($data->per_email)}}</p>
                                @endif --}}
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
                                <input type="file" class="form-control" name="per_sertifikat" accept=".pdf, .jpg, .jpeg"
                                    value="{{ $data->per_sertfikat }}">
                                {{-- @if(isset($data->per_sertifikat))
                                <!-- Pastikan variabel $oldFileName sudah di-set di controller -->
                                <p>File Lama: {{ ($data->per_sertifikat)}}</p>
                                @endif --}}
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
                                <input type="file" class="form-control" name="rekomendasi" accept=".pdf, .jpg, .jpeg"
                                    value="{{ $data->rekomendasi }}">
                                {{-- @if(isset($data->rekomendasi))
                                <!-- Pastikan variabel $oldFileName sudah di-set di controller -->
                                <p>File Lama: {{ ($data->rekomendasi)}}</p>
                                @endif --}}
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
                                <input type="file" class="form-control" name="sk" accept=".pdf, .jpg, .jpeg"
                                    value="{{ $data->sk }}">
                                {{-- @if(isset($data->sk))
                                <!-- Pastikan variabel $oldFileName sudah di-set di controller -->
                                <p>File Lama: {{ ($data->sk)}}</p>
                                @endif --}}
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    *) jenis file yang diupload : jpg, jpeg. ukuran maks 2 Mb
                                </small>
                                @error('sk')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-2">
                                <label>
                                    <input type="hidden" name="status" value="0" />
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-2">
                                <label>
                                    <input type="hidden" name="status_berkas" value="0" />
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-2">
                                <label>
                                    <input type="hidden" name="status_tte" value="0" />
                                </label>
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
        <!-- end data formulir -->
    </div>
</div>


<!-- Row end -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var previousValue = '';

        function checkDuplicate() {
            var currentValue = document.getElementById('nik').value;

            if (currentValue === previousValue) {
                alert('Inputan ganda terdeteksi!');
            }

            previousValue = currentValue;
        }

        document.getElementById('nik').addEventListener('input', checkDuplicate);
    });
</script>

@endsection