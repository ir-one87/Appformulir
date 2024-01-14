@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-12">
        <div class="table-container">
            <div class="t-header">List Permohonan Pendaftaran SE</div>
            <div class="table-responsive">
                <table id="copy-print-csv" class="table custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Nama Instansi</th>
                            <th>Unit Kerja</th>
                            <th>Status Pendaftaran</th>
                            <th>Status Berkas</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $form )
                        <tr>
                            <td>{{ $form->nomor_baris }}</td>
                            <td>{{ $form->nama_lengkap }}</td>
                            <td>{{ $form->jabatan }}</td>
                            <td>{{ $form->Organisasi->nama_opd}}</td>
                            <td>{{ $form->unit_kerja }}</td>
                            <td>
                                @if ($form->status==1)
                                <a href="{{ route('update_status', $form) }}" type="button"
                                    class="btn btn-success btn-sm"><i class="icon-check"></i>Selesai</a>
                                @else
                                <a href="{{ route('update_status', $form) }}" type="button"
                                    class="btn btn-danger btn-sm"><i class="icon-check"></i>Konfirmasi</a>
                                @endif
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
                            <td>
                                {{ carbon\carbon::parse($form->created_at)->format('l, d-M-Y') }}
                            </td>

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                        data-display="static" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list2"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-lg-right">
                                        <a href="{{ route('show_pdf', $form) }}" type="button" class="dropdown-item"><i
                                                class="icon-eye1"></i>
                                            Show</a>
                                        <a href="{{ route('edit_form', $form) }}" type="button" class="dropdown-item"><i
                                                class="icon-pencil"></i>
                                            Edit</a>

                                        <form id="hapusForm" action="{{ route('delete_form', $form) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="konfirmasiHapus()" class="dropdown-item"><i
                                                    class="icon-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </div>
                                </div>
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