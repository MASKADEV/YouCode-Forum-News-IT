<?php

namespace App\Http\Controllers;
use App\Models\categorie;

use Illuminate\Http\Request;

class categorieController extends Controller
{
    //
    public function index()
    {
        return categorie::all();
    }
}
