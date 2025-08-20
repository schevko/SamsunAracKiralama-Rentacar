<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Page;
use App\Models\Post;

class FrontHomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published' , true)->orderBy('published_at' , 'desc')->paginate(10);
        $about = Page::where('slug' , 'hakkimizda')->where('is_active' , true)->first();
        $featuredcars = Car::where('is_active' , true)->get();

        return view('front.home', [
            'featuredcars' => $featuredcars,
            'about' => $about,
            'posts' => $posts,
            'meta_title' => setting('site_title'),
            'meta_description' => setting('site_description')
        ]);
    }

}
