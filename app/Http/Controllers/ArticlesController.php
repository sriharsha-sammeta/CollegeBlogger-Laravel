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
        $this->middleware('auth',['except'=>'index']);
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
     * @param $id
     * @return View
     */
    public function show($id)
    {
        $article = Article::find($id);
        if (is_null($article)) {
            Log::alert('article failed to fetch', ['id' => $id]);
            abort(404);
        }
//        dd($article->published_at->diffForHumans());
        return view('articles.show', compact('article'));
    }

    /**
     * create a new article using a form
     *
     * @return View
     */
    public function create()
    {
        if(Auth::guest()){
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
        $article = new Article($request->all());

        Auth::user()->articles()->save($article);
        return redirect('articles');
    }

    /**
     * form for editing the article
     *
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * patch or update an existing article
     *
     * @param ArticleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect()->route('articles.index');
    }   //
}
