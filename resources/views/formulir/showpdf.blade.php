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
                                    <td>{{ $dataForm->nama_lengkap }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jabatan</th>
                                    <th scope="row">:</th>
                                    <td>{{ $dataForm->jabatan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Instansi</th>
                                    <th scope="row">:</th>
                                    <td>{{ $dataForm->organisasi->nama_opd }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Unit Kerja</th>
                                    <th scope="row">:</th>
                                    <td>{{ $dataForm->unit_kerja }}</td>
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
                                    <td><a href="{{ asset('file_upload/permohonanEmail/' . $dataForm->per_email) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Permohoanan Penerbitan Sertifikat</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/permohonanSE/' . $dataForm->per_sertifikat) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Form Rekomendasi</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/rekomendasi/' . $dataForm->rekomendasi) }}"
                                            target="_blank" class="btn btn-primary btn-sm">Lihat Berkas</a>

                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">SK Jabatan / Pengangkatan</th>
                                    <th scope="row">:</th>
                                    <td><a href="{{ asset('file_upload/sk/' . $dataForm->sk) }}" target="_blank"
                                            class="btn btn-primary btn-sm">Lihat Berkas</a></td>
                                </tr>
                                <tr>
                                    <th scope="row">Verifikasi Berkas</th>
                                    <th scope="row">:</th>
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#verifikasi"><i class="icon-check"></i>
                                            Verifikasi
                                        </button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a href="{{ route('list_daftar') }}" class="btn btn-dark"><i class="icon-rewind"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
<!-- Main container end -->
<!-- Modal -->
<div class="modal fade" id="verifikasi" tabindex="-1" role="dialog" aria-labelledby="customModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background: rgb(2, 134, 248)">
                <h5 class="modal-title" id="customModalLabel">Form Validasi Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('status_tolak', $dataForm) }}" method="POST">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="mt-4">
                            <textarea class="form-control" id="message" placeholder="pesan validasi berkas" name="pesan"
                                rows="3">{{ $dataForm->pesan }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-danger" value="tolak">Tolak</button>
                    <button type="submit" class="btn btn-primary"
                        formaction="{{ route('status_verifikasi', $dataForm) }}" formmethod="POST" @csrf
                        @method('patch') Verifikasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    var textarea = document.getElementById('message');

    textarea.addEventListener('input', function () {
        addLineNumbers(textarea);
    });

    // Inisialisasi saat halaman dimuat
    addLineNumbers(textarea);
});

function addLineNumbers(textarea) {
    var lines = textarea.value.split('\n');
    for (var i = 0; i < lines.length; i++) {
        // Hapus nomor yang sudah ada jika ada sebelum menambahkan nomor baru
        lines[i] = lines[i].replace(/^\d+\.\s/, '');
        // Tambahkan nomor baru pada awal setiap baris
        if (lines[i].trim() !== '') {
            lines[i] = (i + 1) + '. ' + lines[i];
        }
    }
    textarea.value = lines.join('\n');
}
</script>
@endsection