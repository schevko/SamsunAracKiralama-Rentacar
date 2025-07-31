<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::orderByDesc('created_at')->get();
        return view('admin.contactmessage.index' , compact('messages'));
    }
    public function show(ContactMessage $message)
    {
        if(!$message){
            $message->update(['is_read' => true]);
        }
        return view('admin.contactmessage.show' , compact('message'));
    }
    public function markAsunread(ContactMessage $message)
    {
        if($message){
            $message->update(['is_read' => false]);
        }
        return redirect()->route('admin.contactmessage.index');
    }
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.contactmessage.index');
    }
}
