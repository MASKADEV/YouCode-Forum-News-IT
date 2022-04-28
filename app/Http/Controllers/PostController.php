<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index() {
        $posts = Post::get();
        return Inertia::render('Home/posts', [
            'posts' => $posts,
        ]);
    }

    public function add () {
        return Inertia::render('Post/Add/Add');
    }

    public function store(Request $request)
    {
        $postData = $this->validate($request, [
            'title' => ['required'],
            'body' => ['required'],
            'image_url' => ['nullable', 'image']
        ]);
        
        Post::create([
            'title' => $postData['title'],
            'body' => $postData['body'],
            'image_url' => $request->file('image_url') ? $request->file('image_url')->store('images', 'public') : null,
            'user_id' => Auth::user()->id,
            ]
        );

        return Redirect::route('home');
    }
}
