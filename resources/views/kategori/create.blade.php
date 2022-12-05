@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori/Buat') }}</div>

                <div class="card-body">

                <form action="{{url('kategori')}}" method="POST" >
                    @csrf
                <div class="mb-3">
                    <label for="Nama" class="form-label @error('Nama') is-invalid @enderror">Tambah Nama Kategori</label>
                    <input type="text" class="form-control" name="Nama" id="Nama" placeholder="Input Nama Kategori" >
                    @error('Nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary">Input Kategori</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
