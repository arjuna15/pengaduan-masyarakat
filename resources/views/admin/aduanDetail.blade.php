@extends('lay.admin')
@section('title')
@section('css')
@section('body')

@section('content')

<div class="row">
<div class="col-md-12">
<div class="card card-primary">
<div class="card-header"><h4>Aduan Dari : {{ $data->user->nama }}</h4></div>
<div class="card-body">
<form method="POST" action="/petugas/pengaduan/detail/{{ $data->id }}">
@csrf
    <div class="form-group">
    <label for="tanggal">Tanggal & Tahun</label>
    <input id="tanggal" type="text" class="form-control" name="tanggal" readonly value="{{ $data->tanggal }}">
    <div class="invalid-feedback">
    </div>
    </div>
    <div class="form-group">
    <label for="judul">Judul</label>
    <input id="judul" type="text" class="form-control" name="judul" readonly value="{{ $data->judul }}">
    <div class="invalid-feedback">
    </div>
    </div>
    <div class="form-group">
    <label for="judul">Isi Pengaduan</label>
    <input id="judul" rows="3" type="text" class="form-control" name="judul" readonly value="{{ $data->isi }}">
    <div class="invalid-feedback">
    </div>
    </div>
    <div class="card-header">
    <h4>Tanggapan Petugas</h4>
    </div>
    <div class="card-body"> 

        @forelse($t as $ta)
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
            <p style="font-size:20px">{{ $ta->tanggapan }}</p>
            </li>
        </ul>
        @empty
        <ul class="list-group">
            <li class="list-group-item justify-content-center">Anda Belom Menanggapi</li>
        </ul>
        @endforelse
    </div>
</div>
</div>
   

   
    




</div>

@endsection

@section('footer')




