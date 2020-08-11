<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function newPost(Request $request)
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $validatedData = $request->validate([
                'userName' => 'string|max:40',
                'image' => 'mimes:jpeg,png,gif|max:2048',
                'password' => 'required'
            ]);

            $originalName = $request->image->getClientOriginalName();
            $date = new Carbon();
            $fileName = $date->format('YmdHis') . "." . $originalName;

            $request->image->storeAs('public/images', $fileName);

            $this->postRepository->create([
                'userName' => $validatedData['userName'],
                'message' => $request->message,
                'image' => $fileName,
                'password' => $validatedData['password']
            ]);

            return redirect()->route('main.post');
        }

        abort(500, 'Could not upload image...');
    }

}
