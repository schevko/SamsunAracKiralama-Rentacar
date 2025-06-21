<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index' ,compact('posts'));
    }
    public function create()
    {
        return view('admin.post.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug',
            'summary' => 'nullable|string',
            'image' => 'nullable|image|max:5096',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data['user_id'] = Auth::id();;
        if($request->hasfile('image')){
            $data['image_path'] = $request->file('image')->store('uploads/posts' , 'public');
        }
        Post::create($data);
        return redirect()->route('admin.post.index')->with('success' , 'Blog Eklendi');
    }
    public function edit(Post $post)
    {
        return view('admin.post.edit' ,  compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'slug' => 'required|string|unique:posts,slug,' . $post->id,
            'summary' => 'nullable|string',
            'image' => 'nullable|image|max:5096',
            'is_published' => 'boolean',
            'published_at' => 'nullable|date'
        ]);
        if($request->hasfile('image')){
            if($post->image_path){
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $request->file('image')->store('uploads/posts' , 'public');
        }
        $data['user_id'] = Auth::id();
        $post->update($data);
        return redirect()->route('admin.post.index')->with('success' , 'Blog Güncellendi');
    }
    public function destroy(Post $post)
    {
        if($post->image_path){
            Storage::disk('public')->delete($post->image_path);
        }
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
