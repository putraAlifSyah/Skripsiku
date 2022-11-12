@extends('HalamanUser/layoutuser/main')

@section('title', 'Home')

@section('konten')
    {{-- konten --}}
    {{-- {{ dd() }} --}}
    {{-- <embed src="{{ asset('storage/'. $data[0]['Foto'])}}" width="800px" height="2100px" /> --}}
    {{-- <a href="">
    <embed width="191" height="207" name="plugin" src="{{ asset('storage/'. $data[0]['Foto'])}}" type="application/pdf">
    </a> --}}
    {{-- <object data="https://sumanbogati.github.io/tiny.pdf" type="application/pdf" width="100%" height="100%"> <a href="https://sumanbogati.github.io/tiny.pdf">test.pdf</a></object>    --}}
      {{-- {{ $data }} --}}
    {{-- {{ dd($data[0]['CV']) }} --}}
    {{-- <img src="{{ asset('storage/'  . $data[0]['CV']) }}" alt=""> --}}
    <div class="container">
        <!--Row with two equal columns-->
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        <p class="text-sm-center"><b><u>Selamat datang di website pendaftaran koran upeks</u></b></p>
                        <p class="card-text">Silahkan membuat akun terlebih dahulu</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Featured
                    </div>
                    <div class="card-body">
                        {{-- <p>{{ Auth::user()->name }}</p><br> --}}
                        <p class="card-text">Pertama silahkan membuat akun. kemudian login menggunakan akun yang telah
                            dibuat. berikutnya, lengkapi biodata untuk melakukan pendaftaran. terakhir tekan tombol "daftar"
                            yang tersedia sesuai dengan periode yang diikuti</p>
                    </div>
                </div>
            </div>
        </div>
        <h3>Periode Terbuka</h3>
        @if (count($periode) > 0)
        <div class="row">
          @foreach ($periode as $data)
            <div class="col-md-4 my-3">
                <div class="card">

                    <div class="card-body">
                      <h5 class="card-title">Terbuka</h5>
                      <p class="card-text">
                        Periode Pendaftaran: {{ $data->Periode_Penerimaan }} <br>
                          Tanggal Pendaftaran: {{ $data->Tanggal_Mulai_Pendaftaran }} s/d {{ $data->Tanggal_Akhir_Pendaftaran }} <br>
                          Tanggal Ujian : {{ $data->Tanggal_Mulai_Ujian }}
                        </p>
                        <a href="#" class="btn btn-primary">Daftar</a>
                    </div>
                </div>
            </div>
          @endforeach
      </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-4 my-3">
                <div class="card">

                    <div class="card-body">
                      <p class="card-text">Tidak ada</p>
                    </div>
                </div>
            </div>
        </div>
          </div>
        @endif

        {{-- 
<div class="row mt-3" >
    <div class="col-md-6" style="margin-top: -5rem">
      <div class="card-body">
        <p class="text-sm-start"><b><u>Periode yang terbuka:</u></b></p>
        @if (count($periode) > 0)          
        @foreach ($periode as $data)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Terbuka</h5>
            <p class="card-text">
              Periode Pendaftaran: {{ $data->Periode_Penerimaan }} <br>
                Tanggal Pendaftaran: {{ $data->Tanggal_Mulai_Pendaftaran }} s/d {{ $data->Tanggal_Akhir_Pendaftaran }} <br>
                Tanggal Ujian : {{ $data->Tanggal_Mulai_Ujian }}
              </p>
              <a href="#" class="btn btn-primary">Daftar</a>
            </div>
          </div>
          <br>
          @endforeach
        @else
        <p class="card-text">Tidak ada</p>
        @endif
      </div>
    </div>
</div>
</div> --}}
        {{-- <div class="container text-center">
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
        <p>{{ Auth::user()->name }}</p><br>
        {{-- <p class="card-text">Pertama silahkan membuat akun. kemudian login menggunakan akun yang telah dibuat. berikutnya, lengkapi biodata untuk melakukan pendaftaran. terakhir tekan tombol "daftar" yang tersedia sesuai dengan periode yang diikuti</p>
      </div>
    </div>
    </div>
    </div> --}}

        {{-- <div class="container">
    <div class="card mt-3" style="width: 30rem;">
      <div class="card-body">
        <p class="text-sm-start"><b><u>Periode yang terbuka:</u></b></p>
        @if (count($periode) > 0)          
        @foreach ($periode as $data)
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Terbuka</h5>
            <p class="card-text">
              Periode Pendaftaran: {{ $data->Periode_Penerimaan }} <br>
                Tanggal Pendaftaran: {{ $data->Tanggal_Mulai_Pendaftaran }} s/d {{ $data->Tanggal_Akhir_Pendaftaran }} <br>
                Tanggal Ujian : {{ $data->Tanggal_Mulai_Ujian }}
              </p>
              <a href="#" class="btn btn-primary">Daftar</a>
            </div>
          </div>
          <br>
          @endforeach
        @else
        <p class="card-text">Tidak ada</p>
        @endif
      </div>
    </div>
    </div>
    </div>
</div> --}}
    @endsection
