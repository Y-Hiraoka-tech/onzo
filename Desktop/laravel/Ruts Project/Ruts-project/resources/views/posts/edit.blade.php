@extends('layouts.app')

@section('title', 'edit page')
@section('content')
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <div class="card">
                <form action="/posts/edit" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <p class="card-text">
                    <input type="text" class="name-control" name="name">
                    <input type="file" name="music_file"/>
                    <input type="file" name="music_trial"/>
                    <input type="file" name="music_image" accept="image/png, image/jpeg" />
                    <textarea class="form-control" name="music_lylic" id="exampleFormControlTextarea1" rows="3">{{$post -> music_lylic}}</textarea>
                    <select class="ticket-select" name="music_ticket">
                    <option selected>ギフト券使用枚数</option>
                    <option value="1">１枚</option>
                    <option value="2">２枚</option>
                    <option value="3">３枚</option>
                    </select>
                    </p>
                    <div class="text-center mt-3">
                        <input name="post_id" type="hidden" value="{{$id ?? ''}}" >
                        <input class="btn btn-primary" type="submit" value="変更する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection