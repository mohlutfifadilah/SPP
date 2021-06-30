@extends('admin.layouts.admin-app')

@section('title','Info User')

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
                    <h6 class="m-0 font-weight-bold text-white">Info User</h6>
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
                        @if($user->id_level == 1 | $user->id_level == 2)
                        <dl class="row">
                            <dt class="col-sm-3">NIP</dt>
                            <dd class="col-sm-9">{{ $user->ni }}</dd>

                            <dt class="col-sm-3">Level</dt>
                            <dd class="col-sm-9">{{ $level->nama_level }}</dd>

                            <dt class="col-sm-3">Nama</dt>
                            <dd class="col-sm-9">{{ $user->nama }}</dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>
                        </dl>
                        @elseif($user->id_level == 3 )
                        <dl class="row">
                            <dt class="col-sm-3">NIS</dt>
                            <dd class="col-sm-9">{{ $user->ni }}</dd>

                            <dt class="col-sm-3">Level</dt>
                            <dd class="col-sm-9">{{ $level->nama_level }}</dd>

                            <dt class="col-sm-3">Nama</dt>
                            <dd class="col-sm-9">{{ $user->nama }}</dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>
                        </dl>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- End of Main Content -->

@endsection
