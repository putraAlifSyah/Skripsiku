<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\DataKriteria;

class kriteriaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tambahColomn($query){
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'wartawan_spk');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          mysqli_query($connection, $query);
    }
    public function hapusKolom($query){
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'wartawan_spk');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          $added= mysqli_query($connection, $query);

          if($added !== FALSE)
          {
             echo("The column has been added.");
          }else{
            die(mysqli_error($connection));
          }
    }

    public function ubahKolom($query){
        $connection= mysqli_connect('127.0.0.1', 'root', '', 'wartawan_spk');
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
          }
          $added= mysqli_query($connection, $query);

          if($added !== FALSE)
          {
             echo("The column has been added.");
          }else{
            die(mysqli_error($connection));
          }
    }

    public function index()
    {
        $data=DataKriteria::all();
        return view ('/Data_Kriteria/DataKriteria', [
            'data'=>$data,
        ]);
    }


    // // fungsi untuk mengubah bobot data data sebelumnya
    function UbahBobot2($kodeData, $jmlBobot, $nilaiBobotAkhir){
        datakriteria::where('Kode', $kodeData)
                    ->update([
                        'Perbaikan_Bobot'=>$nilaiBobotAkhir,
                    ]);
    }
    function UbahBobot($kodeData, $request, $jmlBobot){
        datakriteria::where('Kode', $kodeData)
                    ->update([
                        'Perbaikan_Bobot'=>$request->Bobot/$jmlBobot,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $columns = Schema::getColumnListing('data_kriterias');
        // dd($columns[0]);
        return view('Data_Kriteria/TambahDataKriteria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Datakriteria $datakriteria)
    {
        
        // $namaKolom=str_replace(' ', '_', $request->Kriteria);
        // dd($namaKolom);
        // dd(str_replace(' ', '_', $request->Kriteria));
        // Mengambil data data dari record sebelumnya, untuk mengubah bobotnya secara otomatis saat menambahkan data baru
        $data=DataKriteria::all();
        $jmlBobot=0;
        $kode=[];
        $bobotSebelumnya=array();
        foreach($data as $data){
            $jmlBobot+= $data->Bobot;
            array_push($kode,$data->Kode);
            array_push($bobotSebelumnya,$data->Bobot);
        }
        $jmlBobot+=$request["Bobot"];
        $request["Perbaikan_Bobot"] = $request->Bobot/$jmlBobot;
        $panjangArray = count($kode);


        // cek duplikat
        $duplikat = DataKriteria::where('Kode',$request->Kode)->first();
        if($duplikat)
        {
            return back()->with('duplikat', 'Data dengan kode tersebut telah ada');
        }

        $validated = $request->validate([
            'Kode' => 'required|max:25',
            'Kriteria' => 'required',
            'Bobot' => 'required',
            'Perbaikan_Bobot' => 'required',
        ]);

        // melakukan perulangan untuk mengubah masing masing data bobot record sebelumnya, dan memanggul fungsi UbahBobot
        for ($i=1; $i <= $panjangArray; $i++) { 
            $nilaiBobotAkhir=$bobotSebelumnya[$i-1]/$jmlBobot;
            if (count($kode)<1) {
                self::UbahBobot($kode[$i-1], $data, $jmlBobot);
            }
            else{
                self::UbahBobot2($kode[$i-1], $jmlBobot, $nilaiBobotAkhir);
            }
        }

        DataKriteria::create($request->all());

        // menambah kolom baru di tabel nilai
        $namaKolom=str_replace(' ', '_', $request->Kriteria);
        // tambah kolom di tabel nilai_awal
        self::tambahColomn("ALTER TABLE nilai_awals ADD ". $namaKolom ." float(1) DEFAULT(0)");

        // tambah kolom di tabel vektor s
        self::tambahColomn("ALTER TABLE nilai_vektor_s ADD ". $namaKolom ." float(1) DEFAULT(0)");

        return redirect('/admin/datakriteria')->with ('status', 'Data telah berhasil ditambahkan');
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
    public function edit(Datakriteria $datakriteria)
    {
        return view ('Data_Kriteria/UbahDataKriteria', ['datakriteria'=>$datakriteria]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Request $request, $id
    public function update(Request $request, Datakriteria $datakriteria)
    {
        // cek duplikat
        $duplikat = DataKriteria::where('Kode',$request->Kode)->first();
        if($duplikat)
        {
            return back()->with('duplikat', 'Data dengan kode tersebut telah ada');
        }
        
        $request["Perbaikan_Bobot"] = $request->Bobot/24;
        $Perbaikan_Bobot = $request->Bobot/24;
        datakriteria::where('id', $datakriteria->id)
                    ->update([
                        'Kode'=>$request->Kode,
                        'Kriteria'=>$request->Kriteria,
                        'Bobot'=>$request->Bobot,
                        'Perbaikan_Bobot'=>$request->Perbaikan_Bobot,
                    ]);

        $data=DataKriteria::all();
        $jmlBobot=0;
        $kode=[];
        $bobotSebelumnya=array();
        foreach($data as $data){
            $jmlBobot+= $data->Bobot;
            array_push($kode,$data->Kode);
            array_push($bobotSebelumnya,$data->Bobot);
        }
        $panjangArray = count($kode);
        $jmlBobot-=$request->Bobot;
        $jmlBobot+=$request->Bobot;
        
        // var_dump($panjangArray);die;
        for ($i=1; $i <= $panjangArray; $i++) { 
            $nilaiBobotAkhir=$bobotSebelumnya[$i-1]/$jmlBobot;
            self::UbahBobot2($kode[$i-1], $jmlBobot, $nilaiBobotAkhir);
        }

        // ubah nama kolom tabel nilai awal
        $kolomLama=str_replace(' ', '_', $request->Kriteria_Lama);
        $kolomBaru=str_replace(' ', '_', $request->Kriteria);
        self::ubahKolom("ALTER TABLE nilai_awals CHANGE ". $kolomLama ." ".$kolomBaru. " INTEGER(10) DEFAULT(0)");

        // ubah nama kolom tabel nilai vektor s
        self::ubahKolom("ALTER TABLE nilai_vektor_s CHANGE ". $kolomLama ." ".$kolomBaru. " float(1) DEFAULT(0)");

        return redirect('/admin/datakriteria')->with('status', 'Data telah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data=DataKriteria::all();
        $dataTerhapus=DataKriteria::where('id', $id)->first(['Bobot'])->Bobot;
        

        // menghapus kolom kriteria di tabel nilai_awals
        $namaKolom=str_replace(' ', '_', $data[0]['Kriteria']);
        // dd($namaKolom);
        self::hapusKolom("ALTER TABLE `nilai_awals` DROP `$namaKolom`");
        // menghapus kolom kriteria di tabel nilai vektor s
        self::hapusKolom("ALTER TABLE `nilai_vektor_s` DROP `$namaKolom`");

        DataKriteria::destroy($id);
        $jmlBobot=0;
        $kode=[];
        $bobotSebelumnya=array();
        foreach($data as $data){
            $jmlBobot+= $data->Bobot;
            array_push($kode,$data->Kode);
            array_push($bobotSebelumnya,$data->Bobot);
        }
        $panjangArray = count($kode);
        $jmlBobot-=$dataTerhapus;
        // var_dump($jmlBobot);die;
        
        // var_dump($panjangArray);die;
        for ($i=1; $i <= $panjangArray; $i++) { 
            if ($panjangArray == 1) {
                return redirect('/admin/datakriteria')->with('status', 'Data telah berhasil dihapus');
            }
            $nilaiBobotAkhir=$bobotSebelumnya[$i-1]/$jmlBobot;
            self::UbahBobot2($kode[$i-1], $jmlBobot, $nilaiBobotAkhir);
        }
        return redirect('/admin/datakriteria')->with('status', 'Data telah berhasil dihapus');
    }
}
