<?php

namespace App\Models;

use App\Models\utilisateur;
use App\Models\comment;
use App\Models\likes;
use App\Models\dislikes;
use App\Models\categorie;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'sjt_post',
        'upvote',
        'categorie_id',
        'utilisateur_id',
        'downvote',
        'date_post'
    ];

    public function categorie()
    {
        return $this->belongsTo(categorie::class);
    }
    public function utilisateur()
    {
        return $this->belongsTo(utilisateur::class);
    }



    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function dislikes()


    {
        return $this->hasMany(Dislikes::class);
    }
}
