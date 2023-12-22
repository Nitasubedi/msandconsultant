<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::all();
        return view('backend.pages.users.index', compact('users', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.users.create');
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
            'email' => 'required | unique:users,email',
            'address' => 'required',
            'password' => 'required | min:8 | max:50',
            'phone_no' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);
        $user = new User();
        $user->name = $inputFields['name'];
        $user->email = $inputFields['email'];
        $user->address = $inputFields['address'];
        $user->password = bcrypt($inputFields['password']);
        $user->phone_no = $inputFields['phone_no'];
        $user->gender = $inputFields['gender'];
        $user->dob = $inputFields['dob'];
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->image->move('public/images/user', $image);
            $user->image = "images/user/" . $image;
        } else {
            $user->image = '';
        }

        $user->save();

        return redirect('admin/users')->with('success', 'User created successfully!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $inputFields = $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users,email,' . $user->id,
            'address' => 'required',
            'phone_no' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        $user->name = $inputFields['name'];
        $user->email = $inputFields['email'];
        $user->address = $inputFields['address'];
        $user->phone_no = $inputFields['phone_no'];
        $user->gender = $inputFields['gender'];
        $user->dob = $inputFields['dob'];

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            if ($user->image != "") {
                if (file_exists('public/' . $user->image)) {
                    unlink('public/' . $user->image);
                }
            }
            $request->image->move('public/images/user', $imageName);
            $user->image = "images/user/" . $imageName;
        }

        $user->update();

        return redirect('admin/users')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user->image != "") {
            if (file_exists('public/' . $user->image)) {
                unlink('public/' . $user->image);
            }
        }
        return redirect('admin/users')->with('danger', 'User deleted successfully!');
    }
}