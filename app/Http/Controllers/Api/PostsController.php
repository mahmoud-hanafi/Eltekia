<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\controller;
use App\Http\Resources\PostResource;
use App\Post;
Use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=DB::table('posts')->get();
        $posts=Post::orderBy('created_at','Desc')->paginate(2);
        //$posts=DB::table('posts')->paginate(3);
        return  PostResource::collection($posts); 
       //in condition of returning array // return new PostResource($posts);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['title'=>'bail|required|min:10' ,'body'=>'required']);
        $user = Auth::user();
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=$user->id;
        $post->save();
        return redirect('/posts')->with('success','Post Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return new PostResource ($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $userId=Auth::id();
        if($userId != $post->user_id )
        {
            return redirect('/posts')->with('error','It is not your Post Yaad! ');
        }
        return view('/posts/edit',compact('post'));
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
        $post=Post::find($id);
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();
        return redirect('posts/'.$post->id)->with('success','Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $userId=Auth::id();
        if($userId != $post->user_id )
        {
            return redirect('/posts')->with('error','It is not your Post Yaad! ');
        }
            $post->delete();
            return redirect('posts')->with('success','Post Deleted Successfully');
    }
}
