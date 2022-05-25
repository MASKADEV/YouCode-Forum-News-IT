<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "http://127.0.0.1:8000/api/register",
        "http://127.0.0.1:8000/api/login",
        "http://127.0.0.1:8000/api/getAllPosts",
        "http://127.0.0.1:8000/api/post",
        "http://127.0.0.1:8000/api/post/*",
        "http://127.0.0.1:8000/api/getAllComments",
        "http://127.0.0.1:8000/api/comment",
        "http://127.0.0.1:8000/api/post/like",
        "http://127.0.0.1:8000/api/post/like/*",
        "http://127.0.0.1:8000/api/post/dislike",
        "http://127.0.0.1:8000/api/post/dislike/*",
        "http://127.0.0.1:8000/api/categorie/",
        "http://127.0.0.1:8000/api/post/categorie/*",
        "http://127.0.0.1:8000/api/user/*",
        "http://127.0.0.1:8000/api/testPass/*",
        "http://127.0.0.1:8000/api/post/user/*",
        "http://127.0.0.1:8000/api/comment/*",
        "http://127.0.0.1:8000/api/users",
        "http://127.0.0.1:8000/api/user/*",
        "http://127.0.0.1:8000/api/loginAdmin"




    ];
}
