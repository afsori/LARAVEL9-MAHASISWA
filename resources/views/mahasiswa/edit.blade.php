@extends('layout.index')


@section('content')
<a href="/mahasiswa" class="btn btn-secondary mb-2">Kembali</a>
<form method="POST" action={{'/mahasiswa/'.$dataEdit->nim}} enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="nim" class="form-label">NIM</label>
      <input readonly type="text" name="nim" value="{{ $dataEdit->nim }}" class="form-control" id="nim" aria-describedby="nim" placeholder="input nim">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" name="nama" value="{{ $dataEdit->nama }}" class="form-control" id="nama" aria-describedby="nama" placeholder="input nama">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" placeholder="input alamat"> {{ $dataEdit->alamat }} </textarea>
    </div>
    @if ($dataEdit->foto)
      <div class="mb-3">
        <img src="{{ url('foto').'/'. $dataEdit->foto }}" alt="" width="100" height="100">
      </div>
      @endif
      <div class="mb-3">
        <label for="alamat" class="form-label">Foto</label>
        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto">
      </div>
    <button class="mb-3 btn btn-primary" type="submit">Update</button>
</form>
@endsection