@extends('siswa.layouts.siswa-app')

@section('title','Dashboard')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-md-6 mb-4">
            <div class="card shadow mb-5  py-3">
                <div class="card-body mb-1">
                    <center>
                        <h1 class="text-center mb-0 text-dark">
                            E-moer
                        </h1>
                        <hr class="mt-0 mb-0">
                        <small class="text-center mt-0">
                            Aplikasi Pembayaran SPP
                        </small>
                    </center>
                    <p class="mt-5">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-moer adalah sebuah
                        platform website yang berguna untuk melakukan transaksi pembayaran SPP siswa dan diharapkan bisa
                        membantu kinerja Bank Mini dalam mengolah data.
                    </p>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <!-- my calendar -->
                    <div class="auto-jsCalendar material-theme blue"></div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



@endsection
