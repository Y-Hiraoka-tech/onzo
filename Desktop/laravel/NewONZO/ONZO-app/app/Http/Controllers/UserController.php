<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('ruts.search')->with('users', $users);
    }

    public function show()
    {
        $id = Auth::id();
        $users = DB::table('users')->where('id',$id)->get();
        $posts = DB::table('posts')->where('user_id',$id)->get();
        $posts->count = count($posts);
        return view('ruts.profile',['users' => $users,'posts'=> $posts,]);
    }

    public function serch(Request $request) {
        $keyword_name = $request->name;
        $keyword_username = $request->username;
        if(!empty($keyword_name) && empty($keyword_username)) {
            $query = User::query();
            $users = $query->where('name','like', '%' .$keyword_name. '%')->get();
            $message = "「". $keyword_name."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult')->with([
              'users' => $users,
              'message' => $message,
            ]);
        }
        elseif(empty($keyword_name) && !empty($keyword_username)) {
            $query = User::query();
            $users = $query->where('username','like', '%' .$keyword_username. '%')->get();
            $message = "「". $keyword_username."」を含む名前の検索が完了しました。";
            return view('ruts.searchresult')->with([
              'users' => $users,
              'message' => $message,
            ]);
        }
        else {
            $message = "検索結果はありません。";
            return view('ruts.searchresult')->with('message',$message);
        }
    }
}
