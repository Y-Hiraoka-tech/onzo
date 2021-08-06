
@extends('layouts.requests')
@section('content')
<body style="background: #272525;color:white;">
    <div style="margin-top:50px;">
        <p>フォローリクエスト一覧</p>
        @foreach($users as $user)
            <nav style="display:flex; padding-top:3%;padding-left:2%;padding-bottom:10px;">
                <a href="{{ url('/followrequest/user/'.$user->id) }}">
                    <p style="margin-bottom: 0;"><img src="{{asset('storage/uploads/'.$user->user_image)}}" style="width:10%; border-radius:50%;vertical-align:middle;">
                    <span style="margin-left: 3%;">{{$user->username}}</span>
                    </p>
                </a>
            </nav>
        @endforeach
    </div>
    @extends('layouts.app_footer')
</body>
@endsection