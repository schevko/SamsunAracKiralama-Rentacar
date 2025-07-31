<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index' , compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:8',
            'is_admin' => 'nullable|boolean',
        ]);
        $data['is_admin'] = $request->input('is_admin',false);
        User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin.user.edit' , compact('user'));
    }

    public function update(Request $request , User $user)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
              'email' => [
              'required',
              'string',
              'email',
              'max:255',
            Rule::unique('users')->ignore($user->id),
        ],
            'password' => 'nullable|min:8',
            'is_admin' => 'nullable|boolean',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'Kullanıcı Başarıyla Silindi.');
    }
}
