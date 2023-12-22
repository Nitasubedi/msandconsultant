<?php

namespace App\Http\Controllers;

use App\ArticleType;
use Illuminate\Http\Request;

class ArticleTypeController extends Controller
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
        $articleTypes = ArticleType::all();
        return view('backend.pages.article_type.index', compact('i', 'articleTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.article_type.create');
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
            'name' => 'required'
        ]);
        $articleType = new ArticleType();
        $articleType->name = $inputFields['name'];
        $articleType->save();

        return redirect('admin/article_type')->with('success', 'ArticleType created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleType $articleType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleType $articleType)
    {
        return view('backend.pages.article_type.edit', compact('articleType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleType $articleType)
    {
        $inputFields = $request->validate([
            'name' => 'required'
        ]);

        $articleType->name = $inputFields['name'];
        $articleType->update();

        return redirect('admin/article_type')->with('success', 'ArticleType updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArticleType  $articleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleType $articleType)
    {
        $articleType->delete();
      return redirect('admin/article_type')->with('danger', 'ArticleType deleted successfully!');
    }


    public function inactive($id)
    {
        $articleType = ArticleType::find($id);
        $articleType->is_active = 0;
        $articleType->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $articleType = ArticleType::find($id);
        $articleType->is_active = 1;
        $articleType->save();
        return redirect()->back();
    }
}