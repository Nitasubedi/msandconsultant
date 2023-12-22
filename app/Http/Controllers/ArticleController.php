<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleType;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $i = 1;
        $articles = Article::all();
        return view('backend.pages.article.index', compact('i', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articleTypes = ArticleType::whereIs_active(1)->get();
        return view('backend.pages.article.create', compact('articleTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputFields = $request->validate([
            'article_type_id' => 'required',
            'title' => 'required'
        ]);
        $article = new Article();
        $article->article_type_id = $inputFields['article_type_id'];
        $article->title = $inputFields['title'];
        $article->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/article', $image);
            $article->image = "images/article/" . $image;
        } else {
            $article->image = '';
        }

        $article->save();

        return redirect('admin/article')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $articleTypes = ArticleType::whereIsActive(1)->get();
        return view('backend.pages.article.edit', compact('articleTypes', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $inputFields = $request->validate([
            'article_type_id' => 'required',
            'title' => 'required'
        ]);
        $article->article_type_id = $inputFields['article_type_id'];
        $article->title = $inputFields['title'];
        $article->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($article->image != "") {
                if (file_exists('public/' . $article->image)) {
                    unlink('public/' . $article->image);
                }
            }
            $request->image->move('public/images/article', $imageName);
            $article->image = "images/article/" . $imageName;
        }
        $article->update();
        return redirect('admin/article')->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        if ($article->image != "") {
            if (file_exists('public/' . $article->image)) {
                unlink('public/' . $article->image);
            }
        }
              return redirect('admin/article')->with('danger', 'Article deleted successfully!');
        
    }

    public function inactive($id)
    {
        $article = Article::find($id);
        $article->is_active = 0;
        $article->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $article = Article::find($id);
        $article->is_active = 1;
        $article->save();
        return redirect()->back();
    }
}