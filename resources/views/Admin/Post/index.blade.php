@extends('Layouts.admin')
@section('title', 'Yazılar')

@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap items-center justify-between">
                    <h6 class="dark:text-white">Blog Listesi</h6>
                    <a href="{{ route('admin.post.create') }}" class="inline-block px-6 py-2 mb-4 font-bold text-center text-black uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">
                        <i class="fas fa-plus mr-1"></i> Yeni Blog
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="mx-6 mt-4">
                <div class="relative flex flex-col min-w-0 break-words bg-green-50 border border-green-300 rounded-lg">
                    <div class="p-4 text-green-700">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
            @endif

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Başlık</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Yayın</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tarih</th>
                                <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $post->title }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span class="bg-gradient-to-tl {{ $post->is_published ? 'from-emerald-500 to-teal-400' : 'from-slate-500 to-slate-400' }} px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                        {{ $post->is_published ? 'Yayında' : 'Taslak' }}
                                    </span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $post->published_at }}</span>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('admin.post.edit', $post) }}" class="block bg-amber-100 text-amber-800 px-3 py-2 rounded font-bold hover:bg-amber-200 transition-all text-sm">
                                            Düzenle
                                        </a>
                                        <form action="{{ route('admin.post.destroy', $post) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-100 text-red-900 px-3 py-2 rounded font-bold hover:bg-red-200 transition-all text-sm" onclick="return confirm('Bu blog yazısını silmek istediğinize emin misiniz?')">
                                                Sil
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
