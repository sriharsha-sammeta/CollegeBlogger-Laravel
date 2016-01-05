<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use Auth;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
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
        // if (Auth::guest()) {
        //     return redirect()->route('articles.index');
        // }
        
        $tags = Tag::lists('name','id')->toArray();
        return view('articles.create',compact('tags'));
    }

    /**
     * store a new article
     *
     * @param ArticleRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        
        $article->tags()->attach($request->input('tag_list'));

//        flash()->success(sprintf("A new article with title \"%s\" has been created", $request->all()['title']));

        flash()->overlay(sprintf("A new article with title \"%s\" has been created", $request->all()['title']),"Good job !");

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
        $tags = Tag::lists('name','id')->toArray();

        return view('articles.edit', compact('article', 'tags'));
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
