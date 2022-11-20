@extends('HalamanUser/layoutuser/main')

@section('title', 'Home')

@section('konten')
@php
    // echo "Tanggal akhir pendaftaran".$tanggal->Tanggal_Akhir_Pendaftaran;
    // echo "          Tanggal hari ini".date("Y-m-d");
    // echo $tanggal->Tanggal_Akhir_Pendaftaran;
    // dd(date("Y-m-d")>$tanggal->Tanggal_Akhir_Pendaftaran);
    // $tanggalAkhir=$tanggal->Tanggal_Akhir_Pendaftaran;
    // dd($tanggal->Tanggal_Akhir_Pendaftaran);
    // dd($periode[0]['Periode_Penerimaan']);
@endphp
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
                        Pemberitahuan
                    </div>
                    <div class="card-body">
                        <p class="text-sm"><b><u>Selamat datang di website pendaftaran koran upeks</u></b></p>
                        @if (!Auth::check())
                            <p class="card-text">Silahkan membuat akun terlebih dahulu dengan menekan tombol daftar di bawah</p>
                        @endif

                        @if (Auth::check())
                            @if ($dataWartawan)
                                <p>Anda telah mendaftarkan diri pada periode: {{ $dataWartawan->Periode }}. <br>Silahkan datang ke kantor untuk mengikuti seleksi sesuai jadwal yang telah ditentukan
                                <br>
                                Jadwal Ujian: {{ $tanggal->Tanggal_Mulai_Ujian}}
                                <br>
                                Keterangan: {{ $tanggal->Keterangan }}
                                </p>

                                {{-- <div class="col-md-18">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">Terdapat kesalahan dalam mengisi Biodata? atau ingin mengganti periode? silahkan klik tombol dibawah</p>
                                            <a  class='btn btn-success' href="">Edit Data</a>
                                        </div>
                                    </div>
                                </div> --}}
                            @else
                                <p>Anda belum mendaftarkan diri untuk mengikuti proses seleksi, silahkan mendaftar terlebih dahulu dengan memilih periode yang ingin diikuti dibawah ini</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Pemberitahuan
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

        @if (!Auth::check() || $ada == false)
            <h3>Periode Terbuka</h3>
            @if (count($periode) > 0)
            <div class="row">
            @foreach ($periode as $data)
                <div class="col-md-4 my-3">
                    <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Terbuka</h5>
                            <p class="card-text">
                                Periode Pendaftaran: {{ $data['Periode_Penerimaan'] }} <br>
                                Tanggal Pendaftaran: {{ $data['Tanggal_Mulai_Pendaftaran'] }} s/d {{ $data['Tanggal_Akhir_Pendaftaran'] }} <br>
                                Tanggal Ujian : {{ $data['Tanggal_Mulai_Ujian'] }}
                            </p>
                            <a href="/periodeDaftar/{{ $data->id }}/daftar" class="btn btn-primary">Daftar</a>
                                {{-- <a href="/periodeDaftar/{{ $data->id }}/daftar" class="btn btn-primary">Daftar</a> --}}
                            </div>
                        </div>
                    </div>
                {{-- @endif --}}
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

        @endif

        @if (Auth::check())
            @if ($dataWartawan)
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Terdapat kesalahan dalam mengisi Biodata? atau ingin mengganti periode? silahkan klik tombol dibawah</p>
                                <a  class='btn btn-success' href="/editBiodata/{{ Auth::user()->id }}">Edit Data</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif

        
    @endsection
