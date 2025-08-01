<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Car;
use App\Models\Post;
use App\Models\Page;


class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = Sitemap::create();
        //Anasayfa
        $sitemap->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency('daily')->setPriority(1.0));
        //Statik Sayfalar
        $sitemap->add(Url::create('/araclar')->setLastModificationDate(now())->setChangeFrequency('daily')->setPriority(0.9));
        $sitemap->add(Url::create('/hakkimizda')->setLastModificationDate(now())->setChangeFrequency('monthly')->setPriority(0.8));
        $sitemap->add(Url::create('/iletisim')->setLastModificationDate(now())->setChangeFrequency('monthly')->setPriority(0.8));
        $sitemap->add(Url::create('/blog')->setLastModificationDate(now())->setChangeFrequency('weekly')->setPriority('0.8'));
        $sitemap->add(Url::create('/cerez-politikasi')->setLastModificationDate(now())->setChangeFrequency('monthly')->setPriority(0.7));

        //Araç Ekleme
        Car::where('is_active' , 1)->get()->each(function( Car $car) use ($sitemap){
            $sitemap->add(Url::create("/arac/{$car->slug}")
            ->setLastModificationDate($car->updated_at)
            ->setChangeFrequency('weekly')
            ->setPriority(0.8));
        });

        //Blog Yazıları Ekleme
        Post::where('is_published' , 1)->get()->each(function(Post $post) use ($sitemap){
            $sitemap->add(Url::create("/blog/{$post->slug}")
            ->setLastModificationDate($post->updated_at)
            ->setChangeFrequency('weekly')
            ->setPriority(0.7));
        });

        //Dinamik Sayfalar Ekleme
        Page::where('is_active' , 1)->get()->each(function(Page $page) use ($sitemap){
            $sitemap->add(Url::create("/sayfa/{$page->slug}")
            ->setLastModificationDate($page->updated_at)
            ->setChangeFrequency('monthly')
            ->setPriority(0.6));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return response()->view('sitemap::sitemapIndex.index' , [
            'message' => 'Sitemap başarıyla oluşturuldu.' . now()
        ]);
    }
}
