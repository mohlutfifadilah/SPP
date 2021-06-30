@extends('siswa.layouts.siswa-app')

@section('title','Riwayat')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Riwayat</h1>
    </div>

    @if (session('status'))
    <script>
    swal({
        text: "{!! session('status') !!}",
        title: "{!! session('title') !!}",
        type: "{!! session('type') !!}",
        icon: "{!! session('type') !!}",
        // more options
    });
    </script>
    @endif
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover shadow" id="dataTable">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Dikonfirmasi Oleh</th>
                        <th scope="col">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat as $r)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td> {{ $r->bulan_bayar }} ({{ $r->tahun_bayar }})</td>
                        <td> @currency($r->jumlah_bayar)</td>
                        <td> {{ $petugas->nama_petugas }} <br> ( {{ $petugas->nip }} ) </td>
                        <td> {{ $r->waktu_bayar }} </td>
                        <!-- <td>
                            <a href="{{ route('unduh-bukti', $r->kode) }}" target="_blank" class="d-none d-sm-inline btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-download fa-sm text-white"></i> Unduk Bukti Pembayaran</a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection