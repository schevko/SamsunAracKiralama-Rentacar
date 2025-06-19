@extends('layouts.admin')
@section('title', 'Mesaj Detayı')

@section('content')
    <h2>Mesaj Detayı</h2>

    <div class="mb-3">
        <strong>Ad:</strong> {{ $message->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $message->email }}
    </div>
    <div class="mb-3">
        <strong>Konu:</strong> {{ $message->subject }}
    </div>
    <div class="mb-3">
        <strong>Mesaj:</strong>
        <p>{{ $message->message }}</p>
    </div>
    <div class="mb-3">
        <strong>Gönderim Zamanı:</strong> {{ $message->created_at->format('d.m.Y H:i') }}
    </div>

    <div class="d-flex gap-2">
        @if($message->is_read)
            <form method="POST" action="{{ route('admin.message.markAsunread', $message) }}">
                @csrf
                <button class="btn btn-warning">Okunmadı Yap</button>
            </form>
        @endif

        <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">Geri</a>
    </div>
@endsection
