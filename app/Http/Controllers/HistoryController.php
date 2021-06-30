<?php

namespace App\Http\Controllers;

use App;
use App\Exports\HistoryExport;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pay = DB::table('pembayaran')->get();
        $pay2 = DB::table('pembayaran')->groupBy('kode')->first();
        $siswa = DB::table('siswa')->where(['nis' => $pay2->nis])->first();
        $petugas = DB::table('petugas')->where(['nip' => $pay2->nip])->first();
        return view('admin.history', ['pay' => $pay, 'siswa' => $siswa, 'petugas' => $petugas]);

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

    public function generate()
    {
        return Excel::download(new HistoryExport, 'laporan.xlsx');
    }

    public function cetak()
    {
        $pay = DB::table('pembayaran')->get();
        $pay2 = DB::table('pembayaran')->groupBy('kode')->first();
        $siswa = DB::table('siswa')->where(['nis' => $pay2->nis])->first();
        $petugas = DB::table('petugas')->where(['nip' => $pay2->nip])->first();
        $pdf = PDF::loadview('admin.cetak-pdf.laporan', ['pay' => $pay, 'siswa' => $siswa, 'petugas' => $petugas]);
        return $pdf->stream();
    }
}