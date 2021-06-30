@extends('admin.layouts.admin-app')

@section('title','User')


@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
        @if(Auth::user()->id == 1)
            <a href="/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white"></i> Tambah User</a>
        @endif
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
        <div class="col-md-12">
            <table class="table table-hover shadow" id="dataTable">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td> {{ $u->nama }} </td>
                        <td> {{ $u->email }} </td>
                        @if($u->id_level == 1)
                        <td> Admin </td>
                        @elseif($u->id_level == 2)
                        <td> Petugas </td>
                        @elseif($u->id_level == 3)
                        <td> Siswa </td>
                        @endif
                        <td class="d-flex mx-auto">
                            <a class="btn btn-sm btn-info mr-3" href="/user/{{ $u->id }}">
                                <i class="fa fa-info-circle"></i>
                            </a>
                            @if(Auth::user()->id == 1)
                            <a class="btn btn-sm btn-warning mr-3" href="/user/{{ $u->id }}/edit">
                                <i class="fa fa-edit"></i>
                            </a>
                                <button type="submit" class="btn btn-sm btn-danger remove-user" data-id="{{ $u->id }}" data-action="/user/{{ $u->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif
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

@section('js')
<script>
$("body").on("click",".remove-user",function(){
    var current_object = $(this);
    swal({
        title: "Apakah anda yakin ?",
        text: "Ingin menghapus data ini",
        type: "error",
        showCancelButton: true,
        dangerMode: true,
        cancelButtonClass: '#DD6B55',
        confirmButtonColor: '#dc3545',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
    },function (result) {
        if (result) {
            var action = current_object.attr('data-action');
            var token = jQuery('meta[name="csrf-token"]').attr('content');
            var id = current_object.attr('data-id');

            $('body').html("<form class='form-inline remove-form' method='post' action='"+action+"'></form>");
            $('body').find('.remove-form').append('<input name="_method" type="hidden" value="delete">');
            $('body').find('.remove-form').append('<input name="_token" type="hidden" value="'+token+'">');
            $('body').find('.remove-form').append('<input name="id" type="hidden" value="'+id+'">');
            $('body').find('.remove-form').submit();
        }
    });
});
</script>
@endsection