@extends('lay.petugas')
@section('title')
@section('css')
@section('body')

@section('content')




<div class="col-md-12">
<div class="card card-primary">
<div class="card-header">
  <h4>SEMUA DATA MASYARAKAT</h4>
</div>
<div class="card-body">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($data as $d)
      <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $d->nama }}</td>
        <td>
        <a href="/masyarakat/detail/{{ $d->id }}"><i class="fa fa-eye"> </i></a>
        <a href="/masyarakat/detail/{{ $d->id }}"><i class="fa fa-edit ml-3"> </i></a>
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

