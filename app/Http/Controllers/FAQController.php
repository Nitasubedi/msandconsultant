<?php

namespace App\Http\Controllers;

use App\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
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
        $faqs = FAQ::all();
        return view('backend.pages.faq.index', compact('i', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.faq.create');
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
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq = new FAQ();
        $faq->question = $inputFields['question'];
        $faq->answer = $inputFields['answer'];
        $faq->save();
        return redirect('admin/faq')->with('success', 'FAQ created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function show(FAQ $fAQ)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function edit(FAQ $faq)
    {
        return view('backend.pages.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FAQ $faq)
    {
        $inputFields = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $faq->question = $inputFields['question'];
        $faq->answer = $inputFields['answer'];
        $faq->update();
        return redirect('admin/faq')->with('success', 'FAQ updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FAQ  $fAQ
     * @return \Illuminate\Http\Response
     */
    public function destroy(FAQ $fAQ)
    {
        $fAQ->delete();
        return redirect('admin/faq')->with('danger', 'FAQ deleted successfully!');

    }

    public function inactive($id)
    {
        $faq = FAQ::find($id);
        $faq->is_active = 0;
        $faq->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $faq = FAQ::find($id);
        $faq->is_active = 1;
        $faq->save();
        return redirect()->back();
    }
}