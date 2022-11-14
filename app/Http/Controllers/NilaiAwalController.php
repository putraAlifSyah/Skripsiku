<?php

namespace App\Http\Controllers;

use App\Models\NilaiAwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Schema;

class NilaiAwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $namaKolom = Schema::getColumnListing('nilai_awals');
        $data=NilaiAwal::all();
        return view ('/Data_Nilai_Awal/DataNilai', [
            'data'=>$data,
            'namaKolom'=> $namaKolom,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data=NilaiAwal::where('id', $request->nilaiawal)->first();
        $namaKolom = Schema::getColumnListing('nilai_awals');
        if (count($namaKolom) < 7){
            return redirect('/admin/nilaiawal')->with('gagal', 'Buat kriteria terlebih dahulu');
        }
        // dd($data->nama_calon);
        return view ('Data_Nilai_Awal/TambahDataNilai', [
            'data'=>$data,
            'namaKolom' => $namaKolom
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function inputData($namaKolom, $data)
    { 
        $isi = $data->$namaKolom;
        NilaiAwal::where('id', $data->id)
        ->update([
            'id_calon'=>$data->id_calon,
            'nama_calon'=>$data->nama_calon,
            'periode'=>$data->periode,
            $namaKolom => $isi
        ]);
    }
    
    public function store(Request $request)
    {   
        
        $namaKolom = Schema::getColumnListing('nilai_awals');
        $nama=$namaKolom[6];
        $isi = $request->$nama;
            for($i = 6; $i < count($namaKolom); $i++){
                $nama=$namaKolom[$i];
                $isi = $request->$nama;
                NilaiAwal::where('id', $request->id)
                ->update([
                    $nama => $isi
                ]);
            }
        return redirect('/admin/nilaiawal')->with ('status', 'Nilai telah berhasil di inputkan');
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
    public function edit()
    {
        
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
