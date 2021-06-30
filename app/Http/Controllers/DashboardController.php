<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Petugas;
use App\Siswa;
use App\Spp;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $user = User::count();
        $petugas = Petugas::count();
        $siswa = Siswa::count();
        $kelas = Kelas::count();

        $none = Spp::where(['id_status' => 1])->count();
        $done = Spp::where(['id_status' => 2])->count();

        $chartjs = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 1000, 'height' => 800])
            ->labels(['Lunas', 'Belum Lunas'])
            ->datasets([
                [
                    'backgroundColor' => ['#345bcc', '#dddfeb'],
                    'hoverBackgroundColor' => ['#345bcc', '#dddfeb'],
                    'data' => [$done, $none],
                ],
            ])
            ->options([]);

        return view('admin.dashboard', [
            'user' => $user,
            'petugas' => $petugas,
            'siswa' => $siswa,
            'kelas' => $kelas,
            'chartjs' => $chartjs,
        ]);
    }

    public function siswa()
    {

        return view('siswa.dashboard');
    }

    public function petugas()
    {

        return view('petugas.dashboard');
        // return view('petugas.dashboard');
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
}