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
{{-- <div class="container"> --}}
    <div class="card">
    <div class="card-body">
    <div class="pull-left" style="margin-bottom:10px">
        <strong>Data Wartawan</strong>
    </div>
    <div class="pull-right">
        <div class="input-group mb-3">
            <form action="/admin/filter" style="display: flex" method="get"> 
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
    <table class="table table-striped" id="myTable">
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
            {{-- <th>CV</th> --}}
            <th>Surat_Lamaran</th>
            <th>Verifikasi</th>
            <th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="table table-hover">
   
    @foreach($data as $datas)
        <tr class="text=center">
            <td>{{$loop->iteration}}</td>
            <td>{{$datas->Nama}}</td>
            <td>{{$datas->Alamat}}</td>
            <td>{{$datas->Handphone}}</td>
            <td>{{$datas->Pendidikan}}</td>
            <td> <img src="{{ asset('storage/'.$datas->Foto) }}" alt="" style="width: 200px"> </td>
            <td><a href="{{ asset('storage/'.$datas->Ijazah_Terakhir)}}" class="btn btn-success rounded"><i class="fa-solid fa-certificate"></i></a></td>
            <td><a href="{{ asset('storage/'.$datas->KTP)}}" class="btn btn-success rounded"><i class="fa-solid fa-id-card"></i></a></td>
            <td><a href="{{ asset('storage/'.$datas->Surat_Lamaran)}}" class="btn btn-success rounded"><i class="fa-solid fa-envelope"></i></a></td>
            <td>{{$datas->Verifikasi}}</td>
            <td>{{$datas->Periode}}/{{ $datas->Periode+1 }}</td>
                <td>
                <div class="card-body">
                    <a href="wartawan/{{$datas->id_wartawan}}/verifikasi" class="btn-sm btn-success rounded tombol">Verifikasi</a>
                </div>
                </td>
        </tr>
    </div>
    @endforeach

    </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          {{ $data->links() }}
        </ul>
      </nav>
    </div>
    </div>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    </div>
<!-- </div> -->
@endsection