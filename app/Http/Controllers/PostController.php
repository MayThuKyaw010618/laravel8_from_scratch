<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->paginate(11)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'post' => $post
        ]);
    }
}
