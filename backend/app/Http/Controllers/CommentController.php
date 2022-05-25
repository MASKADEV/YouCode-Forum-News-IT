<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment;

use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function index()
    {
        return comment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'post_id' => 'required',
                'sjt_comments' => 'required',
                'utilisateur_id' => 'required',

            ]
        );
        return comment::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('comments')
            ->join('utilisateurs', 'comments.utilisateur_id', '=', 'utilisateurs.id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->where("posts.id", 'like',  $id)
            ->select('*')
            ->get();
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
        $post = comment::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return comment::where("id_comment", "like", $id)->delete();
    }
    /**
     * search for a name 
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return comment::where("sjt_post", 'like', '%' . $name . '%')->get();
    }

    public function getAllComments()
    {

        return DB::table('comments')
            ->join('utilisateurs', 'comments.utilisateur_id', '=', 'utilisateurs.id')
            ->join('posts', 'comments.post_id', '=', 'posts.id')
            ->select('*')
            ->get();
        // return post::join
        // ('utilisateurs', 'posts.utilisateur_id', '=', 'utilisateurs.id')
        // // ->join('orders', 'users.id', '=', 'orders.user_id')
        // ->select('posts.id')
        // ->get();
    }
}
