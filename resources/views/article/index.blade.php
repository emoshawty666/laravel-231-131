@extends('layout')
@section('content')

@if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
@endif

<table class="table table-dark table-borderless">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Text</th>
      <th scope="col">Author</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <th scope="row">{{$article->date_print}}</th>
      <td><a class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="/article/{{$article->id}}">{{$article->title}}</a></td>
      <td>{{$article->text}}</td>
      <td>{{App\Models\User::findOrFail($article->user_id)->name }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$articles->links()}}
@endsection