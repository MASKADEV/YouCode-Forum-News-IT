<?php


namespace App\Http\Controllers;

use App\Models\post;
use App\Models\utilisateur;
use App\Models\comment;
use App\Models\likes;
use App\Models\dislikes;



use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts = Post::orderBy('created_at', 'desc')->with('utilisateur', 'comments', 'likes', 'dislikes', "categorie")->get();

        foreach ($posts as $post) {
            foreach ($post->comments as $comment) {
                $comment->setAttribute('user', utilisateur::find($comment->utilisateur_id));
            }
        }

        return response(array(
            'posts' => $posts
        ), 200);
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
                'sjt_post' => 'required',
                'upvote' => '',
                'categorie_id' => 'required',
                'utilisateur_id' => 'required',
                'downvote' => '',
                'date_post' => ''
            ]
        );
        return post::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DB::table('posts')
            ->join('utilisateurs', 'posts.utilisateur_id', '=', 'utilisateurs.id')
            ->join('categories', 'posts.categorie_id', '=', 'categories.id')
            ->where("utilisateurs.id", 'like',  $id)
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
        $post = Post::find($id);
        $post->update($request->all());

        return response(array(
            'posts' => $post
        ), 200);
        // return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return post::destroy(($id));
    }
    /**
     * search for a name 
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return post::where("sjt_post", 'like', '%' . $name . '%')->get();
    }

    public function getPostsByUser($id)
    {
        $posts = Post::orderBy('created_at', 'desc')->with('utilisateur', 'comments', 'likes', 'dislikes', "categorie")->where("utilisateur_id", 'like',  $id )->get();

        foreach ($posts as $post) {
            foreach ($post->comments as $comment) {
                $comment->setAttribute('user', utilisateur::find($comment->utilisateur_id));
            }
        }

        return response(array(
            'posts' => $posts
        ), 200);
    }
    //likes
    public function likes(Request $request)
    {

        return Likes::create($request->all());
    }
    public function destroyLike($id)
    {
        return likes::destroy(($id));
    }


    // dilikes
    public function dislikes(Request $request)
    {

        return Dislikes::create($request->all());
    }
    public function destroydisLike($id)
    {
        return dislikes::destroy(($id));
    }
    public function postsByCategorie($id)
    {
        $posts = Post::orderBy('created_at', 'desc')->with('utilisateur', 'comments', 'likes', 'dislikes', "categorie")->where("categorie_id", 'like',  $id)->get();

        foreach ($posts as $post) {
            foreach ($post->comments as $comment) {
                $comment->setAttribute('user', utilisateur::find($comment->utilisateur_id));
            }
        }

        return response(array(
            'posts' => $posts
        ), 200);
    }
}
