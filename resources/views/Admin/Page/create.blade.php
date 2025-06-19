@extends('layouts.admin')
@section('title', 'Yeni Sayfa Oluştur')

@section('content')
    <h2>Yeni Sayfa</h2>

    <form method="POST" action="{{ route('admin.page.store') }}">
        @csrf

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Slug (URL)</label>
            <input type="text" name="slug" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>İçerik</label>
            <textarea name="content" id="summernote" class="form-control">{{ old('content', $page->content ?? '') }}</textarea>
            <script>
                $(document).ready(function() {
                    $('#summernote').summernote({
                        height: 300,
                        placeholder: 'İçerik girin...'
                    });
                });
            </script>
        </div>

        <div class="form-check mb-3">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>

            <label class="form-check-label">Aktif</label>
        </div>

        <button class="btn btn-success">Kaydet</button>
    </form>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
@endsection
