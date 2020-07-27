<?php

namespace App\Http\Controllers\Article;

use App\Article\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::paginate(2);
        // return new ArticleCollection($article);
        
        return ArticleResource::collection($article); //colection memunculkan semua API
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        $articles = auth()->user()->articles()->create($this->articleStore());

        return $articles;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        
        return new ArticleResource($article);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($this->articleStore());

        return new ArticleResource($article);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json('the article was deleted', 200);
    }

    public function articleStore(){

        return [
        
            'title'         => request('title'),
            'slug'          => \Str::slug(request('title')),
            'body'          => request('body'),
            'subject_id'    => request('subject'),

        ];

    }
}
