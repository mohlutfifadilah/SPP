@extends('siswa.layouts.siswa-app')

@section('title','Edit Password')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
    </div>

    @if (session('status'))
    <script>
        swal({
            text: "{!! session('status') !!}",
            title: "{!! session('title') !!}",
            type:  "{!! session('type') !!}",
            icon: "{!! session('type') !!}",
            // more options
        });
    </script>
    @endif

    <!-- Content Row -->
    <div class="row">
        <!-- Default Card Example -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="/password/{{ $user->id }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label for="password" class="col-sm-4 col-form-label">Password Baru</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            type="password" placeholder="" id="password" name="password" value="">
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
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-block">Edit</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection