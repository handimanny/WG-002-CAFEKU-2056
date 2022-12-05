@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard/Menu') }}</div>

                <div class="card-body">
                    
                <div class="container">
                    <div class="row">
                        @foreach ($data as $file)
                        <div class="col-lg-4 mt-2">
                            <div class="card">
                                <div style="max-height:100px; overflow:hidden;" >
                                    <img src="{{ asset('storage/'. $file->foto) }}" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $file->nama }}</h5>
                                    <h5 class="card-text">Rp {{ $file->harga }}</h5>
                                    <h6 class="card-text">Kategori : {{ $file->kategori->Nama }}</h6>
                                    <p class="card-text">{{ $file->keterangan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
