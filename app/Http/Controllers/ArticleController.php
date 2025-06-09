<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

        public function showAll()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('articles.articles-public', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        Article::create($request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]));

        return redirect('/admin')->with('success', 'Artículo creado.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]));

        return redirect('/admin')->with('success', 'Artículo actualizado.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/admin')->with('success', 'Artículo eliminado.');
    }
}
