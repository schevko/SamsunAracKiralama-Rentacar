<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontPageController extends Controller
{
     public function showAbout()
    {
        $page = Page::where('slug' , 'hakkimizda')->where('is_active' , true)->firstOrFail();
        return view('Front.page.about' , compact('page'));
    }

    public function cookiepolicy()
    {
        $page = Page::where('slug' , 'cerez-politikasi')->where('is_active' , true)->firstOrFail();
        return view('Front.page.cookiepolicy' ,compact('page'));
    }
}
