@extends('siswa.layouts.siswa-app')
@section('title','Profil')

@section('css')
<style>
.avatar-upload {
    margin: 30px 30px;
}

input#imageUpload {
    display: none;
}

.avatar-preview {
    position: relative;
    width: 225px;
    height: 225px;
    border-radius: 100%;
    border: 3px solid #4e73df;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}

div#imagePreview {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profil</h1>
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
                    <form action="/profile/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-md-5 text-center">
                                <div class="avatar-upload">
                                    <div class="avatar-preview">
                                        <div id="imagePreview"
                                            style="background-image: url({{ asset('/avatar/' . $user->foto) }})">
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="foto" id="foto">
                            </div>
                            <div class="col-md-7">
                                <div class="form-group row">
                                    <label for="nis" class="col-sm-4 col-form-label">NIS</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('nis') is-invalid @enderror" type="text"
                                            placeholder="" id="nis" name="nis" value="{{ $user->ni }}">
                                        @error('nis')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
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
                                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email"
                                            placeholder="" id="email" name="email" value="{{ $user->email }}">
                                        @error('email')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary btn-block mt-auto">Edit</button>
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
