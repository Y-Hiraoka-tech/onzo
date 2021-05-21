@extends('layouts.app')
@section('title', 'create page')

@section('content')
    <div class="row">
        <!-- メイン -->
        <div class="col-10 col-md-6 offset-1 offset-md-3">
            <form action="/posts" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                <div>
                    <label for="exampleFormControlTextarea1">楽曲名：</label>
                    <input type="text" class="name-control" name="name">
                </div>
                <div>
                    <label>音源ファイルを選択してください：</label>
                    <input type="file" name="music_file"/>
                </div>
                <div>
                    <label>15秒間のお試し用音源ファイルを選択してください：</label>
                    <input type="file" name="music_trial"/>
                </div>
                <div>
                    <label>ジャケット写真を選択してください：</label>
                    <input type="file" name="music_image" accept="image/png, image/jpeg" />
                </div>
                <div>
                    <label>歌詞を入力してください：</label>
                    <textarea class="form-control" name="music_lylic" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div>
                    <label>ギフト券使用枚数を選択してください：</label>
                    <select class="ticket-select" name="music_ticket">
                    <option selected>ギフト券使用枚数</option>
                    <option value="1">１枚</option>
                    <option value="2">２枚</option>
                    <option value="3">３枚</option>
                    </select>
                </div>
                    <div class="text-center mt-3">
                        <input class="btn btn-primary" type="submit" value="投稿する">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection