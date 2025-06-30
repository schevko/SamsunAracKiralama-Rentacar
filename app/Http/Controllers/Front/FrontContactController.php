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
        return view('front.contact');
    }

    public function store(StoreContactMessageRequest $request)
    {
     $data = $request->validated();
     ContactMessage::create($data);
     return redirect()->back()->with('success' ,  'Mesajınız Başarıyla Gönderildi');
    }
}
