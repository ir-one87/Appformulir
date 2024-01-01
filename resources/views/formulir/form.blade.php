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
            <form action="{{ route('save_form') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap <p class="d-inline text-danger">* sesuai nama KTP</p></label>
                                <input type="text" class="form-control" placeholder="masukan nama lengkap"
                                    name="nama_lengkap">
                                @error('nama_lengkap')
                                <div class="alert alert-info">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="form-group">
                                <label>NIK / Nomor Induk Kependudukan<p class="d-inline text-danger"> *</p></label>
                                <input type="number" class="form-control" id="nik"
                                    placeholder="Masukan Nomor Kependudukan" name="nik">
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
                                <select class="form-control" name="instansi_id">
                                    <option selected value="">-- pilih OPD --</option>
                                    <option value="1">Laki - Laki</option>
                                    <option value="2">Perempuan</option>
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
                                <input type="file" class="form-control" name="per_email" accept=".pdf, .jpg, .jpeg">
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
                                <input type="file" class="form-control" name="per_sertifikat"
                                    accept=".pdf, .jpg, .jpeg">
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
                                <input type="file" class="form-control" name="rekomendasi" accept=".pdf, .jpg, .jpeg">
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
                                <input type="file" class="form-control" name="sk" accept=".pdf, .jpg, .jpeg">
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

<div class="row gutters">
    <div class="col-12">
        <div class="table-container">
            <div class="t-header">List Pendaftaran SE Per OPD</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Unit Kerja</th>
                            <th>Status Pendaftaran</th>
                            <th>Status TTe</th>
                            <th>Status Berkas</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $form )
                        <tr>
                            <td>{{ $form->line_number }}</td>
                            <td>{{ $form->nama_lengkap }}</td>
                            <td>{{ $form->jabatan }}</td>
                            <td>{{ $form->unit_kerja }}</td>
                            <td>
                                <label>
                                    @if($form->status == 1)
                                    <a href="https://mail.sulbarprov.go.id/"
                                        class="btn btn-success btn-sm w-100 text-center text-white" target="_blank">
                                        Silahkan Aktivasi
                                    </a>
                                    @else
                                    <a href="https://chat.whatsapp.com/Jo9sF6r2wIj0UrjOCfvpSR"
                                        class="btn btn-warning btn-sm w-100 text-center text-black" target="_blank">
                                        Menunggu Konfirmasi
                                    </a>
                                    @endif
                                </label>
                            </td>
                            <td>
                                <label
                                    class="btn {{ $form->status_tte == 1 ? 'btn-success btn-sm' : 'btn-warning btn-sm' }}">{{
                                    $form->status_tte == 1 ? 'Sudah Terbit' : 'Belum Terbit' }}

                                </label>
                            </td>
                            <td>
                                <label>
                                    @if($form->status_berkas == 0)
                                    <strong>Berkas Lengkap</strong>
                                    @endif
                                    @if($form->status_berkas == 1)
                                    <a href="{{ route('edit_form', $form->id) }}"
                                        class="btn btn-danger btn-sm w-100 text-center text-white" target="_blank">
                                        Upload Kembali
                                    </a>
                                    @endif
                                </label>
                                <p>{{ $form->pesan }}</p>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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