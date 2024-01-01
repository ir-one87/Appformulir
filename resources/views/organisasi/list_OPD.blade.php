@extends('layouts.main')

@section('content')
<!-- Row start -->
<div class="row gutters">
    <div class="col-12">

        <div class="table-container">
            <div class="t-header" style="font-size: 1.5em; background-color: #cbe6f4; border-radius: 10px"> Organisasi
                Perangkat Daerah
                <a href="#" class="btn btn-primary btn-rounded float-end" data-bs-toggle="modal"
                    data-bs-target="#AddModal"><i class="icon-plus"></i> Tambah
                    Instansi</a>
            </div>
            <!-- Modal edit_kategori-->
            @foreach ($dataopd as $item )
            <div class="modal fade" id="customModalEdit{{ $item->id }}" tabindex="-1" role="dialog"
                aria-labelledby="customModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="customModalLabel">Edit Nama Organisasi Perangkat Daerah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update_opd', $item) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="row gutters">
                                    <div class="col-sm-12 col-12">
                                        <div class="form-group">
                                            <label>Nama Berkas <p class="d-inline text-danger">*</p></label>
                                            <input type="text" class="form-control" name="nama_opd"
                                                value="{{ $item->nama_opd }}">
                                            @error('nama_opd')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer custom">

                            <div class="left-side">
                                <button type="button" class="btn btn-link danger" data-bs-dismiss="modal">Batal</button>
                            </div>
                            <div class="divider"></div>
                            <div class="right-side">

                                <button type="submit" class="btn btn-link success">Update</button>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach


            <!-- Akhir Modal edit_kategori-->
            <div class=" table-responsive">
                <table id="basicExample" class="table custom-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Organisasi Perangkat Daerah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataopd as $item )
                        <tr>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->nama_opd }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                                        data-display="static" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-list2"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-lg-right">
                                        <a href="" type="submit" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#customModalEdit{{ $item->id }}"><i class="icon-pencil"></i>
                                            Edit</a>

                                        <form id="hapusForm" action="{{ route('delete_opd', $item) }}" method="POST">
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

<!-- Modal Add_kategori-->
<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalLabel">Tambah Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save_opd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gutters">
                        <div class="col-sm-12 col-12">
                            <div class="form-group">
                                <label>Nama Organisasi Perangkat Daerah<p class="d-inline text-danger">*</p></label>
                                <input type="text" class="form-control" placeholder="masukan nama OPD" name="nama_opd">
                                @error('nama_opd')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer custom">

                <div class="left-side">
                    <button type="button" class="btn btn-link danger" data-bs-dismiss="modal">Batal</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">

                    <button type="submit" class="btn btn-link success">Simpan</button>

                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Akhir Modal Add_kategori-->



@endsection