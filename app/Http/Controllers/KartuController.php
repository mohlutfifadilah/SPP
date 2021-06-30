<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class KartuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::find($id);

        $siswa = DB::table('siswa')->where(['nis' => $user->ni])->first();

        $spp = DB::table('spp')->where(['id_spp' => $siswa->id_spp])->get();
        $jumlah = DB::table('spp')->where(['id_spp' => $siswa->id_spp])->get()->sum('nominal');
        $sudah = DB::table('spp')->where(['id_spp' => $siswa->id_spp, 'id_status' => 2])->get()->sum('nominal');
        $sisa = DB::table('spp')->where(['id_spp' => $siswa->id_spp, 'id_status' => 1])->get()->sum('nominal');
        $spp2 = DB::table('spp')->where(['id_spp' => $siswa->id_spp])->first();

        return view('siswa.kartu', [
            'spp' => $spp,
            'spp2' => $spp2,
            'siswa' => $siswa,
            'jumlah' => $jumlah,
            'sudah' => $sudah,
            'sisa' => $sisa,
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
    }
}