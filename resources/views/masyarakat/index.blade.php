@extends('lay.user')
@section('header')
@section('title', 'Pengaduan Masyarakat')

@section('content')
    {{-- Navbar --}}
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-left">
        <a href="/masyarakat/list-pengaduan" class="nav-link">List Pengaduan</a>
        <a href="/masyarakat/form-pengaduan" class="nav-link">Form Pengaduan</a>
    </div>
  </div>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link mr-5" href="/keluar">Keluar</a>
    </div>
  </div>
</nav>
{{-- End Navbar --}}
<div class="container mt-10 mb-5">
<div class="row">
  <div class="col-md-7">
    <div class="card none shadow">
     <div class="card-header">
      <div class="card-title"><h5>Form Pengaduan</h5></div>
    </div>
        <div class="card-body">
          <form action="/masyarakat/pengaduan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="judul">Judul</label>
              <input type="text" class="form-control" autocomplete="off" autofocus name="judul" aria-describedby="judul" placeholder="Judul" {{ old('judul') }}>
               {{-- <small id="judul" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal</label>
              <input type="date" {{ old('tanggal') }} name="tanggal" autocomplete="off" autofocus class="form-control" id="tanggal">
            </div>
             <div class="form-group">
              <label for="">Isi Pengaduan</label>
              <textarea {{ old('isi') }} name="isi" class="form-control" autocomplete="off" autofocus placeholder="Isi Pengaduan" rows="4"></textarea>
            </div> 
             <div class="form-group">
              <label for="gambar">Bukti</label>
              <input type="file" {{ old('gambar') }} name="gambar" autocomplete="off" autofocus class="form-control" id="gambar">
            </div> 
            <button type="submit" class="btn btn-primary mt-2">Kirim</button>
          </form>
        </div>
      </div>
    </div>


<div class="col-md-5">
<div class="card shadow">
<div class="card-header">
   <div class="card-title"><h5>Hallo {{ Auth()->user()->nama }}, <br> Berikut List Pengaduan Anda</h5></div>
</div>
   
  <div class="card-body">
   <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Pengaduan</th>
          <th scope="col">Bukti</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php $no = 1; ?>
      @forelse($data as $d)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $d->judul }}</td>
          <td>  <img class="gambar" src="{{ url('/storage/' .$d->gambar) }}"> </td>
            <td>
              @if($d->status = 'PROSES')
                <span class="badge badge-warning">
              @elseif($d->status = 'TERIMA')
                 <span class="badge badge-success">
              @elseif($d->status = 'TOLAK')
              <span class="badge badge-danger">
              @else
              <span>
              @endif
              {{ $d->status }}
              </span>
            </td>
          <td><a href="/pengaduan/lihat/{{ $d->id }}"><i class="fa fa-eye"> </i></a></td>
        </tr>
        @empty 
        <td colspan="5" class="text-center">Belom ada pengaduan</td>
      @endforelse
      </tbody>
    </table>
  </div>
</div> 
</div>

  </div>
</div>


@endsection

@section('footer')
