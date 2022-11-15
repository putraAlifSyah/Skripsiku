@extends('../layout/main')

@section('title','Tambah Data')
@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Input Nilai</h1>
            </div>
        </div>
        </div>
         <div class="col-sm-8">
             <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                       <!-- <li><i>Tambah Data</i></li> -->
                    </ol>
                </div>
            </div>
        </div>
</div>
@endsection

@section('konten')
<!-- <div class="container"> -->
<form method="post" action="/admin/nilaiawal/input">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">

       

        <div class="form-group">
            <label for="nama_calon" class="col-xs-2 col-form-label">Nama Calon</label>
            <input type="text" class="form-control" id="nama_disable" name="nama_disable" value="{{ $data->nama_calon }}" disabled>
        </div>

        @if (count($namaKolom) > 6)
            @for ($i = 6; $i < count($namaKolom); $i++)
                <div class="form-group">
                    <label for="{{ $namaKolom[$i] }}">{{ str_replace('_', ' ', $namaKolom[$i]) }}</label>
                    <input type="number" class="form-control" id="{{ $namaKolom[$i] }}" name="{{ $namaKolom[$i] }}" value="">
                </div>
            @endfor
        @endif

        <input type="hidden" class="form-control" id="id_calon" name="id_calon" value="{{ $data->id_calon }}">
        <input type="hidden" class="form-control" id="periode" name="periode" value="{{ $data->periode }}">
        <input type="hidden" class="form-control" id="nama_calon" name="nama_calon" value="{{ $data->nama_calon }}">
        <input type="hidden" class="form-control" id="id" name="id" value="{{ $data->id }}">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
<!-- </div> -->
@endsection     