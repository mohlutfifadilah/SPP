<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use PDF;
use App;
use DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::all();
        return view('admin.kelas',['kelas' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tambah-kelas');
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
            'kelas'   => 'required',
            'kk'      => 'required',
        ]);

        $kelas = new Kelas;

        $kelas->nama_kelas = $request->kelas;
        $kelas->kompetensi_keahlian = $request->kk;

        $kelas->save();

        return redirect('kelas')->with(['status' => 'Berhasil Ditambahkan','title' => 'Data Kelas','type' => 'success']);
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

    public function generate()
	{
		return Excel::download(new KelasExport, 'kelas.xlsx');
	}

    public function cetak()
    {
    	$kelas = Kelas::all();
 
    	$pdf = PDF::loadview('admin.cetak-pdf.kelas',['kelas'=>$kelas]);
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
        $kelas = DB::table('kelas')->where(['id_kelas' => $id])->first();
        return view('admin.edit-kelas',['kelas' => $kelas]);
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
            'kelas'   => 'required',
            'kk'      => 'required',
        ]);

        DB::table('kelas')->
                        where([
                            'id_kelas' => $id
                        ])->
                        update([
                            'nama_kelas' => $request->kelas,
                            'kompetensi_keahlian' => $request->kk
                        ]);

        return redirect('kelas')->with(['status' => 'Berhasil Diedit','title' => 'Data Kelas','type' => 'success']);

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
        DB::table('kelas')->
                        where([
                            'id_kelas' => $id
                        ])->delete();

        return redirect('kelas')->with(['status' => 'Berhasil Dihapus','title' => 'Data Kelas','type' => 'success']);

    }
}
