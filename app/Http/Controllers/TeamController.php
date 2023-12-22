<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $teams = Team::all();
        return view('backend.pages.team.index', compact('teams', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.team.create');
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
            'email' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'blood_group' => 'required'
        ]);
        $team = new Team();
        $team->name = $inputFields['name'];
        $team->email = $inputFields['email'];
        $team->address = $inputFields['address'];
        $team->phone_no = $inputFields['phone_no'];
        $team->mobile_no = $inputFields['mobile_no'];
        $team->gender = $inputFields['gender'];
        $team->dob = $inputFields['dob'];
        $team->joining_date = $inputFields['joining_date'];
        $team->blood_group = $inputFields['blood_group'];
        $team->bio = $request->input('bio');

        if($request->hasFile('image'))
        {
            $image = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/team',$image);
            $team->image = "images/team/" . $image;
        }
        else {
            $team->image = '';
        }

        $team->save();

        return redirect('admin/team')->with('success', 'Team created successfully!');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('backend.pages.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $inputFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone_no' => 'required',
            'mobile_no' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'joining_date' => 'required',
            'blood_group' => 'required'
        ]);
        $team->name = $inputFields['name'];
        $team->email = $inputFields['email'];
        $team->address = $inputFields['address'];
        $team->phone_no = $inputFields['phone_no'];
        $team->mobile_no = $inputFields['mobile_no'];
        $team->gender = $inputFields['gender'];
        $team->dob = $inputFields['dob'];
        $team->joining_date = $inputFields['joining_date'];
        $team->blood_group = $inputFields['blood_group'];
        $team->bio = $request->input('bio');

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($team->image!="") {
                if(file_exists('public/'.$team->image)) {
                    unlink('public/'.$team->image);   
                }
            }
            $request->image->move('public/images/team',$imageName);
            $team->image = "images/team/" . $imageName;
        }

        $team->update();

        return redirect('admin/team')->with('success', 'Team updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        if($team->image!="") {
            if(file_exists('public/'.$team->image)) {
                unlink('public/'.$team->image);   
            }
        }
        return redirect('admin/team')->with('danger', 'Team deleted successfully!');

    }
}