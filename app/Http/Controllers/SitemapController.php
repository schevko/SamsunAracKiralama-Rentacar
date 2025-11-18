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
        // Base URL'i al (production domain)
        $baseUrl = config('app.url', 'https://samsunarackiralama.com');

        $sitemap = Sitemap::create();

        // Anasayfa
        $sitemap->add(Url::create($baseUrl . '/')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(1.0)
        );

        // Statik Sayfalar
        $sitemap->add(Url::create($baseUrl . '/araclar')
            ->setLastModificationDate(now())
            ->setChangeFrequency('daily')
            ->setPriority(0.9)
        );

        $sitemap->add(Url::create($baseUrl . '/hakkimizda')
            ->setLastModificationDate(now())
            ->setChangeFrequency('monthly')
            ->setPriority(0.8)
        );

        $sitemap->add(Url::create($baseUrl . '/iletisim')
            ->setLastModificationDate(now())
            ->setChangeFrequency('monthly')
            ->setPriority(0.8)
        );

        $sitemap->add(Url::create($baseUrl . '/blog')
            ->setLastModificationDate(now())
            ->setChangeFrequency('weekly')
            ->setPriority(0.8)
        );

        $sitemap->add(Url::create($baseUrl . '/cerez-politikasi')
            ->setLastModificationDate(now())
            ->setChangeFrequency('monthly')
            ->setPriority(0.7)
        );

        // Aktif Araçlar - route: /araclar/{car}
        Car::where('is_active', 1)->get()->each(function(Car $car) use ($sitemap, $baseUrl) {
            $sitemap->add(Url::create($baseUrl . "/araclar/{$car->slug}")
                ->setLastModificationDate($car->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.8)
            );
        });

        // Yayınlanan Blog Yazıları - route: /blog/{blog}
        Post::where('is_published', 1)->get()->each(function(Post $post) use ($sitemap, $baseUrl) {
            $sitemap->add(Url::create($baseUrl . "/blog/{$post->slug}")
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.7)
            );
        });

        // Dinamik Sayfalar - route: /sayfa/{slug} (varsa)
        Page::where('is_active', 1)->get()->each(function(Page $page) use ($sitemap, $baseUrl) {
            $sitemap->add(Url::create($baseUrl . "/sayfa/{$page->slug}")
                ->setLastModificationDate($page->updated_at)
                ->setChangeFrequency('monthly')
                ->setPriority(0.6)
            );
        });

        // Sitemap XML dosyasını public klasöre yaz
        $sitemap->writeToFile(public_path('sitemap.xml'));

        // XML dosyasını oku ve response olarak döndür
        $xml = file_get_contents(public_path('sitemap.xml'));
        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
