
@extends('../layout/main')

@section('title','Home')

@section('juduldalam')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Ubah Data</h1>
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
<form method="post" action="/admin/periode/{{$periode->id}}">
   @method('PATCH')
    @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">
    
        <div class="form-group">
            <label for="Periode_Penerimaan">Periode_Penerimaan/Simbol</label>
            <input type="text" class="form-control" id="Periode_Penerimaan" name="Periode_Penerimaan" value="{{ $periode->Periode_Penerimaan }}">
        </div>

        <div class="form-group">
            <label for="Tanggal_Mulai_Ujian">Tanggal_Mulai_Ujian</label>
            <input type="date" class="form-control" id="Tanggal_Mulai_Ujian" name="Tanggal_Mulai_Ujian" value="{{ $periode->Tanggal_Mulai_Ujian }}">
        </div>

        <div class="form-group">
            <label for="Tanggal_Akhir_Ujian">Tanggal_Akhir_Ujian</label>
            <input type="date" class="form-control" id="Tanggal_Akhir_Ujian" name="Tanggal_Akhir_Ujian" value="{{ $periode->Tanggal_Akhir_Ujian }}">
        </div>

        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <input type="text" class="form-control" id="Keterangan" name="Keterangan" value="{{ $periode->Keterangan }}">
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