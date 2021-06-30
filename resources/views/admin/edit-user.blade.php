@extends('admin.layouts.admin-app')

@section('title','Edit User')

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
                    <h6 class="m-0 font-weight-bold text-white">Edit User</h6>
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
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label for="level" class="col-sm-2 col-form-label">Level</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('level') is-invalid @enderror" type="text"
                                    placeholder="" id="level" name="level" value="{{ $level->nama_level }}" disabled>
                                @error('level')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        @if($user->id_level == 1 | $user->id_level == 2)
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('nip') is-invalid @enderror" type="text"
                                    placeholder="" id="nip" name="nip" value="{{ $user->ni }}">
                                @error('nip')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        @elseif($user->id_level == 3 )
                        <div class="form-group row">
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-4">
                                <input class="form-control @error('nis') is-invalid @enderror" type="text"
                                    placeholder="" id="nis" name="nis" value="{{ $user->ni }}">
                                @error('nis')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                    placeholder="" id="nama" name="nama" value="{{ $user->nama }}">
                                @error('nama')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    placeholder="" id="email" name="email" value="{{ $user->email }}">
                                @error('email')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
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