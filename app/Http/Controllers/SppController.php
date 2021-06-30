<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $spp = DB::table('spp')->groupBy('id_spp')->get();
        // $siswa = DB::table('siswa')->where(['id_spp' => $spp->id_spp])->get();
        return view('admin.spp', ['spp' => $spp]);
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
        $spp = DB::table('spp')->where(['id_spp' => $id])->get();

        $nominal = DB::table('spp')->where(['id_spp' => $id])->get()->sum('nominal');
        $sisa = DB::table('spp')->where(['id_spp' => $id, 'id_status' => 1])->get()->sum('nominal');
        $done = DB::table('spp')->where(['id_spp' => $id, 'id_status' => 2])->get()->sum('nominal');

        $spp2 = DB::table('spp')->where(['id_spp' => $id])->first();
        $siswa = DB::table('siswa')->where(['id_spp' => $id])->first();

        return view('admin.info-spp', [
            'spp' => $spp,
            'spp2' => $spp2,
            'siswa' => $siswa,
            'nominal' => $nominal,
            'sisa' => $sisa,
            'done' => $done,
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
        $siswa = DB::table('siswa')->where(['id_spp' => $id])->first();
        $nis = $siswa->nis;
        $spp = $siswa->id_spp;

        DB::table('users')->where(['ni' => $nis])->delete();
        DB::table('siswa')->where(['id_spp' => $id])->delete();
        DB::table('spp')->where(['id_spp' => $id])->delete();

        return redirect('spp')->with(['status' => 'Berhasil Dihapus', 'title' => 'Data SPP', 'type' => 'success']);

    }
}