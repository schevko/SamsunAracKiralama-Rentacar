@extends('layouts.admin')
@section('title', 'Yeni Yazı Ekle')

@section('content')
    <h2>Yeni Blog</h2>

    <form method="POST" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="mb-3">
            <label>Özet</label>
            <textarea name="summary" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>İçerik</label>
            <textarea name="content" id="summernote" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Görsel</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Yayın Tarihi</label>
            <input type="datetime-local" name="published_at" class="form-control">
        </div>

        <input type="hidden" name="is_published" value="0">
        <div class="form-check mb-3">
            <input type="checkbox" name="is_published" value="1" class="form-check-input" checked>
            <label class="form-check-label">Yayınla</label>
        </div>

        <button class="btn btn-success">Kaydet</button>
    </form>
@endsection
