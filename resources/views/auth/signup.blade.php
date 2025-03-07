@extends('layout')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-warning">{{$error}}</div>
    @endforeach
@endif
<form action="/auth/registr" method=POST>
    @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Enter name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Enter email</label>
    <input type="email" class="form-control" id="email" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
@endsection
