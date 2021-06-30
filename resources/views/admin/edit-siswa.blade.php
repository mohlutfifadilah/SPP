@extends('admin.layouts.admin-app')

@section('title','Edit Siswa')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Form Tambah Data -->
        <div class="col-xl-9 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                    <h6 class="m-0 font-weight-bold text-white">Edit Data</h6>
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
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label for="spp" class="col-sm-2 col-form-label">Kode SPP</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('spp') is-invalid @enderror" type="text"
                                    placeholder="" id="spp" name="spp" value="{{ $siswa->id_spp }}" disabled>
                                @error('spp')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('nisn') is-invalid @enderror" type="text"
                                    placeholder="" id="nisn" name="nisn" value="{{ $siswa->nisn }}">
                                @error('nisn')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('nis') is-invalid @enderror" type="text"
                                    placeholder="" id="nis" name="nis" value="{{ $siswa->nis }}">
                                @error('nis')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                    placeholder="" id="nama" name="nama" value="{{ $siswa->nama }}">
                                @error('nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-4">
                                <select class="custom-select @error('kelas') is-invalid @enderror" id="kelas"
                                    name="kelas">
                                    <option selected hidden>{{ $kelas->nama_kelas }}</option>
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
                        <div class="form-group row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-block">Edit</button>
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