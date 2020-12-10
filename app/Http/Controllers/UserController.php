<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function login(Request $req){
        $user = User::where(['email' => $req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Invalid User or Password";
        } else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }

    
    function register(Request $req){
        //Create new user
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->is_admin = false;
        $user->save();
        $user->created_at = now();
        return redirect('/login');
    }
}
