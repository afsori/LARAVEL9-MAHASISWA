@extends('layout.index')

@section('content')

<div class="w-50 center border roundex px-3 py-3 mx-auto">
    <h1>Register</h1>
    <form action="/session/create" method="POST">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" value="{{ Session::get('name') }}" name="name" class="form-control" id="name" aria-describedby="name" placeholder="input name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" id="email" aria-describedby="email" placeholder="input email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password" aria-describedby="password" placeholder="input password">
        </div>

        <div class="mb-3 d-grid">
            <button class="btn btn-primary" name="submit" type="submit">Register</button>
        </div>
    </form>
</div>

@endsection