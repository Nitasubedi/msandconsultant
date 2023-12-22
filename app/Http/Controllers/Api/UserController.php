<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password = $request->password;
        $user->password = bcrypt($password);

        $status = $user->save();
        if($status)
        {
            return response([
                'Success' => true,
                'message' => 'Data Stored Successfully',
            ]);
        }
    }

    function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if($user){
            if(Hash::check($password, $user->password)){
                unset($user->email_verified_at, $user->created_at, $user->updated_at);
                return response([
                    'Success' => true,
                    'data' => $user
                ]);
            }else{
                return response([
                    'Success' => false,
                    'message' => 'Incorrect Credintials'
                ]);
            }
        }
        else{
            return response([
                'Success' => false,
                'message' => 'User not found'
            ]);
        }   
    }
}