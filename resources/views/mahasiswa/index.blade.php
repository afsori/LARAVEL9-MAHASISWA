@extends('layout.index')

@section('content')

<a href="{{ url('/mahasiswa/create') }}" class="btn btn-primary mb-2">Tambah Data Mahasiswa</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Foto</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswa as $mhs)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    @if ($mhs->foto)
                    <img src="{{ url('foto').'/'. $mhs->foto }}" alt="" width="50" height="50">
                    @endif
                </td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>
                    <a href="{{ url('/mahasiswa/'.$mhs->nim) }}" class="btn btn-secondary btn-sm">Detail</a>
                    <a href="{{ url('/mahasiswa/'.$mhs->nim.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                    <form onsubmit="return confirm('Apakah Anda Yakin ?')" action="{{ url('mahasiswa/'.$mhs->nim) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm d-inline">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $mahasiswa->links() }}
    
@endsection