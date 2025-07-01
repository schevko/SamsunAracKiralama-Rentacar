@extends('Layouts.admin')
@section('title', 'Mesaj Detayı')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center justify-between">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Mesaj Detayı</p>
                        <div>
                            <span class="bg-gradient-to-tl {{ $message->is_read ? 'from-emerald-500 to-teal-400' : 'from-blue-600 to-cyan-400' }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                {{ $message->is_read ? 'Okundu' : 'Yeni' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="flex-auto p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="flex flex-col gap-4">
                            <div>
                                <p class="text-xs font-bold uppercase text-slate-500 mb-1">Gönderen</p>
                                <p class="text-sm font-semibold dark:text-white">{{ $message->name }}</p>
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase text-slate-500 mb-1">Email</p>
                                <p class="text-sm font-semibold dark:text-white">{{ $message->email }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col gap-4">
                            <div>
                                <p class="text-xs font-bold uppercase text-slate-500 mb-1">Konu</p>
                                <p class="text-sm font-semibold dark:text-white">{{ $message->subject }}</p>
                            </div>

                            <div>
                                <p class="text-xs font-bold uppercase text-slate-500 mb-1">Gönderim Zamanı</p>
                                <p class="text-sm font-semibold dark:text-white">{{ $message->created_at->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <p class="text-xs font-bold uppercase text-slate-500 mb-2">Mesaj İçeriği</p>
                        <div class="bg-gray-50 dark:bg-slate-800 p-4 rounded-lg">
                            <p class="text-sm whitespace-pre-line dark:text-white">{{ $message->message }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 mt-6">
                        @if($message->is_read)
                            <form method="POST" action="{{ route('admin.contactmessage.markAsunread', $message) }}">
                                @csrf
                                <button type="submit" class="inline-block px-6 py-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-yellow-600 to-yellow-400 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">Okunmadı Yap</button>
                            </form>
                        @endif

                        <a href="{{ route('admin.contactmessage.index') }}" class="inline-block px-6 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-gray-300 rounded-lg cursor-pointer leading-pro text-xs ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 hover:bg-transparent hover:opacity-75 hover:shadow-none active:opacity-85 text-gray-500">Geri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
