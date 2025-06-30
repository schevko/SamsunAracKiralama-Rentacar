@extends('layouts.admin')
@section('title', 'Sayfa Düzenle')

@section('content')
    <h2>Sayfa Düzenle</h2>

    <form method="POST" action="{{ route('admin.page.update', $page) }}">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $page->title) }}" required>
        </div>

        <div class="mb-3">
            <label>Slug (URL)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $page->slug) }}" required>
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
           <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', $page->is_active) ? 'checked' : '' }}>

            <label class="form-check-label">Aktif</label>
        </div>

        <button class="btn btn-primary">Güncelle</button>
    </form>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
@endsection
