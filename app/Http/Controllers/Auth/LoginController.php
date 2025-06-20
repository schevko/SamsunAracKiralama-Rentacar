<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
      if(Auth::attempt(array_merge($credentials , ['is_admin' => true]))){
        return redirect()->route('admin.dashboard');
      }
      return redirect()->back()->withErrors(['email' => 'Bu kullanıcı bulunamadı']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
