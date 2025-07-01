@extends('Layouts.admin')
@section('title', 'Genel Ayarlar')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Genel Ayarlar</p>
                    </div>
                </div>

                <div class="flex-auto p-6">
                    @if(session('success'))
                    <div class="relative flex flex-col min-w-0 break-words bg-green-50 border border-green-300 rounded-lg mb-4">
                        <div class="p-4 text-green-700">
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
                        @csrf

                        <p class="font-bold text-slate-700 dark:text-white/80 text-base mb-3">Site Genel Ayarları</p>

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="site_title" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Site Başlığı</label>
                                    <input type="text" name="site_title" id="site_title" value="{{ setting('site_title') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="whatsapp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">WhatsApp Numarası</label>
                                    <input type="text" name="whatsapp" id="whatsapp" value="{{ setting('whatsapp') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="contact_email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">İletişim E-Posta</label>
                                    <input type="email" name="contact_email" id="contact_email" value="{{ setting('contact_email') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="contact_address" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Adres</label>
                                    <textarea name="contact_address" id="contact_address" rows="3" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">{{ setting('contact_address') }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="footer_text" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Footer Metni</label>
                                    <textarea name="footer_text" id="footer_text" rows="2" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">{{ setting('footer_text') }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="logo" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Logo Yükle</label>
                                    @if(setting('logo'))
                                        <div class="mb-3 p-2 bg-gray-50 dark:bg-slate-800 rounded-lg inline-block">
                                            <img src="{{ asset('storage/' . setting('logo')) }}" class="h-16 object-contain" alt="Logo Önizleme">
                                        </div>
                                    @endif
                                    <input type="file" name="logo" id="logo" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <button type="submit" class="inline-block px-8 py-2 mb-0 font-bold text-center text-black uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-blue-600 to-cyan-400 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">KAYDET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
