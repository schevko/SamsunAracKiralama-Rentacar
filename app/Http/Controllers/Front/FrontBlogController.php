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
        return view('Front.Blog.index' , [
            'posts' => $posts,
            'meta_title' => 'Blog' . ' | ' . setting('site_title'),
            'meta_description' => 'En son haberler, ipuçları ve araç kiralama ile ilgili makaleler için blogumuzu ziyaret edin.',
        ]);
    }

    public function show(string $slug)
    {
        $post = Post::where('slug' , $slug)->where('is_published',  true)->firstOrFail();
        return view('Front.Blog.show', [
            'post' => $post,
            'meta_title' => $post->title . ' |' . setting('site_title'),
            'meta_description' => $post->summary,
        ]);
    }
}
