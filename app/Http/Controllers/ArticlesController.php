<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Articles, Ideas};
use App\Http\Requests\Articles as ArticlesRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::all();
        return view('articles/index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ideas = Ideas::all();
        return view('articles/create', compact('ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticlesRequest $articlesRequest)
    {
        $article = Articles::create($articlesRequest->all());
        $article->ideas()->attach($articlesRequest->ideas);
        return redirect()->route('articles.index')->with('info', 'L\'article a bien été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $article)
    {
        $article->with('ideas')->get();
        return view('articles/show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $article)
    {
        $ideas = Ideas::all();
        return view('articles/edit', compact('article', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticlesRequest $articlesRequest, Articles $article)
    {
        $article->update($articlesRequest->all());
        $article->ideas()->sync($articlesRequest->ideas);
        return redirect()->route('articles.index')->with('info', 'L\'article a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        $article->delete();

        return back()->with('info', 'L\'article a bien été supprimé');
    }
}
