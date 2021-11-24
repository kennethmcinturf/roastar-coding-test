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

    public function store(Request $request) {
        $newPost = new Post();
        $newPost->name = $request->get('name');
        $newPost->description = $request->get('description');
        $newPost->save();

        return response()->json(['post' => $newPost]);
    }
}
