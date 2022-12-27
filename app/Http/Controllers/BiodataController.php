<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\User;
use App\Models\Wartawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('/HalamanUser/biodata/biodata');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Periode $periode)
    {
        $data = Periode::where('id', $periode->id)->first();
        return view ('HalamanUser/Biodata/biodata', [
            'periode'=>$periode,
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = request()->validate([
            'Nama' => 'required',
            'Alamat' => 'required',
            'Handphone' => 'required',
            'Pendidikan' => 'required',
            'KTP' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Ijazah_Terakhir' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Foto' => 'required|file|image|max:100000',
            'CV' => 'required',
            'Surat_Lamaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Verifikasi' => 'required',
            'Melamar' => 'required',
            'Periode' => 'required',
            'id_user' => 'required',
        ]);
        // dd('halo');
        // dd($validatedData['Ijazah_Terakhir']);
        $validatedData['Ijazah_Terakhir'] = $request->file('Ijazah_Terakhir')->store('WartawanData');
        $validatedData['Foto'] = $request->file('Foto')->store('WartawanData');
        // $validatedData['CV'] = $request->file('CV')->store('WartawanData');
        $validatedData['Surat_Lamaran'] = $request->file('Surat_Lamaran')->store('WartawanData');
        $validatedData['KTP'] = $request->file('KTP')->store('WartawanData');
        Wartawan::create($validatedData);
        return redirect('/')->with('status', 'Biodata Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = Wartawan::where('id_user', $user->id)->first();
        $periode = Periode::all();
        return view ('HalamanUser/Biodata/Editbiodata', [
            'periode'=>$periode,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wartawan $wartawan)
    {
        // dd($request->old_KTP);
        $rules = [
            'Nama' => 'required',
            'Alamat' => 'required',
            'Handphone' => 'required',
            'Pendidikan' => 'required',
            'KTP' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Ijazah_Terakhir' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Foto' => 'required|file|image|max:100000',
            'CV' => 'required',
            'Surat_Lamaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:100000',
            'Verifikasi' => 'required',
            'Melamar' => 'required',
            'Periode' => 'required',
            'id_user' => 'required',
        ];

        // memvalidasi data
        $validatedData = $request->validate($rules);

        
        // menyimpan data file baru
        $validatedData['Ijazah_Terakhir'] = $request->file('Ijazah_Terakhir')->store('WartawanData');
        $validatedData['Foto'] = $request->file('Foto')->store('WartawanData');
        // $validatedData['CV'] = $request->file('CV')->store('WartawanData');
        $validatedData['Surat_Lamaran'] = $request->file('Surat_Lamaran')->store('WartawanData');
        $validatedData['KTP'] = $request->file('KTP')->store('WartawanData');



        Wartawan::where('id_user', $request->id_user)
                    ->update($validatedData);

        // menghapus file lama
        Storage::delete($request->old_KTP);
        Storage::delete($request->old_ijazah);
        // Storage::delete($request->old_cv);
        Storage::delete($request->old_suratLamaran);
        Storage::delete($request->old_foto);

        return redirect('/')->with('status', 'Data telah berhasil diubah');
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
