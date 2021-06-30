@extends('admin.layouts.admin-app')

@section('title', 'Pembayaran')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pembayaran</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Form Tambah Data -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-white">
                        <h6 class="m-0 font-weight-bold text-white">Silahkan isi form dibawah ini</h6>
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
                        <form id="form" action="{{ route('pay.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <input type="hidden" name="nip" value="{{ Auth::user()->ni }}">
                            <div class="form-group row">
                                <label for="nis" class="col-sm-3 col-form-label">
                                    NIS
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('nis') is-invalid @enderror" type="text"
                                        placeholder="" id="nis" name="nis">
                                    @error('nis')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="spp" class="col-sm-3 col-form-label">
                                    Kode SPP
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('spp') is-invalid @enderror" type="text"
                                        placeholder="" id="spp" name="spp" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">
                                    Nama
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('nama') is-invalid @enderror" type="text"
                                        placeholder="" id="nama" name="nama" readonly>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="kelas" class="col-sm-3 col-form-label">
                                    Kelas
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('kelas') is-invalid @enderror" type="text"
                                        placeholder="" id="kelas" name="kelas" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jurusan" class="col-sm-3 col-form-label">
                                    Kompetensi Keahlian
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control @error('jurusan') is-invalid @enderror" type="text"
                                        placeholder="" id="jurusan" name="jurusan" readonly>
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="bulan" class="col-sm-3 col-form-label">
                                    Pilih Bulan
                                </label>
                                <div class="col-sm-9">
                                    <div class="bulan mr-4">
                                        @foreach ($spp as $s)
                                            <input type="checkbox" class="addon form-check form-check-inline my-2 mr-1 ml-1"
                                                name="bulan[]" id="bulan" value="{{ $s }}">
                                            <span>{{ $s }}</span>
                                            |
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total" class="col-sm-3 col-form-label">
                                    Total
                                </label>
                                <div class="col-sm-4">
                                    <input class="form-control" type="text" id="total" name="total" value="" readonly
                                        placeholder="Total" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary btn-block">Bayar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('input#nis').on('change', function() {
            let val = $(this).val();
            let a = $('[name="_token"]').val();
            let data = {
                _token: a,
                nis: val
            }
            fetch('http://127.0.0.1:8000/get-siswa', {
                    method: 'post',
                    headers: {
                        'Content-Type': 'apilcation/json;charset=utf-8'
                    },
                    body: JSON.stringify(data)
                })
                .then(r => r.json())
                .then(r => {
                    $('#nama').val(r.nama)
                    $('#spp').val(r.id_spp)
                })
        })

        // Pay
        function updateTotal() {
            var basic = 0;
            var add = 0;
            var form = document.getElementById('form');
            var checkboxes = form.getElementsByClassName('addon');
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    add += 125000;
                }
            }
            var p = basic + add;
            var price = p;
            document.getElementById('total').value = price;
        }

    </script>
@endsection
