@extends('layouts.admin')
@section('title', 'İletişim Mesajları')

@section('content')
    <h2>Gelen Kutusu</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ad</th>
                <th>Email</th>
                <th>Konu</th>
                <th>Durum</th>
                <th>Gönderim</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr class="{{ $message->is_read ? '' : 'table-warning' }}">
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->is_read ? 'Okundu' : 'Yeni' }}</td>
                    <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.message.show', $message) }}" class="btn btn-sm btn-primary">Detay</a>
                        <form action="{{ route('admin.message.destroy', $message) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Silinsin mi?')">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
