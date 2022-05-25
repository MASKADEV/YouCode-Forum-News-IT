<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\admin as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\post;
use App\Models\comment;


class admin extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'reff_admin',
        'pass',

    ];
}
