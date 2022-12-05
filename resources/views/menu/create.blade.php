@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu/Buat') }}</div>

                <div class="card-body">

                <form action="{{url('menu')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label @error('nama') is-invalid @enderror">Tambah Nama Menu</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama Menu" >
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Tambah Foto Menu</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>
                
                <div class="mb-3">
                    <label for="harga" class="form-label @error('harga') is-invalid @enderror">Tambah Harga Menu</label>
                    <input type="number" class="form-control" name="harga" id="harga" placeholder="Input Harga Menu" >
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label @error('keterangan') is-invalid @enderror">Tambah Keterangan Menu</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Input Keterangan Menu" >
                    @error('keterangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="kategori_id" class="form-label">Tambah Kategori Menu</label>
                <select class="form-control" id="kategori_id" name="kategori_id" enctype="multipart/form-data">
                    <option selected>Pilih Menu Kategori</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected(old('kategori_id')==$file->id)>{{$file->Nama}}</option>
                    @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-outline-primary">Tambah Menu</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
