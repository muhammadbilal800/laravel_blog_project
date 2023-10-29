<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('welcome',[
            'posts'=>Post::latest()->with(['user'])->get(),
            'feature'=> Post::where('is_featured',true)->first()
        ]);
    }

   

    public function home(Request $request){
        $this->validate($request,[
            "search"=> 'required|max:256'
        ]);

        return back()->with('sucess','Subscribe Successfully!');
    }
}
