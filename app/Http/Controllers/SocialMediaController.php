<?php

namespace App\Http\Controllers;

use App\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
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
        $socialMedias = SocialMedia::all();
        return view('backend.pages.social_media.index', compact('i', 'socialMedias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.social_media.create');
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
            'name' => 'required',
            'link' => 'required'
        ]);
        $socialMedia = new SocialMedia();
        $socialMedia->name = $inputFields['name'];
        $socialMedia->link = $inputFields['link'];

        $socialMedia->save();
        return redirect('admin/social_media')->with('success', 'SocialMedia created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $socialMedia)
    {
        return view('backend.pages.social_media.edit', compact('socialMedia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'link' => 'required'
        ]);
        
        $socialMedia->name = $inputFields['name'];
        $socialMedia->link = $inputFields['link'];

        $socialMedia->update();
        return redirect('admin/social_media')->with('success', 'SocialMedia updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        $socialMedia->delete();
        return redirect('admin/social_media')->with('danger', 'SocialMedia deleted successfully!');

    }
}