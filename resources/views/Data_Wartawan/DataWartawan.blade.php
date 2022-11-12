@extends('../layout/main')

@section('title','Home')

@section('juduldalam')
{{-- @php
    dd(Auth::user()->LevelLogin);
@endphp --}}
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1 style="font-size:18px;">Data</h1>
            </div>
            </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                         <i>Data Periode</i>
                        </ol>
                    </div>
                </div>
            </div>
             
</div>
@endsection

@section('konten')
<div class="container">
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data Wartawan</strong>
    </div>
    {{-- <div class="pull-right">
        <a href="/admin/wartawan/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div> --}}
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Handphone</th>
            <th>Pendidikan Terakhir</th>
            <th>Foto</th>
            <th>Ijazah_Terakhir</th>
            <th>KTP</th>
            <th>CV</th>
            <th>Surat_Lamaran</th>
            <th>Verifikasi</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->Nama}}</td>
            <td>{{$data->Alamat}}</td>
            <td>{{$data->Handphone}}</td>
            <td>{{$data->Pendidikan}}</td>
            <td> <img src="{{ asset('storage/'.$data->Foto) }}" alt="" style="width: 200px"> </td>
            <td><a href="{{ asset('storage/'.$data->Ijazah_Terakhir) }}">Ijazah</a></td>
            <td><a href="{{ asset('storage/'.$data->KTP) }}">KTP</a></td>
            <td><a href="{{ asset('storage/'.$data->CV) }}">CV</a></td>
            <td><a href="{{ asset('storage/'.$data->Surat_Lamaran) }}">Surat Lamaran</a></td>
            <td>{{$data->Verifikasi}}</td>
            <td>{{$data->Periode}}/{{ $data->Periode+1 }}</td>
                <td>
                <div class="card-body">
                    <a href="wartawan/{{$data->id_wartawan}}/verifikasi" class="btn-sm btn-success rounded tombol">Verifikasi</a>
                </div>
                </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    </div>
    </div>
    </div>
<!-- </div> -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
@endsection