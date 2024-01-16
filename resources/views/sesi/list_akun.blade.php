@extends('layouts.main')

@section('content')
<!-- Main container start -->
<div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-12 mt-4">
            <div class="table-container">
                <div class="t-header">Daftar Nama Pengguna OPD</div>
                <div class="table-responsive">
                    <table id="copy-print-csv" class="table custom-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $item )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->role }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle"
                                            data-bs-toggle="dropdown" data-display="static" aria-haspopup="true"
                                            aria-expanded="false">
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
                                                <button type="button" onclick="konfirmasiHapus()"
                                                    class="dropdown-item"><i class="icon-trash"></i>
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
</div>
<!-- Main container end -->

@endsection