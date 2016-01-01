<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

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
//        $this->validate($request, [
//            'title' => 'required|min:3|unique:articles,title',
//            'body' => 'required|min:5',
//            'published_at' => 'required|date'
//        ]);
        Article::create($request->all());
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
