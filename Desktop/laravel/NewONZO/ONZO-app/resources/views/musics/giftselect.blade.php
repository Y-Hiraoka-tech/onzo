@extends('layouts.gift')
@section('content')
<body style="background: #272525;color:white;">
    <div class="contents">

        <div class="music" style="text-align:center; margin-top:5%">
                    @foreach($posts as $post)
                            <a href="{{ url('/gift/form/'.$post->id) }}" style="scroll-snap-align: start;">
                                <img  src="{{asset('storage/uploads/'.$post->music_image)}}" style="width:100px;margin-right:5px;">
                            </a>
                            <p>{{ $post->name }}</p>
                            @foreach($artists as $artist)
                            <p>{{ $artist->name }}</p>
                            @endforeach
                    @endforeach
        </div>

    </div>
@extends('layouts.app_footer')
</body>
@endsection