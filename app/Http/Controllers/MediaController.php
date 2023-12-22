<?php

namespace App\Http\Controllers;

use App\Media;
use App\MediaTypes;
use Illuminate\Http\Request;

class MediaController extends Controller
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
        $medias = Media::all();
        return view('backend.pages.media.index', compact('i', 'medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediaTypes = MediaTypes::whereIs_active(1)->get();
        return view('backend.pages.media.create', compact('mediaTypes'));
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
            'media_type_id' => 'required',
            'title' => 'required'
        ]);
        $media = new Media();
        $media->media_type_id = $inputFields['media_type_id'];
        $media->title = $inputFields['title'];
        $media->description = $request->input('description');
        $media->has_time_limit = $request->input('has_time_limit');
        $media->expires_on = $request->input('expires_on');

        if($request->hasFile('image'))
        {
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/media',$image);
            $media->image = "images/media/" . $image;
        }
        else {
            $media->image = '';
        }

        $media->save();

        return redirect('admin/media')->with('success', 'Media created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $medium)
    {
        $mediaTypes = MediaTypes::whereIsActive(1)->get();
        return view('backend.pages.media.edit', compact('mediaTypes','medium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $medium)
    {
        $inputFields = $request->validate([
            'media_type_id' => 'required',
            'title' => 'required'
        ]);

        $medium->media_type_id = $inputFields['media_type_id'];
        $medium->title = $inputFields['title'];
        $medium->description = $request->input('description');
        $medium->has_time_limit = $request->input('has_time_limit');
        $medium->expires_on = $request->input('expires_on');

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($medium->image!="") {
                if(file_exists('public/'.$medium->image)) {
                    unlink('public/'.$medium->image);   
                }
            }
            $request->image->move('public/images/media',$imageName);
            $medium->image = "images/media/" . $imageName;
        }

        $medium->update();

        return redirect('admin/media')->with('success', 'Media updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $medium)
    {
        $medium->delete();
        if($medium->image!="") {
            if(file_exists('public/'.$medium->image)) {
                unlink('public/'.$medium->image);   
            }
        }
        return redirect('admin/media')->with('danger', 'Media deleted successfully!');
    }
    
    public function inactive($id)
    {
        $media = Media::find($id);
        $media->is_active = 0;
        $media->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $media = Media::find($id);
        $media->is_active = 1;
        $media->save();
        return redirect()->back();
    }
}