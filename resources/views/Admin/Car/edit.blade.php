@extends('Layouts.admin')
@section('title', 'Araç Düzenle')

@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <!-- Araç Bilgileri Kartı -->
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border mb-6">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Araç Düzenle</p>
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

                    <form method="POST" action="{{ route('admin.car.update', $car) }}">
                        @csrf @method('PUT')

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Araç Bilgileri</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="brand" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Marka</label>
                                    <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="model" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Model</label>
                                    <input type="text" name="model" value="{{ old('model', $car->model) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="year" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Model Yılı</label>
                                    <input type="number" name="year" value="{{ old('year', $car->year) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="daily_price" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Günlük Fiyat</label>
                                    <input type="number" step="0.01" name="daily_price" value="{{ old('daily_price', $car->daily_price) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>

                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Teknik Özellikler</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="transmission_type" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Vites Tipi</label>
                                    <select name="transmission_type" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        <option value="manual" @selected($car->transmission_type === 'manual')>Manuel</option>
                                        <option value="automatic" @selected($car->transmission_type === 'automatic')>Otomatik</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="fuel_type" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Yakıt Tipi</label>
                                    <select name="fuel_type" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        <option value="petrol" @selected($car->fuel_type === 'petrol')>Benzin</option>
                                        <option value="diesel" @selected($car->fuel_type === 'diesel')>Dizel</option>
                                        <option value="electric" @selected($car->fuel_type === 'electric')>Elektrik</option>
                                        <option value="hybrid" @selected($car->fuel_type === 'hybrid')>Hibrit</option>
                                    </select>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="seat_count" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Koltuk Sayısı</label>
                                    <input type="number" name="seat_count" value="{{ old('seat_count', $car->seat_count) }}" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label for="luggage_capacity" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Bagaj Hacmi (Litre)</label>
                                    <input type="number" name="luggage_capacity" value="{{ old('luggage_capacity', $car->luggage_capacity) }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                        </div>

                        <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Ek Bilgiler</p>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="mb-4">
                                    <label for="description" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Açıklama</label>
                                    <textarea name="description" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" rows="4">{{ old('description', $car->description) }}</textarea>
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0">
                                <div class="flex items-center">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1" id="is_active" class="w-5 h-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500" @checked($car->is_active)>
                                    <label for="is_active" class="ml-2 text-sm font-medium text-slate-700 dark:text-white/80">Aktif</label>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-6">
                            <button type="submit" class="inline-block px-8 py-2 mb-0 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-blue-500 to-violet-500 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">GÜNCELLE</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Görsel Yönetimi Kartı -->
            <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                    <div class="flex items-center">
                        <p class="mb-0 dark:text-white/80 text-xl font-bold">Araç Görselleri</p>
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

                    <!-- Yeni Resim Yükleme Formu -->
                    <form method="POST" action="{{ route('admin.carimage.store', $car) }}" enctype="multipart/form-data" class="mb-6">
                        @csrf
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Yeni Görseller Yükle</p>
                        <div class="flex flex-wrap items-end">
                            <div class="w-full lg:w-8/12 px-3">
                                <div class="mb-4">
                                    <label for="images" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Görseller (Çoklu)</label>
                                    <input type="file" name="images[]" multiple required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            <div class="w-full lg:w-4/12 px-3">
                                <button type="submit" class="inline-block w-full px-8 py-2 mb-4 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-gradient-to-tl from-green-600 to-lime-400 hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-md bg-150 bg-x-25">YÜKLE</button>
                            </div>
                        </div>
                    </form>

                    <!-- Mevcut Görseller -->
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm mb-4">Mevcut Görseller</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($car->images as $image)
                        <div class="flex flex-col bg-white dark:bg-slate-850 rounded-lg shadow-sm overflow-hidden">
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('storage/' . $image->path) }}" class="w-full h-full object-cover" alt="Araç görseli">
                            </div>
                            <div class="p-3 flex flex-col gap-2">
                                @if($image->is_thumbnail)
                                <span class="px-2 py-1 text-xs font-bold rounded-md bg-green-100 text-green-800 text-center">Kapak Görseli</span>
                                @else
                                <form method="POST" action="{{ route('admin.carimage.setThumbnail', $image) }}">
                                    @csrf @method('PUT')
                                    <button class="w-full px-2 py-1 text-xs font-bold rounded-md bg-blue-100 text-blue-800 hover:bg-blue-200 transition-colors">Kapak Yap</button>
                                </form>
                                @endif

                                <form method="POST" action="{{ route('admin.carimage.destroy', $image) }}">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('Bu görseli silmek istediğinize emin misiniz?')" class="w-full px-2 py-1 text-xs font-bold rounded-md bg-red-100 text-red-800 hover:bg-red-200 transition-colors">Sil</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
