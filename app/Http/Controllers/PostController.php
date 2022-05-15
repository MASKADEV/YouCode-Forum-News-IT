<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Vote;
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

        if($request->hasFile('image_url'))
        {
            $file = $request->file('image_url');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);
        }

        Post::create([
            'title' => $postData['title'],
            'body' => $postData['body'],
            'image_url' => $request->file('image_url') ? $filename : null,
            'user_id' => Auth::user()->id,
            ]
        );

        return Redirect::route('home');
    }

    public function latest(){
        $latestPosts = Post::all();
        return Inertia::render('Home/Latest/Latest', ['latestPosts' => $latestPosts]);
    }

    public function postPreview($id) {
        $postDetails = Post::find($id);
        $comments = Comment::get()->where('post_id', $id);
        return Inertia::render('Post/Preview/Preview',['postDetails' => $postDetails, 'comments' => $comments]);
    }
}
