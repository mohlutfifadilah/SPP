<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bayar;
use App\Siswa;
use App\Petugas;
use App\Kelas;
use PDF;
use App\User;

class RiwayatController extends Controller
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
        $siswa = Siswa::where(['nis' => $user->ni])->first();
        $riwayat2 = Bayar::where(['nis' => $siswa->nis,'id_spp' => $siswa->id_spp,'id_status' => 1])->first();
        $riwayat = Bayar::where(['nis' => $siswa->nis,'id_spp' => $siswa->id_spp,'id_status' => 1])->get();
        $petugas = Petugas::where(['nip' => $riwayat2->nip])->first();
        return view('siswa.riwayat',['riwayat' => $riwayat,'petugas' => $petugas]);
    }

    public function cetak($id)
    {
        $pay = Bayar::where(['kode' => $id])->first();
        $siswa = Siswa::where(['nis' => $pay->nis])->first();
        $petugas = Petugas::where(['nip' => $pay->nip])->first();
        $kelas = Kelas::where(['id_kelas' => $siswa->id_kelas])->first();
    	$pdf = PDF::loadview('siswa.cetak-pdf.bukti-pembayaran',[
            'pay' => $pay,
            'siswa' => $siswa,
            'petugas' => $petugas,
            'kelas'   => $kelas
            ])->setPaper('a4','landscape');
        return $pdf->stream();
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
