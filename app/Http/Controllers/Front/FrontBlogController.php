<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class FrontBlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published' , true)->orderBy('published_at' , 'desc')->paginate(10);
        return view('Front.Blog.index' , compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::where('slug' , $slug)->where('is_published',  true)->firstOrFail();
        return view('Front.Blog.show',  compact('post'));
    }
}
