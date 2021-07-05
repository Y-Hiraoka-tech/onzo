<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1>プロフィールを編集します</h1>
    <form action="{{ route('profile') }}" method="GET">
    <x-jet-button class="ml-4">
                    {{ __('profileに戻る') }}
    </x-jet-button>
</body>
</html>