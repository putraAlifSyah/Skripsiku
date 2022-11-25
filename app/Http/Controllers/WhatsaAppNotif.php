<?php

namespace App\Http\Controllers;

use App\Models\HasilAkhir;
use App\Models\User;
use App\Models\Wartawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// require_once '/path/to/vendor/autoload.php'; 

class WhatsaAppNotif extends Controller
{
    public function kirimNotif(Request $request){
        $hasil = HasilAkhir::where('id_calon', $request->hasilakhir)->first();
        $data = Wartawan::where('id_wartawan', $request->hasilakhir)->first();
        $email = User::where('id', $data->id_user)->first();
        $pesan ='';
        if ($hasil->status == 'Diterima') {
            $pesan = 'Selamat '. $data->Nama. ' Anda telah diterima menjadi wartawan di kantor media koran upeks. silahkan menghubungi nomor dibawah untuk info lebih lanjut';
        }else if ($hasil->status == 'Ditolak') {
            $pesan = 'Mohon Maaf '. $data->Nama. ' Anda belum memenuhi kriteria kami';
        }else{
            return redirect('/admin/hasilakhir')->with('status', 'Harap memilih diterima atau ditolak terlebih dahulu');
        }
        Mail::raw($pesan, function ($message) use ($email){
            $message->from('upeks@upeks.co.id', 'Upeks');
            $message->to($email->email, $email->name);
            $message->subject('Hasil Seleksi Upeks');
        });
    }
}
