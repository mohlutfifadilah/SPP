<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Petugas;
use App\Siswa;
use Illuminate\Support\Facades\Hash;
use App\Level;
use UxWeb\SweetAlert\SweetAlert;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::all();

        return view('admin.user',['user' => $user]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tambah-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $foto     = 'default.jpg';
        $email    = $request->email;
        $password = $request->password;
        $create   = now();

        if($request->level == 'Admin'){
            $request->validate([
                        'nip1'     => 'required | numeric',
                        'nama1'    => 'required',
                        'email'    => 'required | email',
                        'password' => 'required | confirmed | min:8'
                    ]);

            $nip1     = $request->nip1;
            $nama1    = $request->nama1;
            $level    = '1';

            $user = new User;

            $user->ni       = $nip1;
            $user->id_level = $level;
            $user->foto     = $foto;
            $user->password = Hash::make($password);
            $user->nama     = $nama1;
            $user->email    = $email;

            $user->save();

            $petugas = new Petugas;

            $petugas->nip          = $nip1;
            $petugas->nama_petugas = $nama1;
            $petugas->created_at   = $create;

            $petugas->save();

        return redirect('user')->with(['status' => 'Berhasil Ditambahkan','title' => 'Data User','type' => 'success']);

        }elseif($request->level == 'Petugas'){
            $request->validate([
                        'nip2'     => 'required | numeric',
                        'nama2'    => 'required',
                        'email'    => 'email',
                        'password' => 'required | confirmed | min:8'
                    ]);     

            $nama2    = $request->nama2;
            $nip2     = $request->nip2;
            $level    = '2';

            $user = new User;

            $user->ni       = $nip2;
            $user->id_level = $level;
            $user->foto     = $foto;
            $user->password = Hash::make($password);
            $user->nama     = $nama2;
            $user->email    = $email;

            $user->save();

            $petugas = new Petugas;

            $petugas->nip          = $nip2;
            $petugas->nama_petugas = $nama2;
            $petugas->created_at   = $create;

            $petugas->save();

        return redirect('user')->with(['status' => 'Berhasil Ditambahkan','title' => 'Data User','type' => 'success']);

        }else{
                $request->validate([
                            'nis'   => 'required | numeric',
                            'nisn'   => 'required | numeric',
                            'nama3'    => 'required',
                            'kelas'   => 'required',
                            'email' => 'email',
                            'password' => 'required | confirmed | min:8'
                        ]);

            $kode_kelas = DB::table('kelas')->where(['nama_kelas' => $request->kelas])->first();
            $kelas      = $kode_kelas->id_kelas;
            $nis        = $request->nis;
            $nisn       = $request->nisn;
            $level      = '3';
            $nama3      = $request->nama3;
            $spp        = rand(000,999);

            $user = new User;

            $user->ni       = $nis;
            $user->id_level = $level;
            $user->foto     = $foto;
            $user->password = Hash::make($password);
            $user->nama     = $nama3;
            $user->email    = $email;

            $user->save();

            $siswa = new Siswa;

            $siswa->id_kelas   = $kelas;
            $siswa->id_spp     = $spp;
            $siswa->nisn       = $nisn;
            $siswa->nis        = $nis;
            $siswa->nama       = $nama3;
            $siswa->created_at = $create;

            $siswa->save();

            $data = [
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Januari',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Februari',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Maret',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'April',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Mei',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Juni',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Juli',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Agustus',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'September',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Oktober',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'November',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                        [
                            'id_spp'     => $spp,
                            'id_status'  => '1',
                            'bulan'      => 'Desember',
                            'tahun'      => 2021,
                            'nominal'    => 125000,
                            'created_at' => $create
                        ],
                    ];

            DB::table('spp')->insert($data);


            return redirect('user')->with(['status' => 'Berhasil Ditambahkan','title' => 'Data User','type' => 'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user  = User::find($id);
        $level = DB::table('level')->where(['id_level' => $user->id_level])->first();
        return view('admin.info-user', [
                                            'user' => $user,
                                            'level' => $level,
                                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user  = User::find($id);
        $level = DB::table('level')->where(['id_level' => $user->id_level])->first();
        return view('admin.edit-user', [
                                            'user' => $user,
                                            'level' => $level,
                                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $user  = User::find($id);
        $nama = $request->nama;
        $email = $request->email;

        if($user->id_level == 1 | $user->id_level == 2){
            if($request->email == 'null'){
                $request->validate([
                            'nip'     => 'required | numeric',
                            'nama'    => 'required',
                ]);
            }

            $request->validate([
                'nip'     => 'required | numeric',
                'nama'    => 'required',
                'email'    => 'email',
            ]);

            $nip = $request->nip;
            $user->ni         = $nip;
            $user->nama       = $nama;
            $user->email      = $email;

            $user->save();

            DB::table('petugas')
                ->where('nip', $user->ni)
                ->update([
                    'nip'            => $nip,
                    'nama_petugas'   => $nama,
                ]);

        }elseif($user->id_level == 3){

            if($request->email == 'null'){
                $request->validate([
                            'nis'     => 'required | numeric',
                            'nama'    => 'required',
                ]);
            }

            $request->validate([
                'nis'     => 'required | numeric',
                'nama'    => 'required',
                'email'    => 'email',
            ]);
            
            $nis = $request->nis;

            $user->ni         = $nis;
            $user->nama       = $nama;
            $user->email      = $email;

            $user->save();

            DB::table('siswa')
                ->where('nis', $user->ni)
                ->update([
                    'nis'            => $nis,
                    'nama'           => $nama,
                ]);

        }

        return redirect('user')->with(['status' => 'Berhasil Diubah','title' => 'Data User','type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user  = User::find($id);

        if($user->id_level == 1 | $user->id_level == 2){

            DB::table('petugas')->where(['nip' => $user->ni])->delete();

        }elseif($user->id_level == 3){

            DB::table('siswa')->where(['nis' => $user->ni])->delete();

        }

        $user->delete();

        return redirect('user')->with(['status' => 'Berhasil Dihapus','title' => 'Data User','type' => 'success']);


    }
}