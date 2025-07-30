@extends('layouts.admin')
@section('title', 'Kullanıcıyı Güncelle')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        {{-- Kullanıcı adını başlıkta göstermek daha bilgilendirici olabilir --}}
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">{{ $user->name }} Adlı Kullanıcıyı Düzenle</p>
                    </div>
                </div>

                <div class="flex-auto p-6">
                    @if ($errors->any())
                    <div class="relative flex flex-col min-w-0 break-words bg-red-50 border border-red-300 rounded-lg mb-4">
                        <div class="p-4 text-red-700">
                            <ul class="mb-0 list-disc pl-4">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                    {{-- Controller'dan gelen $user objesini kullandığımızı varsayıyoruz --}}
                    <form role="form text-left" method="POST" action="{{ route('admin.user.update', $user->id) }}">
                        @csrf
                        @method('PUT') {{-- veya PATCH --}}

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Kullanıcı Bilgileri</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="name" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Ad Soyad</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">E-posta Adresi</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>

                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Şifreyi Güncelle (İsteğe Bağlı)</p>
                         <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="password" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Yeni Şifre</label>
                                    <input type="password" name="password" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="password_confirmation" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Yeni Şifre Tekrar</label>
                                    <input type="password" name="password_confirmation" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>


                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="is_admin" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Admin mi?</label>
                                    <select name="is_admin" id="is_admin" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        <option value="0" {{ old('is_admin', $user->is_admin) == '0' ? 'selected' : '' }}>Hayır</option>
                                        <option value="1" {{ old('is_admin', $user->is_admin) == '1' ? 'selected' : '' }}>Evet</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <button type="submit" class="inline-block px-8 py-2 mb-0 font-bold text-center text-black uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-green-500 to-teal-500 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">GÜNCELLE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
