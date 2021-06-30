@extends('admin.layouts.admin-app')

@section('title', 'Info SPP')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Form Tambah Data -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                        <h6 class="m-0 font-weight-bold text-white">Info SPP</h6>
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
                        <dl class="row">
                            <dt class="col-sm-3">Kode SPP</dt>
                            <dd class="col-sm-9">{{ $spp2->id_spp }}</dd>

                            <dt class="col-sm-3">Siswa Pemilik</dt>
                            <dd class="col-sm-9">{{ $siswa->nama }}</dd>
                        </dl>
                        <div class="row">
                            @foreach ($spp as $s)
                                <div class="col-md-2">
                                    <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-2 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                                            {{ $s->bulan }}
                                        </div>
                                        <div class="card-body py-2 font-weight-bold">
                                            <small>
                                                Nominal :
                                            </small>
                                            <br>
                                            @currency($s->nominal)
                                        </div>
                                        @if ($s->id_status == 1)
                                            <div class="card-footer bg-danger py-1 text-white text-center">
                                                <i class="fa fa-times"></i>
                                            </div>
                                        @elseif($s->id_status == 2)
                                            <div class="card-footer bg-success py-1 text-white text-center">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <dl class="row">
                                    <dt class="col-sm-3">Total Tagihan</dt>
                                    <dd class="col-sm-9">: @currency($nominal)</dd>

                                    <dt class="col-sm-3">Telah Dibayar</dt>
                                    <dd class="col-sm-9">: @currency($done)</dd>

                                    <dt class="col-sm-3">Sisa Tagihan</dt>
                                    <dd class="col-sm-9">: @currency($sisa)</dd>
                                </dl>
                            </div>
                            <div class="col-md-2">
                                Keterangan :
                            </div>
                            <div class="col-md-4">
                                <div class="text-danger font-weight-bold">
                                    Merah <small class="text-dark">(Belum Lunas)</small>
                                </div>
                                <div class="text-success font-weight-bold">
                                    Hijau <small class="text-dark">(Lunas)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- End of Main Content -->


@endsection
