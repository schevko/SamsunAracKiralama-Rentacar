
@extends('layouts.admin')
@section('title' ,'Anasayfa')
@section('content')
<div class="flex flex-col items-center justify-center min-h-[60vh]">
    <div class="flex flex-col w-full max-w-xl gap-8">
        <div class="bg-white rounded-xl shadow-md flex items-center gap-4 px-6 py-6 mb-4 hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-100">
                <!-- Kullanıcı Yönetimi ikonu (sidebar'daki gibi) -->
                <i class="fas fa-users text-blue-600 text-2xl"></i>
            </div>
            <div>
                <div class="text-lg font-bold text-blue-600">{{ $userCount }}</div>
                <div class="text-sm text-gray-700 font-medium">Toplam Kullanıcı</div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-md flex items-center gap-4 px-6 py-6 hover:shadow-lg transition-all duration-200">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-cyan-100">
                <!-- Araç Yönetimi ikonu (sidebar'daki gibi) -->
                <i class="fas fa-car text-cyan-500 text-2xl"></i>
            </div>
            <div>
                <div class="text-lg font-bold text-green-600">{{ $carCount }}</div>
                <div class="text-sm text-gray-700 font-medium">Toplam Araç</div>
            </div>
        </div>
    </div>
</div>
@endsection
