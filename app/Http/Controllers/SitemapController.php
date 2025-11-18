<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Post;
use App\Models\Page;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $baseUrl = 'https://samsunarackiralama.com';

        // XML başlat
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Anasayfa
        $xml .= $this->createUrl($baseUrl . '/', now(), 'daily', '1.0');

        // Statik sayfalar
        $xml .= $this->createUrl($baseUrl . '/araclar', now(), 'daily', '0.9');
        $xml .= $this->createUrl($baseUrl . '/hakkimizda', now(), 'monthly', '0.8');
        $xml .= $this->createUrl($baseUrl . '/blog', now(), 'weekly', '0.8');
        $xml .= $this->createUrl($baseUrl . '/iletisim', now(), 'monthly', '0.8');
        $xml .= $this->createUrl($baseUrl . '/cerez-politikasi', now(), 'monthly', '0.7');

        // Araçlar
        $cars = Car::where('is_active', 1)->get();
        foreach ($cars as $car) {
            $xml .= $this->createUrl(
                $baseUrl . '/araclar/' . $car->slug,
                $car->updated_at,
                'weekly',
                '0.8'
            );
        }

        // Blog yazıları
        $posts = Post::where('is_published', 1)->get();
        foreach ($posts as $post) {
            $xml .= $this->createUrl(
                $baseUrl . '/blog/' . $post->slug,
                $post->updated_at,
                'weekly',
                '0.7'
            );
        }

        // Dinamik sayfalar
        $pages = Page::where('is_active', 1)->get();
        foreach ($pages as $page) {
            $xml .= $this->createUrl(
                $baseUrl . '/sayfa/' . $page->slug,
                $page->updated_at,
                'monthly',
                '0.6'
            );
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8')
            ->header('Cache-Control', 'public, max-age=3600');
    }

    private function createUrl($loc, $lastmod, $changefreq, $priority)
    {
        $lastmodDate = $lastmod instanceof Carbon
            ? $lastmod->toW3cString()
            : Carbon::parse($lastmod)->toW3cString();

        return "  <url>\n" .
               "    <loc>" . htmlspecialchars($loc) . "</loc>\n" .
               "    <lastmod>" . $lastmodDate . "</lastmod>\n" .
               "    <changefreq>" . $changefreq . "</changefreq>\n" .
               "    <priority>" . $priority . "</priority>\n" .
               "  </url>\n";
    }
}
