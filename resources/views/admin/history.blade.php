@extends('admin.layouts.admin-app')

@section('title','Riwayat')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Riwayat</h1>
        <div class="ml-auto">
            <a href="{{ route('export-excel') }}" target="_blank"
                class="d-none d-sm-inline btn btn-sm btn-success shadow-sm">
                <i class="fas fa-file-word fa-sm text-white"></i> Cetak Laporan (Excel)</a>
            <a href="{{ route('export-pdf') }}" target="_blank"
                class="d-none d-sm-inline btn btn-sm btn-danger shadow-sm">
                <i class="fas fa-file-pdf fa-sm text-white"></i> Cetak Laporan (PDF)</a>
        </div>
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
                        <th scope="col">Kode SPP</th>
                        <th scope="col">NIS</th>
                        <th scope="col">Bulan Bayar</th>
                        <th scope="col">Total Bayar</th>
                        <th scope="col">Dikonfirmasi Oleh</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pay as $p)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td> {{ $p->id_spp }} </td>
                        <td> {{ $p->nis }} </td>
                        <td> {{ $p->bulan_bayar }} ({{ $p->tahun_bayar }})</td>
                        <td> @currency($p->jumlah_bayar)</td>
                        <td> NIP : <br> ( {{ $p->nip }} ) </td>
                        <td> {{ $p->waktu_bayar }} </td>
                        <td>
                            <a href="{{ route('unduh-bukti', $p->kode) }}" target="_blank"
                                class="d-none d-sm-inline btn btn-sm btn-success shadow-sm">
                                <i class="fas fa-download fa-sm text-white"></i></a>
                        </td>
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