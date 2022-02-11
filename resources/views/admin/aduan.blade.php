@extends('lay.admin')
@section('title')
@section('css')
@section('body')

@section('content')
 
<div class="row justify-content-center">

<div class="col-md-10">
<div class="card card-primary">
<div class="card-header">
<h4>Semua Data Aduan Masyarakat</h4>
</div>
<div class="card-body">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Judul</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Bukti</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($data as $d)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $d->user->nama }}</td>
        <td>{{ $d->judul }}</td>
        <td>{{ $d->tanggal }}</td>
        <td>  <img style="width:40px" src="{{ url('/storage/' .$d->gambar) }}"> </td>
        <td>
        <a href="/admin/pengaduan/detail/{{ $d->id }}"><i class="fa fa-eye"> </i></a>
        {{-- <a href="/admin/pengaduan/status"><i class="fa fa-check ml-3"> </i></a> --}}
        <a href="/admin/pengaduan/{{ $d->id }}/status?status=TERIMA" class="btn btn-success btn-sm"> <i class="fa fa-check"> </i> </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>

</div>

@endsection

@section('footer')

