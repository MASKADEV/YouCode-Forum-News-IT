<?php

namespace App\Models;

use App\Models\utilisateur;
use App\Models\post;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dislikes extends Model
{
    use HasFactory;
    protected $fillable = [

        "post_id",
        "id",
        "utilisateur_id"
    ];

    public function utilisateur()
    {
        return $this->belongsTo(utilisateur::class);
    }
    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
