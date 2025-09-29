<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class AiBlogService
{
    protected $apiUrl;
    protected $username;
    protected $password;
    public function __construct()
    {
        $this->apiUrl = config('services.ai_blog.url');
        $this->username = config('services.ai_blog.username');
        $this->password = config('services.ai_blog.password');
    }

    public function generateBlogContent($domain , $location , $companyName)
    {
        try{

            $response = Http::withBasicAuth($this->username , $this->password)
            ->timeout(60)
            ->asForm() // Form data olarak gönder
            ->post($this->apiUrl , [
                'domain' => $domain,
                'location' => $location,
                'company_name' => $companyName,
            ]);

            if($response->successful()){
                $data = $response->json();


                $outputData = null;
                if (isset($data[0]['output'])) {
                    $outputData = $data[0]['output'];
                } elseif (isset($data['output'])) {
                    $outputData = $data['output'];
                } else {
                    $outputData = $data;
                }

                // API'den dönen veri yapısını kontrol et
                if(isset($outputData['title']) && isset($outputData['content'])){

                    $processedTitle = $this->replacePlaceholders($outputData['title'], $domain, $location, $companyName);
                    $processedContent = $this->replacePlaceholders($outputData['content'], $domain, $location, $companyName);
                    $processedSummary = $this->replacePlaceholders($outputData['summary'] ?? '', $domain, $location, $companyName);

                    return [
                        'success' => true,
                        'title' => $processedTitle,
                        'content' => $processedContent,
                        'summary' => $processedSummary,
                        'slug' => $outputData['slug'] ?? '',
                    ];
                }

                // Alternatif alan adlarını kontrol et
                $title = $outputData['title'] ?? $outputData['Title'] ?? $outputData['baslik'] ?? '';
                $content = $outputData['content'] ?? $outputData['Content'] ?? $outputData['icerik'] ?? '';
                $summary = $outputData['summary'] ?? $outputData['Summary'] ?? $outputData['ozet'] ?? '';
                $slug = $outputData['slug'] ?? $outputData['Slug'] ?? '';

                if($title && $content) {
                    // Placeholder'ları gerçek değerlerle değiştir
                    $processedTitle = $this->replacePlaceholders($title, $domain, $location, $companyName);
                    $processedContent = $this->replacePlaceholders($content, $domain, $location, $companyName);
                    $processedSummary = $this->replacePlaceholders($summary, $domain, $location, $companyName);

                    return [
                        'success' => true,
                        'title' => $processedTitle,
                        'content' => $processedContent,
                        'summary' => $processedSummary,
                        'slug' => $slug,
                    ];
                }

                return [
                    'success' => false,
                    'error' => 'API yanıtı beklenen formatta değil.'
                ];
            }

            return [
                'success' => false,
                'error' => 'API isteği başarısız oldu: ' . $response->status()
            ];

        }catch(\Exception $e){
            Log::error('AI Blog API Hatası: ' . $e->getMessage());
            return [
                'success' => false,
                'error' => 'AI Blog API isteği sırasında bir hata oluştu.'
            ];
        }
    }

    /**
     * Placeholder'ları gerçek değerlerle değiştirir
     */
    private function replacePlaceholders($text, $domain, $location, $companyName)
    {
        if (empty($text)) {
            return $text;
        }


        $parsedDomain = parse_url($domain, PHP_URL_HOST) ?? $domain;
        $siteName = str_replace(['www.', '.com', '.net', '.org', '.tr'], '', $parsedDomain);

        $replacements = [
            '{company_name}' => $companyName,
            '{location}' => ucfirst($location),
            '{domain}' => $parsedDomain,
            '{site_name}' => $siteName,
            // Diğer olası placeholder'lar
            'company_name' => $companyName,
            'location' => ucfirst($location),
            'domain' => $parsedDomain,
            'site_name' => $siteName,
        ];

        // Placeholder'ları değiştir
        $processedText = str_replace(array_keys($replacements), array_values($replacements), $text);

        return $processedText;
    }
}
