@extends('layouts.admin')
@section('title', 'Slider Listesi')

@section('content')
    <h2>Slider Listesi</h2>
    <a href="{{ route('admin.slider.create') }}" class="btn btn-primary mb-3">Yeni Slider</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Sıra</th>
                <th>Durum</th>
                <th>İşlem</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->order }}</td>
                    <td>{{ $slider->is_active ? 'Aktif' : 'Pasif' }}</td>
                    <td>
                        <a href="{{ route('admin.slider.edit', $slider) }}" class="btn btn-sm btn-warning">Düzenle</a>
                        <form action="{{ route('admin.slider.destroy', $slider) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Silinsin mi?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
