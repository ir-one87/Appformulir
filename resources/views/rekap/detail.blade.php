@extends('layouts.main')

@section('content')
<div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
        <div class="card">
            <h5 class="card-header" style="background: rgb(51, 175, 248)"><i class="icon-list2"></i> Detail Informasi
                Pendaftaran SE
            </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Detail Informasi Pendaftaran</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <th scope="row">:</th>
                                    <td>{{ $datadetail->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jabatan</th>
                                    <th scope="row">:</th>
                                    <td>{{ $datadetail->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Instansi</th>
                                    <th scope="row">:</th>
                                    <td>{{ $datadetail->organisasi->nama_opd }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Unit Kerja</th>
                                    <th scope="row">:</th>
                                    <td>{{ $datadetail->unit_kerja }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Detail Berkas</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Permohoanan Email Dinas</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/permohonanEmail/' . $datadetail->per_email) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Permohoanan Penerbitan Sertifikat</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/permohonanSE/' . $datadetail->per_sertifikat) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Form Rekomendasi</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/rekomendasi/' . $datadetail->rekomendasi) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a>

                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">SK Jabatan / Pengangkatan</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/sk/' . $datadetail->sk) }}" target="_blank"
                                            class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('ShowList') }}" class="btn btn-dark"><i class="icon-rewind"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>

@endsection