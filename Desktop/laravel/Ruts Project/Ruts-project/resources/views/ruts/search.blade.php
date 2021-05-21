<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body>
    <div class="top-wrapper">
    <h1 class="top-title">Search</h1>
    </div>
    <div class="contents">
	<h1>検索する</h1></div>
    </div>

<div class="select-screen" style="display:inline-flex;width:100%">

    <div class="home"style="width:25%">
        <form action="{{ route('home') }}" method="GET">
        <button class="under">
            {{ __('Home') }}
        </button>
        </form>
    </div>

    <div class="search"style="width:25%">
        <form action="{{ route('search') }}" method="GET">
        <button class="under">
            {{ __('search') }}
        </button >
        </form>
    </div>

    <div class="community"style="width:25%">
        <form action="{{ route('community') }}" method="GET">
        <button class="under">
            {{ __('community') }}
        </button >
        </form>
    </div>

    <div class="profile"style="width:25%">
        <form action="{{ route('profile') }}" method="GET">
        <button class="under">
            {{ __('profile') }}
        </button>
        </form>
    </div>

</div>


</body>
</html>