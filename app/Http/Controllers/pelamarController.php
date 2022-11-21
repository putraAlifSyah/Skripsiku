<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Wartawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mengambil data periode yang tidak lewat dari tanggal hari ini (masih buka)
        $periode=Periode::where('Tanggal_Akhir_Pendaftaran', '>=', date("Y-m-d"))->get();
        // $periode=Periode::all();
        $data = Wartawan::all();
        if (Auth::check() && Wartawan::where('id_user', Auth::user()->id )->first())
        {
            $dataWartawan = Wartawan::where('id_user', Auth::user()->id )->first();
            $periodePendaftar = $dataWartawan->Periode;
            $ada=true;
            $tanggal = Periode::where('Periode_Penerimaan', $periodePendaftar)->first();
            return view ('/HalamanUser/index', [
                'periode'=>$periode,
                'data' => $data,
                'dataWartawan' => $dataWartawan,
                'ada' => $ada,
                'tanggal' => $tanggal
            ]);
        }
        $dataWartawan = false;
        $ada = false;
        return view ('/HalamanUser/index', [
            'periode'=>$periode,
            'data' => $data,
            'ada' => $ada,
            'dataWartawan' => $dataWartawan
        ]);
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
