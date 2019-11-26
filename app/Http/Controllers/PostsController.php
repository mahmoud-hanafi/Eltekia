<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        // $this->middleware('auth');
        // $this->middleware('auth' , ['only'=>['show']]);
        $this->middleware('auth' , ['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts=DB::table('posts')->get();
        //$post=Post::orderBy('created_at','Desc')->paginate(2);
        $posts=DB::table('posts')->paginate(3);
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        return view('/posts/show',compact('post'));
        //return $id;
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
