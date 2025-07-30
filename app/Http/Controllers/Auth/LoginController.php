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
      if (Auth::attempt($credentials)) {
        if (in_array(Auth::user()->is_admin, [0, 1])) {
          return redirect()->route('admin.dashboard');
        } else {
          Auth::logout();
          return redirect()->back()->withErrors(['email' => 'Bu kullanıcı admin paneline giriş yapamaz']);
        }
      }
      return redirect()->back()->withErrors(['email' => 'Bu kullanıcı bulunamadı']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
