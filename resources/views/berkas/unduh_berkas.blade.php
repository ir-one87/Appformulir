@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-12">

        <div class="table-container">
            <div class="t-header" style="font-size: 1.5em; background-color: #cbe6f4; border-radius: 10px"> Berkas
                Permohonan Penerbitan Sertifikat Elektronik
            </div>
            <div class=" table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Berkas Persyaratan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berkas as $data )
                        <tr>
                            <td>{{ $data->nomor }}</td>
                            <td>{{ $data->nama_berkas }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{asset('berkas_upload/' . $data->file_berkas)}}">
                                        <button type="button" class="btn btn-primary"><i class="icon-download"></i>
                                            Download
                                        </button>
                                    </a>

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




@endsection