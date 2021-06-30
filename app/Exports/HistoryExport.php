<?php

namespace App\Exports;

use App\Bayar;
use DB;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class HistoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function view(): View
    {
        $pay = DB::table('pembayaran')->get();
        $pay2 = DB::table('pembayaran')->groupBy('kode')->first();
        $siswa = DB::table('siswa')->where(['nis' => $pay2->nis])->first();
        $petugas = DB::table('petugas')->where(['nip' =>$pay2->nip ])->first();
        return view('admin.cetak-excel.laporan', ['pay' => $pay,'siswa' => $siswa,'petugas' => $petugas]);
    }
}
