@extends('layouts.main')

@section('content')
<!-- Row start -->
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
                            <th>Nama Instansi</th>
                            <th>Unit Kerja</th>
                            <th>Status Pendaftaran</th>
                            <th>Status TTe</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formulirs as $form )
                        <tr>
                            <td>1</td>
                            <td>{{ $form->nama_lengkap }}</td>
                            <td>{{ $form->jabatan }}</td>
                            <td>{{ $form->instansi_id }}</td>
                            <td>{{ $form->unit_kerja }}</td>
                            <td>
                                @if ($form->status==1)
                                <a href="#" type="button" class="btn btn-secondary btn-sm"><i
                                        class="fas fa-check"></i>Aktivasi Akun</a>
                                @else
                                <a href="#" type="button" class="btn btn-danger btn-sm"><i
                                        class="fas fa-check"></i>Konfirmasi</a>
                                @endif
                            </td>
                            <td>
                                @if ($form->status_tte==1)
                                <a href="#" type="button" class="btn btn-warning btn-sm"><i
                                        class="fas fa-check"></i>Terbit</a>
                                @else
                                <a href="#" type="button" class="btn btn-info btn-sm"><i class="fas fa-check"></i>Belum
                                    Terbit</a>
                                @endif
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
                                        <a href="#" type="button" class="dropdown-item"><i class="icon-eye1"></i>
                                            Show</a>
                                        <a href="#" type="button" class="dropdown-item"><i class="icon-pencil"></i>
                                            Edit</a>

                                        <form id="hapusForm" action="#" method="POST">
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