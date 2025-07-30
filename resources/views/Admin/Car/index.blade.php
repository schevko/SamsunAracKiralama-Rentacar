@extends('layouts.admin')
@section('title', 'Araçlar')
@section('content')
<div class="w-full p-6 mx-auto">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 shrink-0">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex items-center justify-between">
                  <h6 class="dark:text-white">Araç listesi</h6>
                  <a href="{{ route('admin.car.create') }}" class="inline-block px-6 py-2.5 font-bold text-center text-slate-700 uppercase align-middle transition-all border border-gray-200 rounded-lg cursor-pointer ease-in leading-pro text-xs bg-white hover:shadow-xs hover:-translate-y-px active:opacity-85 tracking-tight-rem shadow-sm">
                      <i class="fas fa-plus mr-1"></i> Yeni Araç
                  </a>
                </div>
              </div>
              <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                  <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                    <thead class="align-bottom">
                      <tr>
                        <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Marka</th>
                        <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Model</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Durum</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Yıl</th>
                        <th class="px-6 py-3 font-semibold text-center capitalize align-middle bg-transparent border-b border-collapse border-solid shadow-none dark:border-white/40 dark:text-white tracking-none whitespace-nowrap text-slate-400 opacity-70">İşlemler</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                      <tr>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <div class="flex px-2 py-1">
                            <div class="flex flex-col justify-center">
                              <h6 class="mb-0 text-sm leading-normal dark:text-white">{{ $car->brand }}</h6>
                            </div>
                          </div>
                        </td>
                        <td class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">{{ $car->model }}</p>
                        </td>
                        <td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">{{ $car->is_active ? 'Aktif' : 'Pasif' }}</span>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <span class="text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-slate-400">{{ $car->year }}</span>
                        </td>

                        <td class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                          <div class="flex items-center justify-center gap-2">
                              <a href="{{ route('admin.car.edit', $car->slug) }}" class="block bg-amber-100 text-amber-900 px-3 py-2 rounded font-bold hover:bg-amber-200 transition-all text-sm">
                              Düzenle
                              </a>
                              <form action="{{ route('admin.car.destroy', $car->slug) }}" method="POST" class="inline-block">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="bg-red-100 text-red-900 px-3 py-2 rounded font-bold hover:bg-red-200 transition-all text-sm" onclick="return confirm('Bu aracı silmek istediğinize emin misiniz?')">
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
</div>
@endsection
