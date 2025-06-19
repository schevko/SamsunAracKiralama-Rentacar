@extends('layouts.admin')
@section('title', 'Yeni Araç Oluştur')

@section('content')
<h2>Yeni Araç Ekle</h2>

<form method="POST" action="{{ route('admin.car.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Marka</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
    </div>

    <div class="mb-3">
        <label>Model</label>
        <input type="text" name="model" class="form-control" value="{{ old('model') }}" required>
    </div>

    <div class="mb-3">
        <label>Model Yılı</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
    </div>

    <div class="mb-3">
        <label>Günlük Fiyat</label>
        <input type="number" step="0.01" name="daily_price" class="form-control" value="{{ old('daily_price') }}" required>
    </div>

    <div class="mb-3">
        <label>Vites Tipi</label>
        <select name="transmission_type" class="form-select" required>
            <option value="manual">Manuel</option>
            <option value="automatic">Otomatik</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Yakıt Tipi</label>
        <select name="fuel_type" class="form-select" required>
            <option value="petrol">Benzin</option>
            <option value="diesel">Dizel</option>
            <option value="electric">Elektrik</option>
            <option value="hybrid">Hibrit</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Koltuk Sayısı</label>
        <input type="number" name="seat_count" class="form-control" value="{{ old('seat_count') }}" required>
    </div>

    <div class="mb-3">
        <label>Bagaj Hacmi (Litre)</label>
        <input type="number" name="luggage_capacity" class="form-control" value="{{ old('luggage_capacity') }}">
    </div>

    <div class="mb-3">
        <label>Açıklama</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Görseller (Çoklu)</label>
        <input type="file" name="images[]" class="form-control" multiple required>
    </div>

    <input type="hidden" name="is_active" value="1">

    <button class="btn btn-primary">Kaydet</button>
</form>
@endsection
