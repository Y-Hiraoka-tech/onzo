<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $id = Auth::id();
        $posts = DB::table('posts')->where('user_id',$id)->get();
        return view('posts.index', ['posts' => $posts]);
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
        $id = Auth::id();

        $this->validate($request,Post::$rules);
        $image_path = $request->file('music_image')->store('public/uploads/');
        $file_path = $request->file('music_file')->store('public/uploads/');
        $trial_path = $request->file('music_trial')->store('public/uploads/');
        // if ($img = $request->music_image) {
        //     $imgName= $img->getClientOriginalName();
        //     $target_path = storage_path('uploads/');
        //     $img->move($target_path,$imgName);
        // }else {
        //     $imgName = "";
        // }

        // if ($file = $request->music_file) {
        //     $fileName= $file->getClientOriginalName();
        //     $target_path = storage_path('uploads/');
        //     $file->move($target_path,$fileName);
        // }else {
        //     $fileName = "";
        // }
        // if ($trial = $request->music_trial) {
        //     $trialName= $trial->getClientOriginalName();
        //     $target_path = storage_path('uploads/');
        //     $trial->move($target_path,$trialName);
        // }else {
        //     $trialName = "";
        // }

        //インスタンス作成
        $post = new Post();
        
        $post->name = $request->name;
        $post->music_image = basename($image_path);
        $post->music_file = basename($file_path);
        $post->music_trial = basename($trial_path);
        $post->music_lylic = $request->music_lylic;
        $post->music_ticket = $request->music_ticket;
        $post->user_id = $id;
        $post->save();
        return redirect()->to('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $id = Auth::id();
        $users = DB::table('users')->where('id',$id)->get();   
        return view('posts.detail',['post' => $post,'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // $usr_id = $post->user_id;
          $post = Post::find($id);
          
          return view('posts.edit',['post' => $post]);
          // return view('posts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id=1)
    {


        $post = Post::find($id);

        //$this->validate($request,Post::$rules);
        $image_path = $request->file('music_image')->store('public/uploads/');
        $file_path = $request->file('music_file')->store('public/uploads/');
        $trial_path = $request->file('music_trial')->store('public/uploads/');

        
        $post->name = $request->name;
        $post->music_image = basename($image_path);
        $post->music_file = basename($file_path);
        $post->music_trial = basename($trial_path);
        $post->music_lylic = $request->music_lylic;
        $post->music_ticket = $request->music_ticket;

        $post->save();
    
        return redirect()->to('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = \App\Models\Post::find($id);
        //削除
        $post->delete();

        return redirect()->to('/posts');
    }
}