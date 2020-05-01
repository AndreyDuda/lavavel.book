<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();

        return view('blog.posts.index', compact('posts'));
    }
}
