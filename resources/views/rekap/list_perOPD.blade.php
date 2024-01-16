@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Daftar Nama Organisasi Pemerinta Daerah</div>
            </div>
            <form action="{{ route('ShowList') }}" method="get">
                @csrf
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-4 col-lg col-md-4 col-sm-4 col-12">
                            <div class="form-group">
                                <label for="">Nama Instansi / OPD</label>
                                <select name="sembarang" class="form-select form-select-sm"
                                    aria-label=".form-select-sm example">
                                    <option selected> -- Pilih OPD -- </option>
                                    @foreach ($list_opd as $list )
                                    <option value="{{ $list->id }}" {{ $list->id == $selectedOpd ? 'selected' : '' }}>{{
                                        $list->nama_opd
                                        }}
                                    </option>
                                    @endforeach
                                </select>
                                {{-- <select class="form-control" name="instansi_id">
                                    <option selected value="">-- pilih OPD --</option>
                                    @foreach ($organisasi as $opd)
                                    <option value="{{ $opd->id }}">{{ $opd->nama_opd }}</option>
                                    @endforeach
                                </select> --}}
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i> Cari</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
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
                            <th>Status TTe</th>
                            <th>Tanggal Upload</th>
                            <th>Berkas Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPendaftar as $key => $pendaftar )
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pendaftar->nama_lengkap }}</td>
                            <td>{{ $pendaftar->jabatan }}</td>
                            <td>{{ $pendaftar->Organisasi->nama_opd }}</td>
                            <td>{{ $pendaftar->unit_kerja }}</td>
                            <td>
                                @if ($pendaftar->status_tte==1)
                                <a href="{{ route('status_tte', $pendaftar) }}" type="button"
                                    class="btn btn-success btn-sm"><i class="icon-check"></i> Terbit</a>
                                @else
                                <a href="{{ route('status_tte', $pendaftar) }}" type="button"
                                    class="btn btn-info btn-sm"><i class="icon-check"></i> Belum
                                    Terbit</a>
                                @endif
                            </td>
                            <td>
                                {{ carbon\carbon::parse($pendaftar->created_at)->format('l, d-M-Y') }}
                            </td>
                            <td><a href="{{ route('detailberkas', $pendaftar) }}" type="button" class="btn btn-info"><i
                                        class="icon-eye1"></i> show detail</a></td>
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