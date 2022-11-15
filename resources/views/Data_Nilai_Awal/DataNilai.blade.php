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
                         <i>Data Nilai Awal</i>
                        </ol>
                    </div>
                </div>
            </div>
             
</div>
@endsection

@section('konten')

{{-- nilai awal --}}
<div class="container">
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data Data Nilai Awal</strong>
    </div>
    <div class="pull-right">
        <a href="/admin/periode/tambah" class="btn-sm btn-success rounded mb-5">Tambah Data</a>
    </div>
    <table class="table table-striped">
    <thead class="table-dark">
        {{-- @php
            dd($namaKolom);
        @endphp --}}
        <tr>
            <th>No</th>
            <th>Nama Calon</th>
            <th>Periode</th>
            @if (count($namaKolom) > 6)
                @for ($i = 6; $i < count($namaKolom); $i++)
                    <th>{{ str_replace('_', ' ', $namaKolom[$i]) }}</th>
                @endfor
            @endif
                <th>Aksi</th>
            </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($datas as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_calon}}</td>
            <td>{{$data->periode}}</td>
            @if (count($namaKolom) > 6)
            @for ($i = 6; $i < count($namaKolom); $i++)
                @php
                    $namaValue=$namaKolom[$i];
                @endphp
                <td>{{ $data->$namaValue }}</td>
            @endfor
            @endif
                <td>
                <div class="card-body">
                    <a href="nilaiawal/{{$data->id}}/input" class="btn-sm btn-primary rounded tombol">Input Nilai</a>
                    <a href="nilaiawal/{{$data->id}}/edit" class="btn-sm btn-primary rounded tombol">Edit Nilai</a>
                    <div class="clear"></div>
                </div>
                </td>
        </tr>
    </div>
    @endforeach
</tbody>

</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
      {{ $datas->links() }}
    </ul>
  </nav>
    </div>
    </div>
    </div>
<!-- </div> -->
{{-- akhir --}}


{{-- Nilai Vektor s --}}

{{-- Akhir --}}

@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif
@endsection

