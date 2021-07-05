@extends('layouts.app')
@section('title', 'detail page')

@section('content')
<div class="container">
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <div class="card-header">
                    {{ $post->id }}
                    <div style="text-align: right;float:right">Uploaded by:{{$user->name}}</div>
                </div>
                <div class="card-body" style="text-align: center;align-items: center;">
                    <img src="{{asset('storage/uploads/'.$post->music_image)}}" style="display: block; margin: auto;width:70%;">
                    <h1 class="card-text mt-4"style="font-size:30px;">{{ $post->name }} -Single</h1>
                    <h1 class="card-text"style="font-size:25px;color:red;">{{$user->name}}</h1>
                    <audio src="{{asset('storage/uploads/'.$post->music_file)}}" controls style="display: block; margin: auto;"></audio>
                    <p class="card-text">ticket：{{ $post->music_ticket }}</p>
                    <div class="card-text mt-4" style="display: block; margin: auto;width:70%;background-color: #f0f8ff;">
                    <p>{{ $post->music_lylic }}</p>
                    </div>
                    <p class="mt-4">トライアル用音源ファイル</p>
                    <audio src="{{asset('storage/uploads/'.$post->music_trial)}}" controls style="display: block; margin: auto;"></audio>

                    @auth
                        <a href="{{ url('posts/edit/'.$post->id) }}" class="mt-4 btn btn-dark">編集する</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection