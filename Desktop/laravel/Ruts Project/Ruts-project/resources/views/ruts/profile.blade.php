<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <div class="top-wrapper">
    <h1 class="top-title">Profile</h1>
    <form action="{{ route('edit') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('edit') }}
    </x-jet-button>
    </div>
    <div class="contents">
	<h1>プロフィール編集</h1></div>
    <h1>フォロワー</h1>
    <h1>もらった曲</h1>
    </div>
    <form action="{{ route('home') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('Home') }}
    </x-jet-button>
    </form>
    <form action="{{ route('search') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('search') }}
    </x-jet-button>
    </form>
    <form action="{{ route('community') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('community') }}
    </x-jet-button>
    </form>
    <form action="{{ route('profile') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('profile') }}
    </x-jet-button>
    </form>
</body>
</html>