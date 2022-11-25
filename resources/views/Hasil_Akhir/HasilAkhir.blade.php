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
        <strong>Data Akhir</strong>
    </div>
    <div class="pull-right">
        <div class="input-group mb-3">
            <form action="/admin/hasilakhir/filter" style="display: flex" method="get"> 
            {{-- @csrf --}}
            <select name="Periode" class="form-control mb-1 mr-2" id="Periode" style="display: inline">
                <option value="">Pilih Periode</option>
                    @foreach ($Periode as $item)
                        <option value="{{ $item->Periode_Penerimaan }}">{{ $item->Periode_Penerimaan }}</option>
                    @endforeach
            </select>
            <button class="btn-sm btn-outline-secondary rounded mt-0.5" type="submit" id="button-addon2" style="height: 35px">Filter</button>
        </form>
        </div>
        {{-- <select name="Periode" class="form-control mb-2" id="Periode" style="display: inline">
            <option value="">Pilih Periode</option>
                <option value="">2021</option>
                <option value="">2022</option>
        </select> --}}
        {{-- <a href="">Filter</a> --}}
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
            <th>Hasil</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($hasilakhir as $data)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_calon}}</td>
            <td>{{$data->periode}}</td>
            <td>{{$data->hasil}}</td>
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    <a href="/admin/hasilakhir/{{$data->id_calon}}/terima" class="btn btn-success rounded">Terima</a>
                    <a href="/admin/hasilakhir/{{$data->id_calon}}/tolak" class="btn btn-danger rounded">Tolak</a>
                    <a href="kirimNotif/{{$data->id_calon}}" class="btn btn-warning rounded"><i class="fa-solid fa-envelope"></i>      Kirim Notif</a>
                    {{-- <form action="kirimNotif" method="get" class="ini">
                        <input type="hidden" value="{{ $data->kontak }}" name="kontak">
                        <button type="submit" class=" btn btn-warning rounded"><i class="menu-icon fa-brands fa-whatsapp"></i>   Notifikasi</buton>          
                    </form>  --}}
                    {{-- <a href="/admin/notif/{{$data->}}" class="btn-sm btn-primary rounded tombol"><i class="menu-icon fa-brands fa-whatsapp"></i>   Kirim Notifikasi</a> --}}
                </div>
                </td>
        </tr>
    </div>
    @endforeach
</tbody>

</table>
<nav aria-label="Page navigation example">
    <ul class="pagination">
      {{ $hasilakhir->links() }}
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
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        @if (session('gagal'))
            <div class="alert alert-danger">
                {{ session('gagal') }}
            </div>
        @endif
@endsection

