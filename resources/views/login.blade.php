<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-moer</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Include this in your blade layout -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body>
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
    <div class="row m-0">
        <!-- Form Login Admin -->
        <div class="col-md-4 mx-auto">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0 font-weight-bold text-white">E-moer</h4>
                    <p class="m-0">
                        "Aplikasi Pembayaran SPP"
                    </p>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('email') is-invalid @enderror" type="text"
                                    placeholder="" id="email" name="email" value="{{ old('email') }}"
                                    autocomplete="off">
                                @error('email')
                                    <small class="text-danger">
                                        NIS tidak boleh kosong
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input class="form-control @error('password') is-invalid @enderror" type="password"
                                    placeholder="" id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <small class="text-danger">
                                        Password tidak boleh kosong
                                    </small>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweet::alert')
</body>

</html>
