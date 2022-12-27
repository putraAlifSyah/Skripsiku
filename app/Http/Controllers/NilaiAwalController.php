<?php

namespace App\Http\Controllers;

use App\Models\DataKriteria;
use App\Models\HasilAkhir;
use App\Models\NilaiAwal;
use App\Models\NilaiVektorS;
use App\Models\NilaiVektorV;
use App\Models\Wartawan;
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
        
        return view ('/Data_Nilai_Awal/DataNilai', [
            'datas'=>NilaiAwal::orderBy('updated_at', 'asc')->paginate(7),
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
        // dd($data->id_calon);
        $dataWartawan = Wartawan::where('id_wartawan', $data->id_calon)->first();
        return view ('Data_Nilai_Awal/TambahDataNilai', [
            'data'=>$data,
            'namaKolom' => $namaKolom,
            'dataWartawan' => $dataWartawan
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
        // $Wartawan1 = NilaiVektorS::where('id_calon', $request->id_calon)->select('jumlah')->first();
        // $WartawanSemua = NilaiVektorS::get();
        // dd($Wartawan1->jumlah);

        // $nama_barang = produk::where('id_produk',$request->id_produk)->select('nama_produk')->first();
        $namaKolom = Schema::getColumnListing('nilai_awals');
        $isi = 0;
            for($i = 0; $i < count($namaKolom); $i++){
                $nama=$namaKolom[$i];
                if ($namaKolom[$i] == 'Pengalaman_Kerja') {
                    $isi = 0;
                    if ($request->Pengalaman_Kerja <= 1) {
                        $isi = 30;
                    }
                    else if ($request->Pengalaman_Kerja > 1 && $request->Pengalaman_Kerja <= 3) {
                        $isi = 50;
                    }
                    else if ($request->Pengalaman_Kerja > 3 && $request->Pengalaman_Kerja <= 5) {
                        $isi = 70;
                    }
                    else if ($request->Pengalaman_Kerja > 5) {
                        $isi = 90;
                    }
                    NilaiAwal::where('id', $request->id)
                    ->update([
                        $nama => $isi
                    ]);
                }else{
                    $isi = $request->$nama;
                    NilaiAwal::where('id', $request->id)
                    ->update([
                        $nama => $isi
                    ]);
                }

            }

        // input hasil perhitungan untuk mendapatkan nilai vektor s ke tabel vektor s
        $total = 0;
        for ($i = 6; $i < count($namaKolom); $i++) { 
            $params = str_replace('_', ' ', $namaKolom[$i]);
            $BobotKriteria = DataKriteria::where('Kriteria', $params)->select('Perbaikan_Bobot')->first();
            $NilaiAwal = NilaiAwal::where('id_calon', $request->id_calon)->select($namaKolom[$i])->first();
            $namaKolom2 = $namaKolom[$i];
            $hasil = $NilaiAwal->$namaKolom2 ** $BobotKriteria->Perbaikan_Bobot;
            $total += $hasil;
            // input data ke nilai vektor s
            NilaiVektorS::where('id_calon', $request->id_calon)
                ->update([
                    $namaKolom2 => $hasil,
                    'jumlah' => $total,
                ]);
                }

        // input data ke vektor V
        $WartawanSemua = NilaiVektorS::get();
        $totalNilai = 0;
        $idCalon = [];
        for ($i=0; $i < count($WartawanSemua); $i++) { 
            $totalNilai += $WartawanSemua[$i]['jumlah'];
            array_push($idCalon, $WartawanSemua[$i]['id_calon']);
        }
        for ($i=0; $i < count($idCalon) ; $i++) { 
            $Wartawan1 = NilaiVektorS::where('id_calon', $idCalon[$i])->select('jumlah')->first();
            NilaiVektorV::where('id_calon', $idCalon[$i])
                    ->update([
                        'hasil' => $Wartawan1->jumlah/$totalNilai,
                    ]);
            HasilAkhir::where('id_calon', $idCalon[$i])
                    ->update([
                        'hasil' => $Wartawan1->jumlah/$totalNilai,
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
