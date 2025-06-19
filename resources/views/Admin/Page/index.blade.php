@extends('layouts.admin')
@section('title', 'Sayfalar')

@section('content')
    <h2>Sayfa Listesi</h2>

    <a href="{{ route('admin.page.create') }}" class="btn btn-primary mb-3">Yeni Sayfa</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Slug</th>
                <th>Durum</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>{{ $page->is_active ? 'Aktif' : 'Pasif' }}</td>
                    <td>
                        <a href="{{ route('admin.page.edit', $page) }}" class="btn btn-sm btn-warning">Düzenle</a>
                        <form action="{{ route('admin.page.destroy', $page) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Silinsin mi?')" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
