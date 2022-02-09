@extends('lay.admin')
@section('title')
@section('css')
@section('body')

@section('content')



<div class="row">


<div class="col-md-12">
<div class="card card-primary">
<div class="card-header">
  <h4>Semua Data Pengaduan</h4>
</div>
<div class="card-body">
 <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Dari</th>
        <th scope="col">Pengaduan</th>
        <th scope="col">Status</th>
         <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($aduan as $a)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $a->user->nama }}</td>
        <td>{{ $a->judul }}</td>
        <td>
          @if($a->status == "PROSES")
          <span class="badge badge-warning">
          @elseif($a->status == "DITERIMA")
          <span class="badge badge-success">
          @else
         <span>
         @endif
         {{ $a->status }}
         </span>
        </td>
        <td>
      <a href="/pengaduan/{{ $a->id }}/status?status=TERIMA" class="btn btn-success btn-sm"> <i class="fa fa-check"> </i> </a>
          {{-- <a href="/pengaduan/detail/{{ $a->id }}" class="btn btn-primary btn-sm"><i class="fa fa-eye"> </i></a> --}}
          {{-- <a href="/masyarakat/detail/{{ $d->id }}" class="btn btn-success btn-sm"><i class="fa fa-check ml-3"> </i></a> --}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>

</div>



@endsection
@section('footer')

