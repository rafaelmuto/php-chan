<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function test()
    {
        dd('api route get');

        return 'test';
    }

    public function allPosts()
    {
        $posts = Post::all();

        return response($posts);
    }

}
