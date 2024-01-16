@extends('layouts.main')

@section('content')
<!-- Main container start -->
<div class="main-container">

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-12">
            <div class="card h-100">
                <div class="card-header">
                    <div class="card-title">Registrasi Akun OPD</div>
                </div>

                <div class="card-body">
                    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gutters">
                            <div class="form-group col-sm-6">
                                <label for="fullName">Nama Pengguna <p class="text-danger d-inline">*</p></label>
                                <input type="text" class="form-control" name="name" placeholder="Masukan nama pengguna">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="eMail">Email <p class="text-danger d-inline">*</p></label>
                                <input type="email" class="form-control" id="eMail" placeholder="Masukan Email"
                                    name="email">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="phone">Password <p class="text-danger d-inline">*</p></label>
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="website">Role <p class="text-danger d-inline">*</p></label>
                                <select class="form-control" name="role">
                                    <option selected value="">-- pilih role --</option>
                                    <option value="admin">Administrator</option>
                                    <option value="operator">Operator</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="website">Nama Organisasi Perangkat Daerah <p class="text-danger d-inline">*
                                    </p>
                                </label>
                                <select class="form-control" name="opd_id">
                                    <option selected value="">-- pilih OPD --</option>
                                    @foreach ($opd as $dataopd )
                                    <option value="{{ $dataopd->id }}">{{ $dataopd->nama_opd }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="text-end">
                                    <button type="button" id="submit" name="reset" class="btn btn-white">Batal</button>
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Row end -->
</div>
<!-- Main container end -->

@endsection