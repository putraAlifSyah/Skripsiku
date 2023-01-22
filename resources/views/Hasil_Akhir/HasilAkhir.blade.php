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
                         <i>Data Hasil Akhir</i>
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
        <strong>Data Akhir Hasil Perengkingan</strong>
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
    </div>  
    <table class="table table-striped">
    <thead class="table-dark">
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
    @if ($loop->index < 5)
    <tr class="text=center">
        <td>{{$loop->iteration}}</td>
        <td>{{$data->nama_calon}}</td>
        <td>{{$data->periode}}</td>
        <td>{{$data->hasil}}</td>
        @if($data->status != "Diterima")
            <td>Direkomendasikan</td>
        @else
            <td>{{$data->status}}</td>
        @endif
        <td>
            <div class="card-body">
                <a href="/admin/hasilakhir/{{$data->id_calon}}/terima" class="btn btn-success rounded" onclick="return confirm('Ingin Mengirim Notifikasi Ke User?')">Terima</a>
                <a href="/admin/hasilakhir/{{$data->id_calon}}/tolak" class="btn btn-danger rounded" onclick="return confirm('Ingin Mengirim Notifikasi Ke User?')">Tolak</a>
                {{-- <a href="kirimNotif/{{$data->id_calon}}" class="btn btn-warning rounded"><i class="fa-solid fa-envelope"></i>      Kirim Notif</a> --}} 
            </div>
            </td>
    </tr>
    @else
        <tr class="text=center  bg-secondary">
            <td>{{$loop->iteration}}</td>
            <td>{{$data->nama_calon}}</td>
            <td>{{$data->periode}}</td>
            <td>{{$data->hasil}}</td>
            <td>{{$data->status}}</td>
            <td>
                <div class="card-body">
                    <a href="/admin/hasilakhir/{{$data->id_calon}}/terima" class="btn btn-success rounded" onclick="return confirm('Ingin Mengirim Notifikasi Ke User?')">Terima</a>
                    <a href="/admin/hasilakhir/{{$data->id_calon}}/tolak" class="btn btn-danger rounded" onclick="return confirm('Ingin Mengirim Notifikasi Ke User?')">Tolak</a>
                    {{-- <a href="kirimNotif/{{$data->id_calon}}" class="btn btn-warning rounded"><i class="fa-solid fa-envelope"></i>      Kirim Notif</a> --}} 
                </div>
                </td>
        </tr>
    @endif
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



    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


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

