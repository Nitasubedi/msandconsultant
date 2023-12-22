<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
        $companies = Company::all();
        return view('backend.pages.company.index', compact('i', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.company.create');
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
            'pan_vat_no' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'location_embed_link' => 'required'
        ]);
        $company = new Company();
        $company->name = $inputFields['name'];
        $company->pan_vat_no = $inputFields['pan_vat_no'];
        $company->email = $inputFields['email'];
        $company->address = $inputFields['address'];
        $company->phone_no = $inputFields['phone_no'];
        $company->mobile_no = $inputFields['mobile_no'];
        $company->description = $request->input('description');
        $company->location_embed_link = $inputFields['location_embed_link'];

        if($request->hasFile('image'))
        {
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/company',$image);
            $company->image = "images/company/" . $image;
        }
        else {
            $company->image = '';
        }

        $company->save();

        return redirect('admin/company')->with('success', 'Company created successfully!');
        ;
    }       

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('backend.pages.company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'pan_vat_no' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'location_embed_link' => 'required'
        ]);
        $company->name = $inputFields['name'];
        $company->pan_vat_no = $inputFields['pan_vat_no'];
        $company->email = $inputFields['email'];
        $company->address = $inputFields['address'];
        $company->phone_no = $inputFields['phone_no'];
        $company->mobile_no = $inputFields['mobile_no'];
        $company->location_embed_link = $inputFields['location_embed_link'];
        $company->description = $request->input('description');

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($company->image!="") {
                if(file_exists('public/'.$company->image)) {
                    unlink('public/'.$company->image);   
                }
            }
            $request->image->move('public/images/company',$imageName);
            $company->image = "images/company/" . $imageName;
        }

        $company->update();

        return redirect('admin/company')->with('success', 'Company updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        if($company->image!="") {
            if(file_exists('public/'.$company->image)) {
                unlink('public/'.$company->image);   
            }
        }
        return redirect('admin/company')->with('danger', 'Company deleted successfully!');

    }
}