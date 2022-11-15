<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\User;
use App\Models\Wartawan;
use Illuminate\Support\Facades\Auth;

// use App\Http\Requests\cekPeriode;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Daftar(Periode $periode){
        // dd($periode);
        $id_user = Auth::user()->id;
        // dd($id_user);
        Wartawan::where('id_user', $id_user )
                    ->update([
                        'Periode'=>$periode->Periode_Penerimaan,
                        'Melamar'=>"Sudah",
                    ]);
        return redirect('/')->with('status', 'Anda telah berhasil mendaftar');
    }

    public function index()
    {
        $data=Periode::all();
        return view ('/Data_Periode/DataPeriode', [
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
        return view('Data_Periode/TambahDataPeriode');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validated = request()->validate([
            'Periode_Penerimaan' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1),
            'Tanggal_Mulai_Pendaftaran' => 'required',
            'Tanggal_Akhir_Pendaftaran' => 'required',
            'Tanggal_Mulai_Ujian' => 'required',
            'Keterangan' => 'required',
        ],
        [
            'Periode_Penerimaan.required' => 'Periode tidak boleh kosong/format harus 2022-2023',
        ]);


        // $validated = $request->validate([
        //     'Periode_Penerimaan' => 'required',
        //     'Tanggal_Mulai_Ujian' => 'required',
        //     'Tanggal_Akhir_Ujian' => 'required',
        //     'Keterangan' => 'required',
        // ]);

        Periode::create($request->all());
        return redirect('/admin/periode')->with('status', 'Data telah berhasil ditambahkan');

        // $validated = $request->validate([
        //     'Periode_Penerimaan' => 'required|max:25',
        //     'Tanggal_Mulai_Ujian' => 'required',
        //     'Tanggal_Akhir_Ujian' => 'required',
        //     'Keterangan' => 'required',
        // ]);

        // Periode::create($request->all());
        // return redirect('/admin/periode')->with('status', 'Data telah berhasil ditambahkan');
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
    public function edit(Periode $periode)
    {
        return view ('Data_Periode/UbahDataPeriode', ['periode'=>$periode]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Periode $periode)
    {
        Periode::where('id', $periode->id)
                    ->update([
                        'Periode_Penerimaan'=>$request->Periode_Penerimaan,
                        'Tanggal_Mulai_Pendaftaran'=>$request->Tanggal_Mulai_Pendaftaran,
                        'Tanggal_Akhir_Pendaftaran'=>$request->Tanggal_Akhir_Pendaftaran,
                        'Tanggal_Mulai_Ujian'=>$request->Tanggal_Mulai_Ujian,
                        'Keterangan'=>$request->Keterangan,
                    ]);
        return redirect('/admin/periode')->with('status', 'Data telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Periode::destroy($id);
        return redirect('/admin/periode')->with('status', 'Data telah berhasil dihapus');
    }
}
