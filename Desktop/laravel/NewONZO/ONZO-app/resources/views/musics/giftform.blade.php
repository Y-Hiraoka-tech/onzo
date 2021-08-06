@extends('layouts.gift')
@section('title', 'detail page')

@section('content')
@foreach($artists as $artist)
<body style="background: #272525;color:white;">
        <form action="/posts/store" method="post" enctype="multipart/form-data" style="background: #272525;color:white;">
                {{ csrf_field() }}
                <div style="padding:7% 7%;border-bottom:solid 1px;">         
                    <p style="margin-bottom: 0;">
                        <label style="width:30%;">
                            <img id="preview" src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100%;">
                        </label>
                        <p style="margin-left:15%;font-size:20px;">{{ $post->name }}</p>
                        <p style="margin-left:15%;font-size:20px;">{{$artist->name}}</p>
                        <p>ticket：{{ $post->music_ticket }}</p>
                    </p>
                </div>
            <div class="form-group" style="width:80%;margin:0 auto;padding-top:5%;">
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">送信先の選択</p>
                    <label id style="width: 100%;">
                        <input id="send" type="text" placeholder="選択"style="background-color:#7B7575;border-radius:10px;padding: 3px;width:100%;" readonly/>
                        <a href="{{ url('/gift/form/'.$post->id.'/users') }}" style="display:none;"></a>
                    </label>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">メッセージ入力欄</p>
                    <textarea name="message"　placeholder="メッセージを入力" rows="2" style="background-color:#7B7575;width:100%;border-radius:10px;"></textarea>
                </div>
                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">歌詞の選択</p>
                    <textarea name="music/lylic"　placeholder="歌詞選択" rows="2" style="background-color:#7B7575;width:100%;border-radius:10px;"></textarea>
                </div>

                <div style="margin-bottom: 3%;">
                    <p style="margin-bottom: 0;">アナログ・デジタルの選択</p>
                    <select class="method-select" name="method-select" style="background:#7B7575;color:#444444;border-radius:10px;padding: 3px;width:100%;">
                        <option selected>選択</option>
                        <option value="1">アナログ</option>
                        <option value="2">デジタル</option>
                    </select>
                </div>
                    <div class="text-center" style="margin-top: 15%;">
                        <input class="btn" type="submit" value="GIFT" style="background-color: #F16D0E;color:white;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </div>
            </div>
            </form>
</body>
@endforeach
@endsection