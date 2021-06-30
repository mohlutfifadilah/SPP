@extends('admin.layouts.admin-app')

@section('title','Tambah Kelas')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Form Tambah Data -->
        <div class="col-xl-9 col-lg-9">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                    <h6 class="m-0 font-weight-bold text-white">Tambah Data</h6>
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
                    <form action="/kelas" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="kelas" class="col-sm-4 col-form-label">Nama Kelas</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('kelas') is-invalid @enderror" type="text"
                                    placeholder="" id="kelas" name="kelas">
                                @error('kelas')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kk" class="col-sm-4 col-form-label">Kompetensi Keahlian</label>
                            <div class="col-sm-6">
                                <select class="custom-select @error('kk') is-invalid @enderror" id="kk" name="kk">
                                    <option selected hidden>Pilih Kompetensi Keahlian</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Perkantoran">Perkantoran</option>
                                    <option value="Pemasaran">Pemasaran</option>
                                    <option value="Perhotelan">Perhotelan</option>
                                    <option value="Tata Boga">Tata Boga</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                </select>
                                @error('kk')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
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