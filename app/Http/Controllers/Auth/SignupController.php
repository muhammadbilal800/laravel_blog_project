<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index(){
        return view('auth.signup');
    }

    public function store(Request $request){
        $this->validate($request,[
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "password" => "required|max:255|min:6|confirmed"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        return back()->with('success','Account has been created!');
    }
}
