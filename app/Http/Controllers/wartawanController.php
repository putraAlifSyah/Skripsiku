<?php

namespace App\Http\Controllers;

use App\Models\HasilAkhir;
use App\Models\NilaiAwal;
use App\Models\NilaiVektorS;
use App\Models\NilaiVektorV;
use Illuminate\Http\Request;
use App\Models\Wartawan;

class wartawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function verifikasi(Request $request){
        wartawan::where('id_wartawan', $request->wartawan)
                    ->update([
                        'verifikasi'=>'Sudah',
                    ]);
        $data = wartawan::where('id_wartawan', $request->wartawan)->get();
        // dd($data[0]['Nama']);
        NilaiAwal::create([
            'id_calon' => $data[0]['id_wartawan'],
            'nama_calon' => $data[0]['Nama'],
            'periode' => $data[0]['Periode'],
        ]);
        NilaiVektorS::create([
            'id_calon' => $data[0]['id_wartawan'],
            'nama_calon' => $data[0]['Nama'],
            'jumlah' => 0,
        ]);
        NilaiVektorV::create([
            'id_calon' => $data[0]['id_wartawan'],
            'nama_calon' => $data[0]['Nama'],
            'hasil' => 0,
        ]);

        HasilAkhir::create([
            'id_calon' => $data[0]['id_wartawan'],
            'nama_calon' => $data[0]['Nama'],
            'kontak' => $data[0]['Handphone'],
            'periode' => $data[0]['Periode'],
            'hasil' => 0,
        ]);
        return redirect('/admin/wartawan')->with ('status', 'Data telah berhasil diverifkasi');
    }
    
    public function index()
    {
        $data=Wartawan::where('Verifikasi', 'Belum')->get();
        return view ('/Data_Wartawan/DataWartawan', [
            'data'=>$data,
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
