@extends('layouts.setting')
@section('content')

<body style="background: #272525;color:white;">
@foreach($users as $user)
    <p style="margin-top: 5%;"><a href="{{ url('edit/editaccount/'.$user->id) }}">プロフィール変更</a></p>
@endforeach
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        
    </form>

    @extends('layouts.app_footer')
</body>
@endsection
