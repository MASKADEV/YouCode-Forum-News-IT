<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'maska';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'maska';
        // die;
        $fields = $request->validate([
            'title' => 'required|string',
            'user_id' => 'required|integer',
            'body' => 'required|string',
            'image_url' => 'required|string',
            'vote' => 'required|integer'
        ]);

        $post = Post::create([
            'title' => $fields['title'],
            'user_id' => $fields['user_id'],
            'body' => $fields['body'],
            'image_url' => $fields['image_url'],
            'vote' => $fields['vote']
        ]);

        $response = [
            'post' => $post,
        ];

        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatePost = Post::find($id);
        if($updatePost)
        {
            $updatePost->update([
                'title' => $request['title'],
                'user_id' => $request['user_id'],
                'body' => $request['body'],
                'image_url' => $request['image_url'],
                'vote' => $request['vote']
            ]);
            return response ([
                'post' => $updatePost,
            ], 201);
        }

        return response ([
            'post' => 'post not found'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $post = Post::find($id)->delete();
        if($post) {
            return response ([
                'message' => 'Post has been deleted',
            ], 201);    
        }else {
            return response ([
                'message' => 'Post not found',
            ], 401);
        }
    }
}
