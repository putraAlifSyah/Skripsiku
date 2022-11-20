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
        <strong>Data Periode</strong>
    </div>
    <div class="pull-right">
        <a href="/admin/periode/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped" id="myTable">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Periode Pendaftaran</th>
            <th>Tanggal Mulai Pendaftaran</th>
            <th>Tanggal Akhir Pendaftaran</th>
            <th>Tanggal Mulai Ujian</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $data)
            <tr class="text=center">
                <td>{{$loop->iteration}}</td>
                <td>{{$data->Periode_Penerimaan}}/{{$data->Periode_Penerimaan+1}}</td>
                <td>{{$data->Tanggal_Mulai_Pendaftaran}}</td>
                <td>{{$data->Tanggal_Akhir_Pendaftaran}}</td>
                <td>{{$data->Tanggal_Mulai_Ujian}}</td>
                <td>{{$data->Keterangan}}</td>
                    <td>
                    <div class="card-body">
                        <a href="periode/{{$data->id}}/edit" class="btn-sm btn-primary rounded tombol">Ubah</a>
                        <form action="/admin/periode/{{$data->id}}" method="post" class="ini">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn-xs btn-danger rounded mt-2" onclick="return confirm('Are you sure?')" style="font-size:13.5px">Hapus</buton>          
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