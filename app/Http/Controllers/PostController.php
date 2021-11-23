<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewPost() {
        return view('postTable');
    }

    public function index() {
        return response()->json(['post' => Post::get()]);
    }
}
