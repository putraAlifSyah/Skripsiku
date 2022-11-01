@extends('HalamanUser/layoutuser/main')

@section('title','Home')

@section('konten')
{{-- konten --}}
<div class="container text-center">
  <div class="card mt-3" style="width: 60rem;">
    <div class="card-body">
      <p class="text-sm-center"><b><u>Selamat datang di website pendaftaran koran upeks</u></b></p>
      <p class="card-text">Silahkan membuat akun terlebih dahulu</p>
    </div>
  </div>
</div>

<div class="container">
  <div class="card mt-3" style="width: 30rem;">
    <div class="card-body">
      <p class="text-sm-start"><b><u>Tatacara Mendaftar</u></b></p>
      {{-- <p>{{ Auth::user()->name }}</p><br> --}}
      <p class="card-text">Pertama silahkan membuat akun. kemudian login menggunakan akun yang telah dibuat. berikutnya, lengkapi biodata untuk melakukan pendaftaran. terakhir tekan tombol "daftar" yang tersedia sesuai dengan periode yang diikuti</p>
    </div>
  </div>
  </div>
  </div>

  <div class="container">
    <div class="card mt-3" style="width: 30rem;">
      <div class="card-body">
        <p class="text-sm-start"><b><u>Periode yang terbuka:</u></b></p>
        <p class="card-text">Tidak ada</p>
      </div>
    </div>
    </div>
    </div>
</div>
@endsection