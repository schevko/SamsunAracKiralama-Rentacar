@extends('Layouts.admin')
@section('title', 'Yazı Düzenle')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Blog Düzenle</p>
                    </div>
                </div>

                <div class="flex-auto p-6">
                    @if ($errors->any())
                    <div class="relative flex flex-col min-w-0 break-words bg-red-50 border border-red-300 rounded-lg mb-4">
                        <div class="p-4 text-red-700">
                            <ul class="mb-0 list-disc pl-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.post.update', $post) }}" enctype="multipart/form-data">
                        @csrf @method('PUT')

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="title" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Başlık</label>
                                    <input type="text" name="title" value="{{ old('title', $post->title) }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="slug" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Slug</label>
                                    <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="summary" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Özet</label>
                                    <textarea name="summary" rows="3" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none">{{ old('summary', $post->summary) }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="content" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">İçerik</label>
                                    <textarea name="content" id="summernote" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none">{{ old('content', $post->content) }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Mevcut Görsel</label>
                                    @if($post->image_path)
                                        <div class="w-full mb-2 overflow-hidden rounded-lg shadow-sm">
                                            <img src="{{ asset('storage/' . $post->image_path) }}" class="max-h-48 object-contain bg-gray-100 p-1 w-auto" alt="Blog görseli">
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-500 italic mb-2">Görsel bulunmuyor</p>
                                    @endif
                                    <input type="file" name="image" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="published_at" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Yayın Tarihi</label>
                                    <input type="datetime-local" name="published_at" value="{{ \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-purple-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="flex items-center mb-4 mt-8">
                                    <input type="hidden" name="is_published" value="0">
                                    <input type="checkbox" name="is_published" value="1" id="is_published" class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500" {{ $post->is_published ? 'checked' : '' }}>
                                    <label for="is_published" class="ml-2 text-sm font-medium text-slate-700 dark:text-white/80">Yayınla</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <button type="submit" class="inline-block px-8 py-2 mb-0 font-bold text-center text-black uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">GÜNCELLE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Summernote CSS - Doğrudan sayfaya ekle -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<!-- Summernote JS - Sayfanın sonuna ekle -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'İçerik girin...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'italic', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection

