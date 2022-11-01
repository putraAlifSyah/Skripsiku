@extends('../layout/main')

@section('title','Home')

@section('juduldalam')
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
    <div class="pull-right">
        <a href="/admin/wartawan/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Handphone</th>
            <th>Pendidikan Terakhir</th>
            <th>KTP</th>
            <th>Ijazah_Terakhir</th>
            <th>Foto</th>
            <th>CV</th>
            <th>Surat_Lamaran</th>
            <th>Verifikasi</th>
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
            <td>{{$data->KTP}}</td>
            <td>{{$data->Ijazah_Terakhir}}</td>
            <td>{{$data->Foto}}</td>
            <td>{{$data->CV}}</td>
            <td>{{$data->Surat_Lamaran}}</td>
            <td>{{$data->Verifikasi}}</td>
                <td>
                <div class="card-body">
                    <a href="wartawan/{{$data->id}}/edit" class="btn-sm btn-primary rounded tombol">Ubah</a>
                    <form action="/admin/wartawan/{{$data->id}}" method="post" class="ini">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-xs btn-danger rounded" onclick="return confirm('Are you sure?')" style="font-size:13.5px">Hapus</buton>          
                    </form> 
                    <div class="clear"></div>
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