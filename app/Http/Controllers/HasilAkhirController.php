<?php

namespace App\Http\Controllers;

use App\Models\HasilAkhir;
use App\Models\Periode;
use Illuminate\Http\Request;

class HasilAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view ('/Hasil_Akhir/HasilAkhir', [
            'hasilakhir'=>HasilAkhir::orderBy('hasil', 'desc')->paginate(10),
            'Periode' => $Periode=Periode::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, HasilAkhir $hasilAkhir)
    {
        dd($request->kontak);
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

    public function terima(Request $request){
        // dd($request->hasilakhir);
        HasilAkhir::where('id_calon', $request->hasilakhir)
                    ->update([
                        'status'=>'Diterima',
                    ]);
        return redirect('/admin/hasilakhir');
    }

    public function tolak(Request $request){
        // dd($request->hasilakhir);
        HasilAkhir::where('id_calon', $request->hasilakhir)
                    ->update([
                        'status'=>'Ditolak',
                    ]);
        return redirect('/admin/hasilakhir');
    }

    public function filter(Request $request)
    {
        // dd($request->Periode);
        if ($request->Periode == NULL) {
            return redirect('/admin/hasilakhir');
        }
        else{
            $hasilakhir=HasilAkhir::where('Periode', $request->Periode)->orderBy('hasil', 'desc')->paginate(5);
            $Periode=Periode::all();
            return view ('/Hasil_Akhir/HasilAkhir', [
                'hasilakhir'=>$hasilakhir,
                'Periode' => $Periode
            ]);
        }
    }
}
