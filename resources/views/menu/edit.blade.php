@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu/Edit') }}</div>

                <div class="card-body">

                <form action="{{url('menu/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label @error('nama') is-invalid @enderror">Edit Nama Menu</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Input Nama Menu" value="{{$data->nama}}">
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label @error('harga') is-invalid @enderror">Edit Harga Menu</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Input harga Menu" value="{{$data->harga}}">
                    @error('harga')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label @error('keterangan') is-invalid @enderror">Edit keterangan Menu</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Input keterangan Menu" value="{{$data->keterangan}}">
                    @error('keterangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="foto" class="form-label">Edit Foto Menu</label>
                    @if($data->foto)
                    <img src="{{ asset('storage/'.$data->foto) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    @endif
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>

                <div class="mb-3">
                <label for="kategori_id" class="form-label">Edit Kategori Menu</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option selected>Edit Menu Kategori</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected ( $data->kategori_id==$file->id )>{{$file->Nama}}</option>
                    @endforeach
                </select>
                </div>

                <button type="submit" class="btn btn-outline-primary">Edit Menu</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
