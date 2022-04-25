<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'image_url',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function postcomments() {
        return $this->hasMany(Comment::class);
    }
}
