@extends('admin.layouts.admin-app')

@section('title','Tambah User')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Form Tambah Data -->
        <div class="col-xl-9 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                    <h6 class="m-0 font-weight-bold text-white">Tambah User</h6>
                    <!-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> -->
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="level" class="col-sm-4 col-form-label">Level</label>
                            <div class="col-sm-3">
                                <select class="custom-select" id="level" name="level">
                                    <option selected disabled value="{{ old('level') }}">Pilih Level</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Petugas">Petugas</option>
                                    <option value="Siswa">Siswa</option>
                                </select>
                                @error('level')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div id="Admin" class="role" style="display:none">
                            <div class="form-group row">
                                <label for="nip1" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-sm-3">
                                    <input class="form-control @error('nip1') is-invalid @enderror" type="text"
                                        placeholder="" id="nip1" name="nip1" value="{{ old('nip1') }}" autocomplete="off">
                                    @error('nip1')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama1" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input class="form-control @error('nama1') is-invalid @enderror" type="text"
                                        placeholder="" id="nama1" name="nama1" value="{{ old('nama1') }}" autocomplete="off">
                                    @error('nama1')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="Petugas" class="role" style="display:none">
                            <div class="form-group row">
                                <label for="nip2" class="col-sm-4 col-form-label">NIP</label>
                                <div class="col-sm-3">
                                    <input class="form-control @error('nip2') is-invalid @enderror" type="text"
                                        placeholder="" id="nip2" name="nip2" value="{{ old('nip2') }}" autocomplete="off">
                                    @error('nip2')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama2" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input class="form-control @error('nama2') is-invalid @enderror" type="text"
                                        placeholder="" id="nama2" name="nama2" value="{{ old('nama2') }}" autocomplete="off">
                                    @error('nama2')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="Siswa" class="role" style="display:none">
                            <div class="form-group row">
                                <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                <div class="col-sm-3">
                                    <input class="form-control @error('nis') is-invalid @enderror" type="text"nis
                                        placeholder="" id="nis" name="nis" autocomplete="off" value="{{ old('nis') }}">
                                    @error('nis')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nisn" class="col-sm-4 col-form-label">NISN</label>
                                <div class="col-sm-3">
                                    <input class="form-control @error('nisn') is-invalid @enderror" type="text"
                                        placeholder="" id="nisn" name="nisn" autocomplete="off" value="{{ old('nisn') }}">
                                    @error('nisn')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama3" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('nama3') is-invalid @enderror" type="text"
                                        placeholder="" id="nama3" name="nama3" autocomplete="off" value="{{ old('nama3') }}">
                                    @error('nama3')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <label for="kelas" class="col-sm-1 col-form-label">Kelas</label>
                                <div class="col-sm-3">
                                    <select class="custom-select @error('kelas') is-invalid @enderror" id="kelas"
                                        name="kelas">
                                        <option selected hidden value="{{ old('kelas') }}">Pilih Kelas</option>
                                        <option value="X AKL 1">X AKL 1</option>
                                        <option value="X AKL 2">X AKL 2</option>
                                        <option value="X AKL 3">X AKL 3</option>
                                        <option value="X AKL 4">X AKL 4</option>
                                        <option value="X OTKP 1">X OTKP 1</option>
                                        <option value="X OTKP 2">X OTKP 2</option>
                                        <option value="X OTKP 3">X OTKP 3</option>
                                        <option value="X BDP 1">X BDP 1</option>
                                        <option value="X BDP 2">X BDP 2</option>
                                        <option value="X BDP 3">X BDP 3</option>
                                        <option value="X AP 1">X AP 1</option>
                                        <option value="X AP 2">X AP 2</option>
                                        <option value="X TB 1">X TB 1</option>
                                        <option value="X TB 2">X TB 2</option>
                                        <option value="X MM">X MM</option>
                                        <option value="X RPL">X RPL</option>
                                        <option value="XI AKL 1">XI AKL 1</option>
                                        <option value="XI AKL 2">XI AKL 2</option>
                                        <option value="XI AKL 3">XI AKL 3</option>
                                        <option value="XI AKL 4">XI AKL 4</option>
                                        <option value="XI OTKP 1">XI OTKP 1</option>
                                        <option value="XI OTKP 2">XI OTKP 2</option>
                                        <option value="XI OTKP 3">XI OTKP 3</option>
                                        <option value="XI BDP 1">XI BDP 1</option>
                                        <option value="XI BDP 2">XI BDP 2</option>
                                        <option value="XI BDP 3">XI BDP 3</option>
                                        <option value="XI AP 1">XI AP 1</option>
                                        <option value="XI AP 2">XI AP 2</option>
                                        <option value="XI TB 1">XI TB 1</option>
                                        <option value="XI TB 2">XI TB 2</option>
                                        <option value="XI MM">XI MM</option>
                                        <option value="XI RPL">XI RPL</option>
                                        <option value="XII AKL 1">XII AKL 1</option>
                                        <option value="XII AKL 2">XII AKL 2</option>
                                        <option value="XII AKL 3">XII AKL 3</option>
                                        <option value="XII AKL 4">XII AKL 4</option>
                                        <option value="XII OTKP 1">XII OTKP 1</option>
                                        <option value="XII OTKP 2">XII OTKP 2</option>
                                        <option value="XII OTKP 3">XII OTKP 3</option>
                                        <option value="XII BDP 1">XII BDP 1</option>
                                        <option value="XII BDP 2">XII BDP 2</option>
                                        <option value="XII BDP 3">XII BDP 3</option>
                                        <option value="XII AP 1">XII AP 1</option>
                                        <option value="XII AP 2">XII AP 2</option>
                                        <option value="XII TB 1">XII TB 1</option>
                                        <option value="XII TB 2">XII TB 2</option>
                                        <option value="XII MM">XII MM</option>
                                        <option value="XII RPL">XII RPL</option>
                                    </select>
                                    @error('kelas')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    placeholder="" id="email" name="email" autocomplete="off" value="{{ old('email') }}">
                                @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    placeholder="" id="password" name="password" autocomplete="off">
                                @error('password')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-form-label">Konfirmasi
                                Password</label>
                            <div class="col-sm-8">
                                <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- End of Main Content -->


@endsection