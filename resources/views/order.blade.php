@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard/Order') }}</div>

                <div class="card-body">
                    
                <form action="{{ url('order') }}" method="post" class="p-3">
                    @csrf
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Input Nama Pembeli" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Pesanan</label>
                            <select class="form-select" name="pesanan[]" multiple aria-label="multiple select example" required>
                                <option value="50000">Cappucino</option>
                                <option value="50000">Americano</option>
                                <option value="50000">V60</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status" id="" class="form-control">
                                <option value="member">Member</option>
                                <option value="biasa">Biasa</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-primary">Cek Data</button>
                            <a href="order" class="btn btn-outline-warning" >Muat Ulang</a>
                        </div>
                </form>
                
                            @isset($data)
                            <div class="card-header">{{ __('Order Status') }}</div>
                            <div class="mb-3">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" value="{{ $data['nama'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Jumlah Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['jumlah_pesanan'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pesanan</label>
                                <input type="number" class="form-control" value="{{ $data['total_pesanan'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="text" class="form-control" value="{{ $data['status'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Diskon</label>
                                <input type="number" class="form-control" value="{{ $data['diskon'] }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="">Total Pembayaran</label>
                                <input type="number" class="form-control" value="{{ $data['total_pembayaran'] }}" readonly>
                            </div>
                            @endisset


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
