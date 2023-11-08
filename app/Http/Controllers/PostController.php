<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        return view('admin.create-post',[
            "name" => "Create Post",
            
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:256',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp:max:1024'
        ]);

        $image=null;

        if($request->hasFile('image')){
            $image=$request->image->storeAs('post_images',
            str_replace(' ','-',strtolower($request->image->getClientOriginalName())),
            'public_disk');

            $url=asset('post_images/'.$image);
        }



        Post::create([
            'title' => $request->title,
            'slug' => str_replace(' ','-',strtolower($request->title)),
            'user_id'=> auth()->user()->id,
            'image' =>$image,
            'content'=>$request->content
        ]);

        return back()->with('success','Post has been created!');
    }
   

    public function save(Post $post){
        return view('admin.read-post',[
            'posts' => Auth::user()->posts()->paginate(50)
        ]);
        
    }

    public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return back();
    }

    public function toggle(Post $post){
        $post->is_active=!$post->is_active;
        $post->save();
        return back();
    }

    public function feature(Post $post){
        Post::where('is_featured', true)->update(['is_featured' => false]);
        $post->is_featured=!$post->is_featured;

        $post->save();
        return back();
    } 

   
    
    public function read(Post $post){
        
        return view('read-posts', [
           'post'=> $post->load('comments')  
        ]);
    }

    

    public function content(Post $post){
        return view('admin.view-content', [
            'post'=> $post
        ]);
    }


    public function update(Post  $post){
        return view('admin.update-post',[
            'post' => $post
        ]);
    }

    public function update_post(Request $request,Post $post){
        $this->validate($request,[
            'title' => 'required',
            'slug' =>'required',
            'content' =>'required',
            'image'=> "nullable|image|mimes:jpg,jpeg,png,webp:max:1024"
        ]);
        $image=null;
        if($request->hasFile('image')){
            $image=$request->image->storeAs('post_images',
            str_replace(' ','-',strtolower($request->image->getClientOriginalName())),'public_disk'
        );

        }
        $array = [
            'title' => $request->title,
            'slug' => str_replace(' ', '-', strtolower($request->slug)),
            'user_id' => auth()->user()->id,
            'image' => $image,
            'content' => $request->content
        ];

        $post->update($array);
        return redirect()->route('read.post')->with('success', 'Post has been updated!');
    }
 
}