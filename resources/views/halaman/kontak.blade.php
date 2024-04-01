@extends('layout/index')

@section('content')
    <h1 class="text-3xl font-bold underline">
        {{ $title}}
    </h1>
    <p>Email: {{ $kontak['email'] }}</p>
    <p>Telp: {{ $kontak['telp'] }}</p>
@endsection
