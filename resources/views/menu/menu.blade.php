@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Menu') }}</div>

                <div class="card-body">

                        <a href="menu/create" class="btn btn-outline-primary" >Tambah Menu</a>
                      <table class="table">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Menu</th>
                              <th scope="col">Foto</th>
                              <th scope="col">Harga</th>
                              <th scope="col">Keterangan</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $file)
                              <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$file['nama']}}</td>
                              <td>
                                <div style="max-height:50px; overflow:hidden;">
                                    <img src="{{ asset('storage/'.$file->foto) }}" width="100px" alt="">
                                </div>
                              </td>
                              <td>Rp {{$file['harga']}}</td>
                              <td>{{$file['keterangan']}}</td>
                              <td>{{$file->kategori->Nama}}</td>
                              <td>
                              <a href="{{url('menu/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                              |
                              <a href="{{url('deletemenu/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
