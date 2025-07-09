<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class FrontPageController extends Controller
{
     public function showAbout()
    {
        $page = Page::where('slug' , 'hakkimizda')->where('is_active' , true)->firstOrFail();
        return view('front.page.about' , [
            'page' => $page,
            'meta_title' => $page->title . ' | ' . setting('site_title'),
            'meta_description' => Str::limit($page->content , 150),
        ]);
    }

    public function cookiepolicy()
    {
        $page = Page::where('slug' , 'cerez-politikasi')->where('is_active' , true)->firstOrFail();
        return view('front.page.cookiepolicy' ,[
            'page' => $page,
            'meta_title' => $page->title . ' | ' . setting('site_title'),
            'meta_description' => Str::limit($page->content , 150),
        ]);
    }
}
