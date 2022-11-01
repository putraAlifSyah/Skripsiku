@extends('HalamanUser/layoutuser/main')

@section('title','Biodata')

@section('konten')
<div class="container mt-3">
    <h3>Isi biodata</h3>
    <form>
        <div class="form-group row">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="nama_lengkap">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="alamat" class="col-lg-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="password" class="form-control" id="alamat"></textarea>
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nomor Handphone</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="nama_lengkap">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Ijazah Terakhir</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="nama_lengkap">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">CV</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="nama_lengkap">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Surat Lamaran</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="nama_lengkap">
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="nama_lengkap" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="nama_lengkap">
            </div>
        </div>
    </form>
</div>
@endsection