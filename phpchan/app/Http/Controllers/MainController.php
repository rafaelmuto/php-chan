<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->findAll();
        return view('main', ['posts' => $posts]);
    }

    public function newPost(Request $req)
    {
        $req->validate([
            'userName' => 'required'
        ]);

        $this->postRepository->create($req->all());

        return redirect()->route('main.post');
    }

}
