@extends('HalamanUser/layoutuser/main')

@section('title','Biodata')

@section('konten')
<div class="container mt-3">
    <h3>Isi biodata</h3>
    {{-- periodeDaftar/1/daftar --}}
    <form method="post" action="/simpanEdit" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        {{-- menyimpan nama nama file lama --}}
        <input type="hidden" class="form-control" id="old_KTP" name="old_KTP" value="{{ $data->KTP }}">
        <input type="hidden" class="form-control" id="old_ijazah" name="old_ijazah" value="{{ $data->Ijazah_Terakhir }}">
        <input type="hidden" class="form-control" id="old_cv" name="old_cv" value="{{ $data->CV }}">
        <input type="hidden" class="form-control" id="old_suratLamaran" name="old_suratLamaran" value="{{ $data->Surat_Lamaran }}">
        <input type="hidden" class="form-control" id="old_foto" name="old_foto" value="{{ $data->Foto }}">
        {{-- akhir --}}

        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Nama" name="Nama" value="{{ $data->Nama }}">
                @if($errors->has('Nama'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Nama') }}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="Alamat" class="col-lg-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="Alamat" name="Alamat">{{ $data->Alamat }}</textarea>
                @if($errors->has('Alamat'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Alamat') }}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="Handphone" class="col-sm-2 col-form-label">Nomor Handphone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Handphone" name="Handphone" value="{{ $data->Handphone }}">
                @if($errors->has('Handphone'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Handphone') }}
                </div>
                @endif
            </div>
        </div>
        <div class="form-group row mt-3">
            <label for="Pendidikan" class="col-sm-2 col-form-label">Pendidikan</label>
            <div class="col-sm-10">
                <select name="Pendidikan" class="form-control" id="Pendidikan">
                    <option value="{{ $data->Pendidikan }}">{{ $data->Pendidikan }}</option>
                        <option value="SD/Sederajat">SD/Sederajat</option>
                        <option value="SMP/Sederajat">SMP/Sederajat</option>
                        <option value="SMA/Sederajat">SMK/Sederajat</option>
                        <option value="Sarjana/Lebih Tinggi">Sarjana/Lebih Tinggi</option>
                </select>
                @if($errors->has('Pendidikan'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Pendidikan') }}
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="Periode" class="col-sm-2 col-form-label">Periode</label>
            <div class="col-sm-10">
                <select name="Periode" class="form-control" id="Periode">
                    <option value="{{ $data->Periode }}">{{ $data->Periode }}</option>
                    @foreach($periode as $data)
                        <option value="{{ $data->Periode_Penerimaan }}">{{ $data->Periode_Penerimaan }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="KTP" class="col-sm-2 col-form-label">KTP</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="KTP" name="KTP">
                @if($errors->has('KTP'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('KTP') }}
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="Ijazah_Terakhir" class="col-sm-2 col-form-label">Ijazah Terakhir</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="Ijazah_Terakhir" name="Ijazah_Terakhir">
                @if($errors->has('Ijazah_Terakhir'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Ijazah_Terakhir') }}
                </div>
                @endif
            </div>
        </div>

        <div class="form-group row mt-3">
            <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="Foto" name="Foto">
                @if($errors->has('Foto'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Foto') }}
                </div>
                @endif
            </div>
        </div>
        {{-- <div class="form-group row mt-3">
            <label for="CV" class="col-sm-2 col-form-label">CV</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="CV" name="CV">
                @if($errors->has('CV'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('CV') }}
                </div>
                @endif
            </div> --}}

        <div class="form-group row mt-3">
            <label for="Surat_Lamaran" class="col-sm-2 col-form-label">Surat Lamaran</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="Surat_Lamaran" name="Surat_Lamaran">
                @if($errors->has('Surat_Lamaran'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('Surat_Lamaran') }}
                </div>
                @endif
            </div>
        </div>

        

        <input type="hidden" class="form-control" id="Verifikasi" name="Verifikasi" value="Belum">
        <input type="hidden" class="form-control" id="CV" name="CV" value="CV_wartawan">
        <input type="hidden" class="form-control" id="Melamar" name="Melamar" value="Sudah">
        <input type="hidden" class="form-control" id="id_wartawan" name="id_wartawan" value="{{ $data->id_user }}">
        <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ auth()->user()->id }}">
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection