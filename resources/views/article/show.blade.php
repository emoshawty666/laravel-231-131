@extends('layout')
@section('content')

@if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
@endif

<div class="card" style="width: 68rem;">
  <div class="card-body">
    <h5 class="card-title">{{$article->title}}</h5>
    <p class="card-text">{{App\Models\User::findOrFail($article->user_id)->name}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$article->text}}</li>
  </ul>
  <div class="card-body">
@can('update', $article)
  <div class="btn-toolbar" role="toolbar">
    <a class="btn btn-success" href="/article/{{$article->id}}/edit">Article Edit</a>
    <form action="/article/{{$article->id}}" method="post">
        @csrf
        @method('DELETE')
    <button type="submit" class="btn btn-danger">Article Delete</button>
    </form>
    </div>
@endcan
    </div>
</div>


<div class="text-center mt-5">
    <h1>Add new Comments</h1>
</div>
<div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="title" class="form-control" id="title" name="title">
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Text</label>
    <textarea name="text" id="text" class="form-control" placeholder="Write something..."></textarea>
  </div>
<div class="btn-toolbar" role="toolbar">
    <a class="btn btn-success" href="/article/{{$article->id}}/edit">Add comment</a>
    </div>


<h1>Comments</h1>
@foreach($comments as $comments)
<div class="card" style="width: 68rem;">
  <div class="card-body">
    <h5 class="card-title">{{$comments->title}}</h5>
    <p class="card-text">{{App\Models\User::findOrFail($comments->user_id)->name}}</p>
    <div class="btn-toolbar" role="toolbar">
    <a class="btn btn-success me-3" href="/comments/{{$comments->id}}/edit">Comment Edit</a>
    <a class="btn btn-danger me-3" href="/comments/{{$comments->id}}/edit">Comment Delete</a>
    </div>
  </div>
@endforeach
@endsection