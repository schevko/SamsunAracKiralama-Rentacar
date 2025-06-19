@extends('layouts.admin')
@section('title', 'Araçlar')

@section('content')
    <h2>Araç Listesi</h2>
    <a href="{{ route('admin.car.create') }}" class="btn btn-primary mb-3">Yeni Araç</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Marka</th>
                <th>Model</th>
                <th>Yıl</th>
                <th>Fiyat</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->daily_price }} ₺</td>
                    <td>{{ $car->is_active ? 'Aktif' : 'Pasif' }}</td>
                    <td>
                        <a href="{{ route('admin.car.edit', $car) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form method="POST" action="{{ route('admin.car.destroy', $car) }}" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Silinsin mi?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
