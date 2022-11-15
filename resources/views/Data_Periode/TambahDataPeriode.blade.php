@extends('../layout/main')

@section('title','Tambah Data')
@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tambah Data</h1>
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
<form method="post" action="/admin/periode">
   @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
        <div class="form-group">
            <label for="Periode_Penerimaan" class="col-xs-2 col-form-label">Periode Pendaftaran</label>
            <input type="text" class="form-control" id="Periode_Penerimaan" name="Periode_Penerimaan" value="{{ old('Periode_Penerimaan') }}">
            @if($errors->has('Periode_Penerimaan'))
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('Periode_Penerimaan') }}
            </div>
            @endif
        </div>

        <div class="form-group">
            <label for="Tanggal_Mulai_Pendaftaran">Tanggal Mulai Pendaftaran</label>
            <input type="date" class="form-control" id="Tanggal_Mulai_Pendaftaran" name="Tanggal_Mulai_Pendaftaran" value="{{ old('Tanggal_Mulai_Pendaftaran') }}">
        </div>

        <div class="form-group">
            <label for="Tanggal_Akhir_Pendaftaran">Tanggal Akhir Pendaftaran</label>
            <input type="date" class="form-control" id="Tanggal_Akhir_Pendaftaran" name="Tanggal_Akhir_Pendaftaran" value="{{ old('Tanggal_Akhir_Pendaftaran') }}">
        </div>

        <div class="form-group">
            <label for="Tanggal_Mulai_Ujian">Tanggal Ujian</label>
            <input type="date" class="form-control" id="Tanggal_Mulai_Ujian" name="Tanggal_Mulai_Ujian" value="{{ old('Tanggal_Mulai_Ujian') }}">
        </div>

        <div class="form-group">
            <label for="Keterangan" class="col-xs-2 col-form-label">Keterangan</label>
            <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="{{ old('Keterangan') }}">
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </div>
    </div>
</form>
    </tbody>
    </table>
<!-- </div> -->
@endsection     