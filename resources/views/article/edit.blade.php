@extends('layout')
@section('content')

@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-warning">{{$error}}</div>
    @endforeach
@endif
<form action="/article/{{$article->id}}" method="POST">
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="date" class="form-label">Date print</label>
    <input type="date" class="form-control" id="date" name="date" value="{{$article->date_print}}">
    </div>
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="title" class="form-control" id="title" name="title" value="{{$article->title}}">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea name="text" id="text" class="form-control" placeholder="Write something..."></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection