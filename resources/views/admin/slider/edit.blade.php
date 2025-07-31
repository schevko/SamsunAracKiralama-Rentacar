@extends('layouts.admin')
@section('title', 'Slider Düzenle')

@section('content')
    <h2>Slider Düzenle</h2>

    <form method="POST" action="{{ route('admin.slider.update', $slider->id) }}" enctype="multipart/form-data">
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
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Görsel</label>
            <input type="file" name="image" class="form-control">
            @if($slider->image_path)
                <img src="{{ asset('storage/' . $slider->image_path) }}" alt="" width="150" class="mt-2">
            @endif
        </div>

        <div class="mb-3">
            <label>Başlık</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}">
        </div>

        <div class="mb-3">
            <label>Açıklama</label>
            <textarea name="description" class="form-control">{{ old('description', $slider->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="text" name="link" class="form-control" value="{{ old('link', $slider->link) }}">
        </div>

        <div class="mb-3">
            <label>Sıra</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}">
        </div>

        <div class="form-check mb-3">
            <label class="form-check-label">Aktif</label>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
@endsection
