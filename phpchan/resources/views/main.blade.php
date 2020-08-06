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
           <hr />
           <form class="post_form" method="POST" action="{{ route('main.post') }}">
               @csrf

               <label for="userName">user: </label>
               <input type="text" name="userName">

               <label for="password">password: </label>
               <input type="password" name="password">

               <label for="image">image: </label>
               <input type="text" name="image">

               <label for="message">message: </label>
               <textarea name="message"></textarea>

               <button type="submit">send</button>
           </form>

           <hr />

           @foreach($posts as $post)
               <p>{{ $post->userName }}</p>
               <p>{{ $post->message }}</p>
               <hr />
           @endforeach
       </div>
    </body>
</html>
