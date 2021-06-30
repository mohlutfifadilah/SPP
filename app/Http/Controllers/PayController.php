<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Spp;
use App\Bayar;
use App\Siswa;
use App\Kelas;
use DB;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $spp   = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        return view('admin.pay',['spp' => $spp]);
    }

    //GET Data
    public function searchData(Request $request)
    {
        $search = $request->nis;

        $siswa = Siswa::where(['nis' => $search])->first();
        echo $siswa;
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
        $request->validate([
            'nis'   => 'required | numeric',
        ]);

        $siswa = DB::table('siswa')->where(['nis' => $request->nis])->first();

        $spp2   = DB::table('spp')->where(['id_spp' => $siswa->id_spp])->first();
        $random = Str::random(20);
        $month = $request->bulan;
        $values = array();
        foreach($month as $dataset)
        {
            $values[] = "{$dataset}";
        }

        $columns = implode(", ",array_keys($values));
        $escaped_values = array_values($values);
        $valu  = implode(", ", $escaped_values);

        Bayar::insert([
            'kode'      => $random,
            'nis'   => $request->nis,
            'nip'   => $request->nip,
            'id_status' => 1,
            'id_spp' => $spp2->id_spp,
            'bulan_bayar' => $valu,
            'tahun_bayar' => $spp2->tahun,
            'jumlah_bayar' => $request->total
        ]);

        foreach($request->input('bulan') as $bulan) {
            Spp::where(['bulan' => $bulan,'id_spp' => $request->spp])->update(['id_status' => 2]);
        }

        return redirect('history')->with(['status' => 'Berhasil dilakukan','title' => 'Pembayaran','type' => 'success']);
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
        $pay = DB::table('pembayaran')->where(['id_spp' => $id])->first();
        return view('admin.input-rekening',['pay' => $pay]);
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