@extends('layout.index')


@section('content')
<form method="POST" action="/mahasiswa" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input type="text" name="nim" value="{{ Session::get('nim') }}" class="form-control" id="nim" aria-describedby="nim" placeholder="input nim">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" value="{{ Session::get('nama') }}" class="form-control" id="nama" aria-describedby="nama" placeholder="input nama">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" placeholder="input alamat">{{ Session::get('alamat') }} </textarea>
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Foto</label>
      <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto">
    </div>
    <button class="mb-3 btn btn-primary" type="submit">Simpan</button>
</form>
@endsection