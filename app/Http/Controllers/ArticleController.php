<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }

    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(6);
        return view('article.index', compact('articles'));
    }

    // AGGIUNGI QUESTO METODO
    public function create()
    {
        return view('article.create');
    }

    public function show(Article $article)
{
    return view('article.show', compact('article'));
}

public function byCategory(Category $category)
{
    return view('article.byCategory', ['articles' => $category->articles, 'category' => $category]);
}
}