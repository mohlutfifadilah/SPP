<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Petugas;
use App\User;
use DB;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $petugas = Petugas::all();
        return view('admin.petugas',['petugas' => $petugas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tambah-petugas');

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
        $petugas = DB::table('petugas')->where(['id_petugas' => $id])->first();
        return view('admin.edit-petugas', ['petugas' => $petugas]);

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
                'nip'           => 'required | numeric',
                'nama_petugas'  => 'required',
            ]);

        $user = User::find($id);

        $user->ni       = $request->nip;
        $user->nama     = e($request->input('nama_petugas'));

        $user->save();

        DB::table('petugas')
            ->where('id_petugas', $id)
            ->update([
                'nip'           => $request->nip,
                'nama_petugas'  => e($request->input('nama_petugas')),
                'updated_at'    => now()
            ]);

        return redirect('petugas')->with(['status' => 'Berhasil Diedit','title' => 'Data Petugas','type' => 'success']);
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
        $petugas = DB::table('petugas')->where(['id_petugas' => $id])->first();
        $nip = $petugas->nip;

        DB::table('users')->where(['ni' => $nip])->delete();
        DB::table('petugas')->where(['id_petugas' => $id])->delete();

        return redirect('petugas')->with(['status' => 'Berhasil Dihapus','title' => 'Data Petugas','type' => 'success']);
    }
}
