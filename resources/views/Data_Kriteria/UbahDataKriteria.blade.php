
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
<form method="post" action="/admin/datakriteria/{{$datakriteria->id}}">
   @method('PATCH')
    @csrf
   <!-- name adalah hal yang penting, sesuaikan dengan database -->
   <div class="card-body">
   <div class="row">
   <div class="col-md-4 offset-md-4">


        <div class="form-group">
            <label for="Kode">Kode/Simbol</label>
            <select name="Kode" class="form-control" id="Kode">
                <option value="">{{ $datakriteria->Kode }}</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
                <option value="C3">C3</option>
                <option value="C4">C4</option>
                <option value="C5">C5</option>
                <option value="C6">C6</option>
            </select>
            @if (session('duplikat'))
                <div class="alert alert-danger">
                    {{ session('duplikat') }}
                </div>
            @endif 
        </div>
    
        {{-- <div class="form-group">
            <label for="Kode">Kode/Simbol</label>
            <input type="text" class="form-control" id="Kode" name="Kode" value="{{ $datakriteria->Kode }}">
        </div> --}}

        <div class="form-group">
            <label for="Kriteria">Kriteria</label>
            <input type="text" class="form-control" id="Kriteria" name="Kriteria" value="{{ $datakriteria->Kriteria }}">
        </div>

        <div class="form-group">
            <label for="Bobot">Bobot</label>
            <input type="number" class="form-control" id="Bobot" name="Bobot" value="{{ $datakriteria->Bobot }}">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" id="Perbaikan_Bobot" name="Perbaikan_Bobot" value="{{ $datakriteria->Perbaikan_Bobot }}">
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