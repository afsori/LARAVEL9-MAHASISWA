@extends('layout.index')

@section('content')

<div class="w-50 center border roundex px-3 py-3 mx-auto">
    <h1>Login</h1>
    <form action="/session/login" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" id="email" aria-describedby="email" placeholder="input email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" value="{{ Session::get('password') }}" name="password" class="form-control" id="password" aria-describedby="password" placeholder="input password">
        </div>

        <div class="mb-3 d-grid">
            <button class="btn btn-primary" name="submit" type="submit">Login</button>
        </div>
    </form>
</div>

@endsection