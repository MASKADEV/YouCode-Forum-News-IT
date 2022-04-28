<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index () {
        $profile_details = User::find(Auth::user()->id, ['name', 'email', 'profile_url']);
        return Inertia::render('Profile/View/Index', 
            ['profile_details' => $profile_details]
        );
    }
}
