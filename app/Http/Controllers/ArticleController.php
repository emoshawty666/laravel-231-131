<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create',self::class);
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date'=>'required|date',
            'title' =>'required|min:6',
            'text'=>'required|',
        ]);
        $article = new Article;
        $article->date_print = request('date');
        $article->title = request('title');
        $article->text = request('text');
        $article->user_id = auth()->id();
        $article->save();
        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article, Comment $comments)
    {
        $user= User::findOrFail($article->user_id);
        $comments = Comment::where('article_id', $article->id)->get();
        return view('article.show', ['article'=>$article, 'user'=>$user, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('update', [self::class, $article]);
        $request->validate([
            'date'=>'required|date',
            'title' =>'required|min:6',
            'text'=>'required|',
        ]);
        $article->date_print = request('date');
        $article->title = request('title');
        $article->text = request('text');
        $article->user_id = auth()->id();
        $article->save();
        return redirect()->route('article.show',['article'=>$article->id])->with('status','Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
    Gate::authorize('delete', [self::class, $article]);
       $article->delete();
       return redirect()->route('article.index')->with('status','Delete success');
    }
}
