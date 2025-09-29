<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\AiBlogLimit;
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

    private function generateUniqueSlug($baseSlug , $excludeId = null)
    {
       $slug = Str::slug($baseSlug);
       $originalSlug = $slug;
       $counter = 1;
       while(true){
        $query = Post::where('slug' , $slug);
        if($excludeId){
            $query->where('id' , '!=' , $excludeId);
        }

        if(!$query->exists()){
            break;
        }
        $slug = $originalSlug . '-' . $counter;
        $counter++;
       }
       return $slug;
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        try {
            $aiUsageStatus = AiBlogLimit::getUsageStatus();
        } catch (\Exception $e) {
            // Hata durumunda default değerler
            $aiUsageStatus = [
                'used' => 0,
                'limit' => 20,
                'remaining' => 20,
                'exceeded' => false,
                'month' => date('Y-m')
            ];
            Log::warning('AiBlogLimit error, using defaults: ' . $e->getMessage());
        }
        return view('admin.post.create', compact('aiUsageStatus'));
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        if (empty($data['slug'])) {
            $data['slug'] = $this->generateUniqueSlug($data['title']);
        } else {
            $data['slug'] = $this->generateUniqueSlug($data['slug']);
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
            $data['slug'] = $this->generateUniqueSlug($data['title'] , $post->id);
        } else {
            $data['slug'] = $this->generateUniqueSlug($data['slug'], $post->id);
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
                'slug' => $result['slug'] ?? $this->generateUniqueSlug($result['title']),
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

            // Sistem geneli limit kontrolü yap
            if (AiBlogLimit::hasExceededLimit()) {
                $status = AiBlogLimit::getUsageStatus();
                return response()->json([
                    'success' => false,
                    'error' => "Sistem geneli yapay zeka kullanım limiti doldu! Bu ay toplam {$status['used']}/{$status['limit']} hak kullanıldı. Yeni ay için bekleyin.",
                    'limit_exceeded' => true,
                    'usage_status' => $status
                ], 429); // Too Many Requests
            }

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
                // Başarılı AI kullanımında sayacı artır
                AiBlogLimit::incrementUsage();
                $updatedStatus = AiBlogLimit::getUsageStatus();

                return response()->json([
                    'success' => true,
                    'data' => [
                        'title' => $result['title'],
                        'content' => $result['content'],
                        'summary' => $result['summary'] ?? Str::limit(strip_tags($result['content']), 200),
                        'slug' => $result['slug'] ?? $this->generateUniqueSlug($result['title']),
                    ],
                    'usage_status' => $updatedStatus
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
