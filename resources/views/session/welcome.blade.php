@extends('layout.index')

@section('content')

<div class="w-50 text-center border rounded px-3 py-3 mx-auto">
    <h1>Selamat datang</h1>
    <p>Silahkan login atau registrasi untuk masuk kedalam sistem</p>
    <a href="/session" class="btn btn-primary btn-lg">Login</a>
    <a href="/session/register" class="btn btn-secondary btn-lg">Register</a>
</div>

@endsection