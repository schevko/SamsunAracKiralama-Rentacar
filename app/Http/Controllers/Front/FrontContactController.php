<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class FrontContactController extends Controller
{
    public function index()
    {
        return view('front.contact' , [
            'meta_title' => 'İletişim' . ' | ' . setting('site_title'),
            'meta_description' => 'Bizimle iletişime geçin. Sorularınız, önerileriniz veya rezervasyon talepleriniz için buradayız.',
        ]);
    }

    public function store(StoreContactMessageRequest $request)
    {
     $data = $request->validated();
     ContactMessage::create($data);
     return response()->json(['success' => 'Mesajınız Başarıyla Gönderildi']);
    }
}
