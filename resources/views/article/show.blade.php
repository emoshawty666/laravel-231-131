@extends('layout')
@section('content')

@if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
@endif

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
    <a class="btn btn-success" href="/article/{{$article->id}}/edit">Article Edit</a>
    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger">Article Delete</button>
    </form>
    </div>
    </div>
</div>
@endsection