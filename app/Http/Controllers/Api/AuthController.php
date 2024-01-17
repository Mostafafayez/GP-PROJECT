<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $req)
    {
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=$req->input('password');
        $user->phone=$req->input('phone');
        $user->save();
        return $user;
    }
    public function login (Request $req){

        $user = User :: where('email',$req->email)->first();
        if(!$user || !Hash ::check($req->password,$user->password))
        {
            return response([
                'error' => ["Email or Password is not mached"]
            ]);
        }
        return $user;
    }

}
