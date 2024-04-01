@extends('layout.index')

@section('content')

<div>
    <a href="{{ url('mahasiswa') }}" class="btn btn-secondary text-sm text-gray-700 dark:text-gray-500 underline">Kembali</a>
    <h1>Nama: {{ $mahasiswa['nama'] }}</h1>

    <p>
        <b>NIM: {{ $mahasiswa->nim }}</b>
    </p>
    <p>
        <b>Alamat: {{ $mahasiswa->alamat }}</b>
    </p>
</div>
{{-- {{$mahasiswa}} --}}
    
@endsection