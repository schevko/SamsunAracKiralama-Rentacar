<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Services\AiBlogService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $aiBlogService;
    public function __construct(AiBlogService $aiblogservice){
        $this->aiBlogService = $aiblogservice;
    }


    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }
        $data['content'] = $request->input('content');
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('uploads/posts', 'public');
        }

        Post::create($data);
        return redirect()->route('admin.post.index')->with('success', 'Blog başarıyla eklendi.');
    }

    public function edit(Post $post)
    {
        return view('admin.post.edit', compact('post'));
    }

    public function update(UpdatePostRequest $request, Post $post)
    {

        $data = $request->validated();
        $data['content'] = $request->input('content');
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }
        $data['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }
            $data['image_path'] = $request->file('image')->store('uploads/posts', 'public');
        }

        $post->update($data);
        return redirect()->route('admin.post.index')->with('success', 'Blog başarıyla güncellendi.');
    }

    public function destroy(Post $post)
    {
        if ($post->image_path) {
            Storage::disk('public')->delete($post->image_path);
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Blog başarıyla silindi.');
    }

    public function generateWithAi(Request $request)
    {
        $request->validate([
            'domain' => 'required|url',
            'location' => 'required|string',
            'company_name' => 'required|string',
        ]);

        $result = $this->aiBlogService->generateBlogContent(
             $request->domain,
             $request->location,
             $request->company_name
        );

        if($result['success']){
            $post = Post::create([
                'title' => $result['title'],
                'content' => $result['content'],
                'summary' => $result['summary'],
                'slug' => $result['slug'] ?? Str::slug($request['title']),
                'is_published' => true,
                'user_id' => Auth::id(),
            ]);
            return redirect()->route('admin.post.index')->with('success', 'Blog başarıyla oluşturuldu.');
        }
        return back()->withErrors(['error' => $result['message'] ?? 'Bilinmeyen bir hata oluştu.']);
    }

    /**
     * AJAX endpoint for AI blog generation
     */
    public function generateWithAiAjax(Request $request)
    {
        try {
            Log::info('AJAX Request received', [
                'method' => $request->method(),
                'url' => $request->url(),
                'data' => $request->all()
            ]);

            $request->validate([
                'domain' => 'required|url',
                'location' => 'required|string|max:100',
                'company_name' => 'required|string|max:100',
            ]);

            Log::info('Validation passed, calling AI service');

            $result = $this->aiBlogService->generateBlogContent(
                $request->domain,
                $request->location,
                $request->company_name
            );

            Log::info('AI Service result', ['result' => $result]);

            if ($result['success']) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'title' => $result['title'],
                        'content' => $result['content'],
                        'summary' => $result['summary'] ?? Str::limit(strip_tags($result['content']), 200),
                        'slug' => $result['slug'] ?? Str::slug($result['title']),
                    ]
                ]);
            }

            return response()->json([
                'success' => false,
                'error' => $result['error'] ?? 'Bilinmeyen bir hata oluştu.'
            ], 422);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->validator->errors()->all()]);
            return response()->json([
                'success' => false,
                'error' => 'Validation hatası: ' . implode(', ', $e->validator->errors()->all())
            ], 422);
        } catch (\Exception $e) {
            Log::error('AI Blog AJAX Error: ' . $e->getMessage(), [
                'exception' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'error' => 'Sistem hatası: ' . $e->getMessage()
            ], 500);
        }
    }
}
