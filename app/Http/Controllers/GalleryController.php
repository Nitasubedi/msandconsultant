<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $i = 1;
        $galleries = Gallery::all();
        return view('backend.pages.gallery.index', compact('i', 'galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $gallery = Gallery::all();
        return view('backend.pages.gallery.create', compact('gallery'));
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('backend.pages.gallery.edit', compact('gallery'));
    }

    public function show(Gallery $gallery)
    {
        return view('backend.pages.gallery.show', compact('gallery'));
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
            'title' => 'required'
        ]);
        $gallery = new Gallery();
        $gallery->title = $inputFields['title'];

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/gallery', $image);
            $gallery->image = "images/gallery/" . $image;
        } else {
            $gallery->image = '';
        }
        $gallery->save();

        $notification = array(
            'message' => 'Gallery Created Successfully',
            'alert-type' => 'succes'
        );

        return redirect('admin/gallery')->with('success', 'Gallery created successfully!');;
    }

    public function update(Request $request, Gallery $gallery)
    {
        $inputFields = $request->validate([
            'title' => 'required'
        ]);
        $gallery->title = $inputFields['title'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($gallery->image != "") {
                if (file_exists('public/' . $gallery->image)) {
                    unlink('public/' . $gallery->image);
                }
            }
            $request->image->move('public/images/gallery', $imageName);
            $gallery->image = "images/gallery/" . $imageName;
        }
        $gallery->update();
        return redirect('admin/gallery')->with('success', 'Gallery updated successfully!');

    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect('admin/gallery')->with('danger', 'Gallery deleted successfully!');

    }
}