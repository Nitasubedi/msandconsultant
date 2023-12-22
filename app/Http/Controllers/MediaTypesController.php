<?php

namespace App\Http\Controllers;

use App\MediaTypes;
use Illuminate\Http\Request;

class MediaTypesController extends Controller
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
        $mediaTypes = MediaTypes::all();
        return view('backend.pages.media_type.index', compact('i', 'mediaTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.media_type.create');
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
        $mediaType = new MediaTypes();
        $mediaType->name = $inputFields['name'];
        $mediaType->save();

        return redirect('admin/media_type')->with('success', 'MediaType created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MediaTypes  $mediaTypes
     * @return \Illuminate\Http\Response
     */
    public function show(MediaTypes $mediaTypes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MediaTypes  $mediaTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaTypes $mediaType)
    {
        return view('backend.pages.media_type.edit', compact('mediaType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MediaTypes  $mediaTypes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaTypes $mediaType)
    {
        $inputFields = $request->validate([
            'name' => 'required'
        ]);

        $mediaType->name = $inputFields['name'];
        $mediaType->update();

        return redirect('admin/media_type')->with('success', 'MediaType updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MediaTypes  $mediaTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaTypes $mediaTypes)
    {
        $mediaTypes->delete();
        return redirect('admin/media_type')->with('danger', 'MediaType deleted successfully!');

    }


    public function inactive($id)
    {
        $mediaType = MediaTypes::find($id);
        $mediaType->is_active = 0;
        $mediaType->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $mediaType = MediaTypes::find($id);
        $mediaType->is_active = 1;
        $mediaType->save();
        return redirect()->back();
    }
}