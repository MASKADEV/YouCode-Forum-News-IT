<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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
        echo $request->input['title'];
        die;
        // Post::create([
        //     'title' => $request->input['title'],
        //     'body' => $request->input['body'],
        //     'user_id' => 1
        //     ]
        // );

        return Redirect::route('home');
    }
}
