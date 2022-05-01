<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function addComment(Request $request) {
        $comment = $this->validate($request, [
            'body' => ['required'],
            'post_id' => ['required']
        ]);

        Comment::create([
            'body' => $comment['body'],
            'user_id' => Auth::user()->id,
            'post_id' => $comment['post_id']
        ]);
        return Redirect::route('posts.preview', $comment['post_id']);
    }

    public function deleteComment($id) {
        $comment = Comment::find($id[0]);
        $comment->delete();
        return Redirect::route('posts.preview', $id(1));
    }
}
