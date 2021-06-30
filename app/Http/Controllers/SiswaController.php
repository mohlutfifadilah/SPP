<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswa = Siswa::all();
        return view('admin.siswa',['siswa' => $siswa]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $siswa = DB::table('siswa')->where(['id' => $id])->first();
        $kelas = DB::table('kelas')->where(['id_kelas' => $siswa->id_kelas])->first();
        return view('admin.info-siswa', [
                                        'siswa' => $siswa,
                                        'kelas' => $kelas,
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
        $siswa = DB::table('siswa')->where(['id' => $id])->first();
        $kelas = DB::table('kelas')->where(['id_kelas' => $siswa->id_kelas])->first();
        return view('admin.edit-siswa', [
                                        'siswa' => $siswa,
                                        'kelas' => $kelas,
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
        $request->validate([
            'nisn'    => 'required | numeric',
            'nis'     => 'required | numeric',
            'nama'    => 'required',
            'kelas'   => 'required',
        ]);

        $siswa = Siswa::find($id);
        $kelas = DB::table('kelas')->where(['nama_kelas' => e($request->input('kelas')) ])->first();

        $siswa->id_kelas   = $kelas->id_kelas;
        $siswa->nisn       = $request->input('nisn');
        $siswa->nis        = $request->input('nis');
        $siswa->nama       = e($request->input('nama'));
        $siswa->updated_at = now();

        $siswa->save();
        DB::table('users')
            ->where('ni', $siswa->nis)
            ->update([
                'ni'            => $request->input('nis'),
                'nama'          => $request->input('nama'),
                'updated_at'    => now()
            ]);
        return redirect('siswa')->with(['status' => 'Berhasil Diedit','title' => 'Data Siswa','type' => 'success']);
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
        $siswa = DB::table('siswa')->where(['id' => $id])->first();
        $nis   = $siswa->nis;
        $spp   = $siswa->id_spp;

        DB::table('users')->where(['ni' => $nis])->delete();
        DB::table('siswa')->where(['id' => $id])->delete();
        DB::table('spp')->where(['id_spp' => $spp])->delete();

        return redirect('siswa')->with(['status' => 'Berhasil Dihapus','title' => 'Data Siswa','type' => 'success']);
    }
}
