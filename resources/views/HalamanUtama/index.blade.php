@extends('../layout/main')

@section('title','Home')



@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
            </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection



@section('konten')
<div class="container">
    <div class="card">
        {{-- <div class="card-header">
          Welcome
        </div> --}}
        <div class="card-body">
          <h5 class="card-title">Selamat datang di aplikasi SPK Penerimaan Wartawan</h5>
          <p class="card-text">Alur Penggunaan Aplikasi</p>
          <p class="card-text">1. Membuat periode pendaftaran agar user dapat melakukan pendaftaran</p>
          <p class="card-text">2. Melakukan verifikasi data calon wartawan yang telah mendaftar di bagian menu "Calon Wartawan"</p>
          <p class="card-text">3. Membuat data kriteria yang akan dijadikan sebagai atribut dalam penilaian wartawan</p>
          <p class="card-text">4. Menginputkan data nilai wartawan yang telah diverifikasi pada menu Nilai>Nilai awal</p>
          <p class="card-text">5. Melihat hasil akhir pada menu Hasil SPK, kemudian mengirimkan notifikasi pada user yang telah diterima</p>
          <a href="/admin/periode" class="btn btn-primary">Mulai</a>
        </div>
      </div>
</div>
@endsection
