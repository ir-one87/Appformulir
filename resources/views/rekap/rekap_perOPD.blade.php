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
                            <th>Nama Organisasi Perangkat Daerah</th>
                            <th>Rekap Pendaftar</th>
                            {{-- <th colspan="3" class="text-center">Rekap</th> --}}
                        </tr>
                        {{-- <tr>
                            <th></th>
                            <th></th>
                            <th>Total Pendaftar</th>
                            <th>Status Pendaftaran (selesai)</th>
                            <th>Status Pendaftaran (belum selesai)</th>
                            <th>Status TTe (Terbit)</th>
                            <th>Status TTe (Belum Terbit)</th>
                        </tr> --}}
                    </thead>
                    <tbody>
                        @foreach ($forms as $opd )
                        <tr>
                            <td>{{ $opd->row_number }}</td>
                            <td>{{ $opd->nama_opd }}</td>
                            <td>{{ $opd->formulir_count }}</td>
                            {{-- <td>{{ $countselesai }}</td>
                            <td>{{ $countbelum }}</td>
                            <td>{{$counttteterbit }}</td>
                            <td>{{ $countbelumterbit }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Row end -->


@endsection