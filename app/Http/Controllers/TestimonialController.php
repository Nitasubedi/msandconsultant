<?php

namespace App\Http\Controllers;

use App\testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
        $testimonials = testimonial::all();
        return view('backend.pages.testimonial.index', compact('testimonials','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.testimonial.create');
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
            'customer_name' => 'required',
            'message' => 'required'
        ]);
        $testimonial = new testimonial();
        $testimonial->customer_name = $inputFields['customer_name'];
        $testimonial->message = $inputFields['message'];

        if($request->hasFile('customer_img'))
        {
            $customer_img = time().'.'.$request->file('customer_img')->getClientOriginalExtension();
            $request->customer_img->move('public/images/testimonial',$customer_img);
            $testimonial->customer_img = "images/testimonial/" . $customer_img;
        }
        else {
            $testimonial->customer_img = '';
        }

        $testimonial->save();

        return redirect('admin/testimonial')->with('success', 'Testimonial created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(testimonial $testimonial)
    {
        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, testimonial $testimonial)
    {
        $inputFields = $request->validate([
            'customer_name' => 'required',
            'message' => 'required'
        ]);

        $testimonial->customer_name = $inputFields['customer_name'];
        $testimonial->message = $inputFields['message'];

        if($request->hasFile('customer_img')) {
            $imageName = time().'.'.$request->file('customer_img')->getClientOriginalExtension();
            if($testimonial->customer_img!="") {
                if(file_exists('public/'.$testimonial->customer_img)) {
                    unlink('public/'.$testimonial->customer_img);   
                }
            }
            $request->customer_img->move('public/images/testimonial',$imageName);
            $testimonial->customer_img = "images/testimonial/" . $imageName;
        }

        $testimonial->update();
        return redirect('admin/testimonial')->with('success', 'Testimonial updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(testimonial $testimonial)
    {
        $testimonial->delete();
        if($testimonial->customer_img!="") {
            if(file_exists('public/'.$testimonial->customer_img)) {
                unlink('public/'.$testimonial->customer_img);   
            }
        }
        return redirect('admin/testimonial')->with('danger', 'Testimonial deleted successfully!');

    }


    public function inactive($id)
    {
        $testimonial = testimonial::find($id);
        $testimonial->is_active = 0;
        $testimonial->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $testimonial = testimonial::find($id);
        $testimonial->is_active = 1;
        $testimonial->save();
        return redirect()->back();
    }
}