@extends('layouts.main')

@section('content')
{{-- @include('layouts.loading') --}}
<!-- Row start -->
<div class="row gutters">
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: rgb(113, 176, 242);">
            <div class="info-icon">
                <i class="icon-user"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $count1 }}</h3>
                <p class="text-primary">Rekap Pendaftaran SE</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: rgb(253, 253, 43);">
            <div class="info-icon">
                <i class="icon-home"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $count2 }}</h3>
                <p class="text-primary">Rekap OPD yang Mendaftar</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: rgb(52, 250, 55);">
            <div class="info-icon">
                <i class="icon-beenhere"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $countselesai }}</h3>
                <p class="text-primary">Status Pendaftaran (Selesai)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: #db5019;">
            <div class="info-icon">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $countbelumselesai }}</h3>
                <p class="text-primary">Status Pendaftaran (Belum Selesai)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: rgb(52, 250, 55);">
            <div class="info-icon">
                <i class="icon-style"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $counttteterbit }}</h3>
                <p class="text-primary">Status TTe (Sudah Terbit)</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-12">
        <div class="info-stats4" style="background-color: rgb(29, 154, 222);">
            <div class="info-icon">
                <i class="icon-activity"></i>
            </div>
            <div class="sale-num">
                <h3>{{ $countbelumterbit }}</h3>
                <p class="text-primary">Status TTe (Belum Terbit)</p>
            </div>
        </div>
    </div>
</div>
<!-- Row end -->
<!-- Row start -->
<div class="row gutters">
    <div class="col-12">
        <div class="table-container">
            <div class="t-header">List Permohonan Pendaftaran SE</div>
            <div class="table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Nama Instansi</th>
                            <th>Unit Kerja</th>
                            <th>Tanggal Upload</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $form )
                        <tr>
                            <td>{{ $form->line_number }}</td>
                            <td>{{ $form->nama_lengkap }}</td>
                            <td>{{ $form->jabatan }}</td>
                            <td>{{ $form->Organisasi->nama_opd}}</td>
                            <td>{{ $form->unit_kerja }}</td>
                            <td>
                                {{ carbon\carbon::parse($form->created_at)->format('l, d-M-Y') }}
                            </td>
                            <td>
                                <div>
                                    <a href="{{ route('show_pdf', $form) }}" type="button" class="btn btn-info"><i
                                            class="icon-eye1"></i> show detail</a>
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


@endsection