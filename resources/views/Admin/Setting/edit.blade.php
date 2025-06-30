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

<form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data" class="card shadow-sm p-4">
    @csrf

    <h4 class="mb-4">Site Genel Ayarları</h4>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="site_title" class="form-label">Site Başlığı</label>
            <input type="text" class="form-control" id="site_title" name="site_title" value="{{ setting('site_title') }}">
        </div>
        <div class="col-md-6">
            <label for="whatsapp" class="form-label">WhatsApp Numarası</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ setting('whatsapp') }}">
        </div>
    </div>

    <div class="mb-3">
        <label for="contact_email" class="form-label">İletişim E-Posta</label>
        <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ setting('contact_email') }}">
    </div>

    <div class="mb-3">
        <label for="contact_address" class="form-label">Adres</label>
        <textarea name="contact_address" id="contact_address" rows="3" class="form-control">{{ setting('contact_address') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="footer_text" class="form-label">Footer Metni</label>
        <textarea name="footer_text" id="footer_text" rows="2" class="form-control">{{ setting('footer_text') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="logo" class="form-label">Logo Yükle</label>
        @if(setting('logo'))
            <div class="mb-2">
                <img src="{{ asset('storage/' . setting('logo')) }}" height="60" alt="Logo Önizleme">
            </div>
        @endif
        <input type="file" name="logo" id="logo" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>

</div>
@endsection
