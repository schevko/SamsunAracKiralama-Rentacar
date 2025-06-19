@extends('layouts.admin')
@section('title', 'Yazılar')

@section('content')
    <h2>Blog Listesi</h2>

    <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-3">Yeni Blog</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Başlık</th>
                <th>Yayın</th>
                <th>Tarih</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->is_published ? 'Evet' : 'Hayır' }}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>
                        <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-warning btn-sm">Düzenle</a>
                        <form action="{{ route('admin.post.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Silinsin mi?')" class="btn btn-danger btn-sm">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
