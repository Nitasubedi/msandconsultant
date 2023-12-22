<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\ArticleType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function articles()
    {
        // return $id?Article::find($id):Article::all();
        $articles = Article::whereIsActive(1)->get(['id', 'article_type_id', 'title', 'image', 'description']);
        foreach ($articles as $key => $article) {
            $article->article_type_name = ArticleType::find($article->article_type_id)->name;
            $article->image = asset($article->image) ?? '-';
        }
        return response([
            'Success' => true,
            'data' => $articles,
        ]);
    }

    function search($title)
    {
        $articles = Article::where('title','like', '%'. $title .'%')->get(['id', 'article_type_id', 'title', 'image', 'description']);
        foreach ($articles as $key => $article) {
            $article->article_type_name = ArticleType::find($article->article_type_id)->name;
            $article->image = $article->image ?? '-';
        }
        return response([
            'Success' => true,
            'data' => $articles,
        ]);
    }

    function getSingleArticle(Request $request)
    {
        $article = Article::find($request->id);

        $article->image = $article->image ?? '-';
            $article->article_type_name = ArticleType::find($article->article_type_id)->name;
            unset($article->created_at, $article->updated_at, $article->slug);

        return response([
            'Success' => true,
            'data' => $article,
        ]);
    }
}