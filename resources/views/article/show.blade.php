@extends('layout')
@section('content')
<div class="card" style="width: 68rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-text">{{App\Models\User::findOrFail($article->user_id)->name}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$article->text}}</li>
  </ul>
  <div class="card-body">

  <div class="btn-toolbar" role="toolbar">
    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success me-3">Article Update</button>
    </form>
    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger">Article Delete</button>
    </form>
    </div>
    </div>
</div>
@endsection