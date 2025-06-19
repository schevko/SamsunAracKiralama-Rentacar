@extends('layouts.admin')

@section('title', 'Genel Ayarlar')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Genel Ayarlar</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.setting.update') }}">
        @csrf

        <div class="mb-3">
            <label for="site_title" class="form-label">Site Başlığı</label>
            <input type="text" class="form-control" name="site_title" id="site_title" value="{{ $settings['site_title'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="whatsapp_number" class="form-label">WhatsApp Numarası</label>
            <input type="text" class="form-control" name="whatsapp_number" id="whatsapp_number" value="{{ $settings['whatsapp_number'] ?? '' }}">
        </div>

        <div class="mb-3">
            <label for="footer_text" class="form-label">Footer Yazısı</label>
            <input type="text" class="form-control" name="footer_text" id="footer_text" value="{{ $settings['footer_text'] ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
</div>
@endsection
