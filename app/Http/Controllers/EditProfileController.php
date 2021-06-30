<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

class EditProfileController extends Controller
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
        $user = User::find($id);
        if ($user->id_level == 1 | $user->id_level == 2) {
            return view('admin.edit-profile-admin', ['user' => $user]);
        } else {
            return view('siswa.edit-profile-siswa', ['user' => $user]);
        }
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

        $user = User::find($id);

        if ($user->id_level == 1 | $user->id_level == 2) {

            if ($request->email == 'null') {
                $request->validate([
                    'nip' => 'required | numeric',
                    'nama' => 'required',
                ]);
            } else {
                $request->validate([
                    'nip' => 'required | numeric',
                    'nama' => 'required',
                    'email' => 'email',
                ]);
            }

            $file = $request->file('foto');

            if ($request->hasFile('foto')) {
                $file->move('avatar', $file->getClientOriginalName());

                $user->ni = $request->nip;
                $user->foto = $request->file('foto')->getClientOriginalName();
                $user->nama = e($request->input('nama'));
                $user->email = e($request->input('email'));

            } else {

                $user->ni = $request->nip;
                $user->nama = e($request->input('nama'));
                $user->email = e($request->input('email'));

            }
            $user->save();

            DB::table('petugas')->where([
                'nip' => $user->ni,
            ])->update([
                'nip' => $request->nip,
                'nama_petugas' => $request->nama,
            ]);

            return redirect('profile/' . $id . '/edit')->with(['status' => 'Berhasil Diubah', 'title' => 'Profil Anda', 'type' => 'success']);
        } else if ($user->id_level == 3) {

            if ($request->email == 'null') {
                $request->validate([
                    'nis' => 'required | numeric',
                    'nama' => 'required',
                ]);
            } else {
                $request->validate([
                    'nis' => 'required | numeric',
                    'nama' => 'required',
                    'email' => 'email',
                ]);
            }

            DB::table('siswa')->where([
                'nis' => $user->ni,
            ])->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
            ]);

            $file = $request->file('foto');

            if ($request->hasFile('foto')) {
                $file->move('avatar', $file->getClientOriginalName());

                $user->ni = $request->nis;
                $user->foto = $request->file('foto')->getClientOriginalName();
                $user->nama = e($request->input('nama'));
                $user->email = e($request->input('email'));

            } else {

                $user->ni = $request->nis;
                $user->nama = e($request->input('nama'));
                $user->email = e($request->input('email'));

            }
            $user->save();
            return redirect('profile/' . $id . '/edit')->with(['status' => 'Berhasil Diubah', 'title' => 'Profil Anda', 'type' => 'success']);
        }

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