<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

/**
 * Controlador para la gestión de artículos.
 * Proporciona funcionalidades CRUD (crear, leer, actualizar, eliminar)
 * tanto para vistas públicas como del administrador.
 */
class ArticleController extends Controller
{
    /**
     * Muestra la lista de artículos para el panel de administración.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Muestra todos los artículos en la vista pública.
     *
     * @return \Illuminate\View\View
     */
    public function showAll()
    {
        $articles = Article::orderBy('published_at', 'desc')->get();
        return view('articles.articles-public', compact('articles'));
    }

    /**
     * Muestra un artículo específico.
     *
     * @param int $id ID del artículo
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Muestra el formulario para crear un nuevo artículo.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Almacena un nuevo artículo en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Article::create($request->validate([
            'title' => 'required',
            'content' => 'required',
            'published_at' => 'required|date'
        ]));

        return redirect('/admin')->with('success', 'Artículo creado.');
    }

    /**
     * Muestra el formulario para editar un artículo existente.
     *
     * @param int $id ID del artículo
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Actualiza un artículo existente en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id ID del artículo
     * @return \Illuminate\Http\RedirectResponse
     */
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

    /**
     * Elimina un artículo de la base de datos.
     *
     * @param int $id ID del artículo
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/admin')->with('success', 'Artículo eliminado.');
    }
}
