<?php

namespace App\Http\Controllers;

use App\Service;
use App\ServiceType;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $services = Service::all();
        return view('backend.pages.service.index', compact('i', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceTypes = ServiceType::whereIsActive(1)->get();
        return view('backend.pages.service.create', compact('serviceTypes'));
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
            'service_type_id' => 'required',
            'title' => 'required'
        ]);
        $service = new Service();
        $service->service_type_id = $inputFields['service_type_id'];
        $service->title = $inputFields['title'];
        $service->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/service', $image);
            $service->image = "images/service/" . $image;
        } else {
            $service->image = '';
        }

        $service->save();

        return redirect('admin/service')->with('success', 'Service created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $serviceTypes = ServiceType::whereIsActive(1)->get();
        return view('backend.pages.service.edit', compact('serviceTypes', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $inputFields = $request->validate([
            'service_type_id' => 'required',
            'title' => 'required'
        ]);
        $service->service_type_id = $inputFields['service_type_id'];
        $service->title = $inputFields['title'];
        $service->description = $request->input('description');

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($service->image != "") {
                if (file_exists('public/' . $service->image)) {
                    unlink('public/' . $service->image);
                }
            }
            $request->image->move('public/images/service', $imageName);
            $service->image = "images/service/" . $imageName;
        }
        $service->update();
        return redirect('admin/service')->with('success', 'Service updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        if ($service->image != "") {
            if (file_exists('public/' . $service->image)) {
                unlink('public/' . $service->image);
            }
        }
        return redirect('admin/service')->with('danger', 'Service deleted successfully!');

    }

    public function inactive($id)
    {
        $service = Service::find($id);
        $service->is_active = 0;
        $service->save();
        return redirect()->back();
    }

    public function active($id)
    {
        $service = Service::find($id);
        $service->is_active = 1;
        $service->save();
        return redirect()->back();
    }
}