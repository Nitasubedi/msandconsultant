<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        return view('backend.pages.profile.profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $inputFields = $request->validate([
            'name' => 'required',
            'email' => 'required | unique:users,email,'.$user->id,
            'address' => 'required',
            'gender' => 'required',
            'dob' => 'required'
        ]);

        $user->name = $inputFields['name'];
        $user->email = $inputFields['email'];
        $user->address = $inputFields['address'];
        $user->gender = $inputFields['gender'];
        $user->dob = $inputFields['dob'];

        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->file('image')->getClientOriginalExtension();
            if($user->image!="") {
                if(file_exists('public/'.$user->image)) {
                    unlink('public/'.$user->image);   
                }
            }
            $request->image->move('public/images/user',$imageName);
            $user->image = "images/user/" . $imageName;
        }

        $user->update();

        return redirect('admin/profile');
    }

    public function viewChangePw()
    {
        return view('backend.pages.profile.change_pw');
    }

    public function changePw(Request $request, $id)
    {
        $user = User::find($id);
        $inputFields = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required | min:8 | max:50',
            'confirm_new_password' => 'required|min:8|max:50|same:new_password'
        ]);
        $oldPw = $inputFields['old_password'];
        
        if(Hash::check($oldPw, $user->password)){
            $newPw = $inputFields['new_password'];
            $user->password = bcrypt($newPw);
            $user->update();
            Auth::logout();
            return redirect('admin/login');
        }
        else{
            return redirect()->back()->with('message', 'Old Password incorrect');
        }
    }
}