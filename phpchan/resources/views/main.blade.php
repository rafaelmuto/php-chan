<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('/css/main.css') }}" rel="stylesheet">

    <title>Php-Chan</title>
</head>
<body>
<div class="main">
    <h1>php-chan</h1>
    <hr/>
    <form class="post_form" method="POST" action="{{ route('main.post') }}" enctype="multipart/form-data">
        @csrf

        <label for="userName">user: </label>
        <input type="text" name="userName">

        <label for="password">password: </label>
        <input type="password" name="password">

        <label for="image">image: </label>
        <input type="file" name="image">

        <label for="message">message: </label>
        <textarea name="message"></textarea>

        <button type="submit">send</button>
    </form>

    <hr/>

    @foreach($posts as $post)
        <div class="post">
            <p class="post_id">{{ $post->userName }} @ {{ $post->created_at }}</p>
            <div class="post_content">
                <img class="post_image" src="{{ asset('storage/images/'. $post->image) }}" alt="post image">
                <p class="post_message">{{ $post->message }}</p>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
