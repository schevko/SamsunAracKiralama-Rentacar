@extends('layouts.admin')
@section('title', 'Yeni Slider')

@section('content')
    <h2>Yeni Slider</h2>

    <form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Görsel</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Açıklama</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" class="form-control">

        </div>

        <div class="mb-3">
            <label>Sıra</label>
            <input type="number" name="order" class="form-control" value="0">
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
            <label class="form-check-label">Aktif</label>
        </div>

        <button type="submit" class="btn btn-success">Kaydet</button>
    </form>
@endsection
