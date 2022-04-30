<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function addComment(Request $request, $id) {

        $comment = $this->validate($request, [
            'first_name' => ['required', 'max:50'],
            'post_id' => ['required']
        ]);

        Comment::create([
            'body' => $comment['body'],
            'user_id' => Auth::user()->id,
            'post_id' => $comment['post_id']
        ]);

        return Redirect::route('posts.preview', $comment['post_id']);
    }
}
