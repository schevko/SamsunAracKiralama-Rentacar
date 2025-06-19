@extends('layouts.admin')
@section('title', 'Araç Düzenle')

@section('content')
<h2>Araç Düzenle</h2>

<form method="POST" action="{{ route('admin.car.update', $car) }}">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Marka</label>
        <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
    </div>

    <div class="mb-3">
        <label>Model</label>
        <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}" required>
    </div>

    <div class="mb-3">
        <label>Model Yılı</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $car->year) }}" required>
    </div>

    <div class="mb-3">
        <label>Günlük Fiyat</label>
        <input type="number" step="0.01" name="daily_price" class="form-control" value="{{ old('daily_price', $car->daily_price) }}" required>
    </div>

    <div class="mb-3">
        <label>Vites Tipi</label>
        <select name="transmission_type" class="form-select" required>
            <option value="manual" @selected($car->transmission_type === 'manual')>Manuel</option>
            <option value="automatic" @selected($car->transmission_type === 'automatic')>Otomatik</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Yakıt Tipi</label>
        <select name="fuel_type" class="form-select" required>
            <option value="petrol" @selected($car->fuel_type === 'petrol')>Benzin</option>
            <option value="diesel" @selected($car->fuel_type === 'diesel')>Dizel</option>
            <option value="electric" @selected($car->fuel_type === 'electric')>Elektrik</option>
            <option value="hybrid" @selected($car->fuel_type === 'hybrid')>Hibrit</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Koltuk Sayısı</label>
        <input type="number" name="seat_count" class="form-control" value="{{ old('seat_count', $car->seat_count) }}" required>
    </div>

    <div class="mb-3">
        <label>Bagaj Hacmi (Litre)</label>
        <input type="number" name="luggage_capacity" class="form-control" value="{{ old('luggage_capacity', $car->luggage_capacity) }}">
    </div>

    <div class="mb-3">
        <label>Açıklama</label>
        <textarea name="description" class="form-control">{{ old('description', $car->description) }}</textarea>
    </div>

    <div class="mb-3 form-check">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" value="1" class="form-check-input" @checked($car->is_active)>
        <label class="form-check-label">Aktif</label>
    </div>
    <button class="btn btn-primary">Güncelle</button>
</form>

<hr>

<h4 class="mt-4">Araç Görselleri</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('admin.carimage.store', $car) }}" enctype="multipart/form-data" class="mb-4">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success">Toplu Yükle</button>
        </div>
    </div>
</form>

<div class="row">
    @foreach($car->images as $image)
        <div class="col-md-3 mb-3 text-center">
            <img src="{{ asset('storage/' . $image->path) }}" width="100%" class="img-thumbnail mb-2">

            @if($image->is_thumbnail)
                <div class="badge bg-success mb-2">Kapak Görseli</div>
            @else
                <form method="POST" action="{{ route('admin.carimage.setThumbnail', $image) }}">
                    @csrf @method('PUT')
                    <button class="btn btn-sm btn-outline-primary w-100">Kapak Yap</button>
                </form>
            @endif

            <form method="POST" action="{{ route('admin.carimage.destroy', $image) }}" class="mt-2">
                @csrf @method('DELETE')
                <button onclick="return confirm('Silinsin mi?')" class="btn btn-sm btn-outline-danger w-100">Sil</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
