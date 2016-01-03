<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use Auth;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * All articles are displayed
     *
     * @return View
     */
    public function index()
    {

        $articles = Article::latest('published_at')->published('<=')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * show an article with given id
     *
     * @param Article $article
     * @return View
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * create a new article using a form
     *
     * @return View
     */
    public function create()
    {
        if (Auth::guest()) {
            return redirect()->route('articles.index');
        }
        return view('articles.create');
    }

    /**
     * store a new article
     *
     * @param ArticleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        Auth::user()->articles()->create($request->all());

        return redirect('articles');
    }

    /**
     * form for editing the article
     *
     * @param Article $article
     * @return View
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * patch or update an existing article
     *
     * @param ArticleRequest $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        return redirect()->route('articles.index');
    }   //
}
