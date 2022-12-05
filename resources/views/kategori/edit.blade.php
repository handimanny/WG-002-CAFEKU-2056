@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kategori/Edit') }}</div>

                <div class="card-body">

                <form action="{{url('kategori/'.$data->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="Nama" class="form-label">Edit Nama Kategori</label>
                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Input Nama Kategori" value="{{$data->Nama}}" >
                </div>
                <button type="submit" class="btn btn-outline-primary">Edit Kategori</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
