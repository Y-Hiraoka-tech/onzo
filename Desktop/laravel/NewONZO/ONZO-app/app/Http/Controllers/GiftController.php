<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function show(Post $post)
    {
        $artist_id = Auth::id();
        $artists = DB::table('artists')->where('id',$artist_id)->get();
        $music_id = Auth::id();
        $posts = Post::all();
        return view('musics.giftselect', compact('artists','posts'));
    }

    public function form(Post $post)
    {
        $id = Auth::id();
        $artists = DB::table('artists')->where('id',$id)->get();
        $post = Post::find($id);
        return view('musics.giftform',compact('artists','post'));
    }

    public function purchase()
    {
        return view('musics.purchase');
    }
    public function store(Request $request)
    {
        // $id = Auth::id();
        // DB::table('users')->where('id',$id)->update(['tickets' => 2]);
        $id = Auth::id();
        //Modelを使わないとsave();を使えない
        $user = User::where('id',$id)->first();
        $user->tickets = $request->tickets;
        $user->save();

        return redirect()->to('/profile');
    }
}
