@extends('layouts.admin')
@section('title', 'Yazı Düzenle')

@section('content')
    <h2>Blog Düzenle</h2>

    <form method="POST" action="{{ route('admin.post.update', $post) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $post->slug) }}">
        </div>

        <div class="mb-3">
            <label>Özet</label>
            <textarea name="summary" class="form-control">{{ old('summary', $post->summary) }}</textarea>
        </div>

        <div class="mb-3">
            <label>İçerik</label>
            <textarea name="content" id="summernote" class="form-control">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Mevcut Görsel:</label><br>
            @if($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}" width="150">
            @endif
            <input type="file" name="image" class="form-control mt-2">
        </div>

        <div class="mb-3">
            <label>Yayın Tarihi</label>
            <input type="datetime-local" name="published_at" class="form-control" value="{{ \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') }}">
        </div>

        <input type="hidden" name="is_published" value="0">
        <div class="form-check mb-3">
            <input type="checkbox" name="is_published" value="1" class="form-check-input" {{ $post->is_published ? 'checked' : '' }}>
            <label class="form-check-label">Yayınla</label>
        </div>

        <button class="btn btn-primary">Güncelle</button>
    </form>
@endsection
