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
                </div>
                <div class="card-body">
                    <h1 class="card-text">{{ $post->name }}</h1>
                    <p class="card-text">{{ $post->music_image }}</p>
                    <p class="card-text">{{ $post->music_file }}</p>
                    <p class="card-text">{{ $post->music_trial }}</p>
                    <p class="card-text">{{ $post->music_lylic }}</p>
                    <p class="card-text">ticket:{{ $post->music_ticket }}</p>

                    @auth
                        <a href="{{ url('posts/edit/'.$post->id) }}" class="btn btn-dark">編集する</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection