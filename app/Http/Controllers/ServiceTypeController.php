<?php

namespace App\Http\Controllers;

use App\ServiceType;
use Illuminate\Http\Request;

class ServiceTypeController extends Controller
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
        $serviceTypes = ServiceType::all();
        return view('backend.pages.service_type.index', compact('i', 'serviceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.service_type.create');
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
        $serviceType = new ServiceType();
        $serviceType->name = $inputFields['name'];
        $serviceType->save();

        return redirect('admin/service_type')->with('success', 'ServiceType created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceType $serviceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceType $serviceType)
    {
        return view('backend.pages.service_type.edit', compact('serviceType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceType $serviceType)
    {
        $inputFields = $request->validate([
            'name' => 'required'
        ]);
        $serviceType->name = $inputFields['name'];
        $serviceType->update();

        return redirect('admin/service_type')->with('success', 'ServiceType updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceType  $serviceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceType $serviceType)
    {
        $serviceType->delete();
        return redirect('admin/service_type')->with('danger', 'ServiceType deleted successfully!');

    }


    public function inactive($id)
    {
        $serviceType = ServiceType::find($id);
        $serviceType->is_active = 0;
        $serviceType->save();
        return redirect()->back();
    }


    public function active($id)
    {
        $serviceType = ServiceType::find($id);
        $serviceType->is_active = 1;
        $serviceType->save();
        return redirect()->back();
    }
}