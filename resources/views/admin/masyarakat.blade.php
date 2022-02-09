@extends('lay.admin')
@section('title')
@section('css')
@section('body')

@section('content')

<div class="row">
<div class="col-md-6">
<div class="card card-primary">
<div class="card-header"><h4>INPUT DATA & USER MASYARAKAT</h4></div>

<div class="card-body">
<form method="POST" action="/proses_registrasi">
@csrf
    <div class="form-group">
    <label for="nama">Nama Lengkap</label>
    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}">
    <div class="invalid-feedback">
    </div>
    </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
    <div class="invalid-feedback">
    </div>
    </div>

    <div class="row">
    <div class="form-group col-6">
        <label for="password" class="d-block">Password</label>
        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
        <div id="pwindicator" class="pwindicator">
        <div class="bar"></div>
        <div class="label"></div>
        </div>
    </div>
    <div class="form-group col-6">
        <label for="password" class="d-block">Konfirmasi Password</label>
        <input id="password" type="password" class="form-control" name="password_confirmation">
    </div>
    </div>

    <div class="row">
    <div class="form-group col-6">
        <label>No Telephone</label>
        <input type="text" class="form-control" name="telp" value="{{ old('telp') }}">
    </div>

    <div class="form-group col-6">
    <label for="alamat">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" rows="3"></textarea>
    </div>
    </div>


    <div class="form-group">
    <button type="submit" class="btn btn-primary btn-lg btn-block">
        INPUT USER
    </button>
    </div>
</form>
</div>
</div>
</div>


<div class="col-md-6">
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

