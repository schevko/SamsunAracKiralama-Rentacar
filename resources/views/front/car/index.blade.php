@extends('layouts.front')
@section('title', 'Rent a Car')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight lazy-bg"
    data-bg="{{ asset('front/carbook-master/images/bg_3.jpg') }}"
    data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 pb-5">
        <p class="breadcrumbs">
          <a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span> <span>Araçlar <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">Aracınızı Seçin</h1>
      </div>
    </div>
  </div>
</section>
<section class="ftco-section bg-light">
  <div class="container mb-4">
    <form method="GET" action="{{ route('car.index') }}" class="row g-3 align-items-center justify-content-center bg-white p-4 rounded-3 shadow-lg flex-wrap gap-3">
      <div class="col-12 col-md-3 d-flex flex-column align-items-center">
        <span class="mb-2" style="font-size:2rem;color:#0d6efd;"><i class="fas fa-lira-sign"></i></span>
        <label for="min_price" class="mb-1 fw-bold text-dark" style="font-size:0.95rem;">Min Fiyat (₺)</label>
        <input type="number" class="form-control border-0 border-bottom rounded-0 text-center shadow-none fw-bold text-dark" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="En az" style="background:transparent; font-size:0.95rem;">
      </div>
      <div class="col-12 col-md-3 d-flex flex-column align-items-center">
        <span class="mb-2" style="font-size:2rem;color:#0d6efd;"><i class="fas fa-lira-sign"></i></span>
        <label for="max_price" class="mb-1 fw-bold text-dark" style="font-size:0.95rem;">Max Fiyat (₺)</label>
        <input type="number" class="form-control border-0 border-bottom rounded-0 text-center shadow-none fw-bold text-dark" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="En çok" style="background:transparent; font-size:0.95rem;">
      </div>
      <div class="col-12 col-md-3 d-flex flex-column align-items-center">
        <span class="mb-2" style="font-size:2rem;color:#198754;"><i class="fas fa-cogs"></i></span>
        <label for="transmission_type" class="mb-1 fw-bold text-dark" style="font-size:0.95rem;">Vites Tipi</label>
        <select class="form-select text-center fw-bold text-dark px-3 py-2 rounded-pill border-0 shadow-sm custom-select-modern" name="transmission_type" id="transmission_type" style="background:#f8f9fa; min-width:140px; transition:box-shadow .2s; box-shadow:0 2px 8px rgba(0,0,0,0.07); font-size:0.95rem;">
          <option value="" style="font-size:0.95rem;">Hepsi</option>
          <option value="manual" style="font-size:0.95rem;" {{ request('transmission_type') == 'manual' ? 'selected' : '' }}>Manuel</option>
          <option value="automatic" style="font-size:0.95rem;" {{ request('transmission_type') == 'automatic' ? 'selected' : '' }}>Otomatik</option>
        </select>
        <style>
        .custom-select-modern option {
          padding: 12px 18px;
          font-size: 0.95rem !important;
          background: #f8f9fa;
          color: #212529;
        }
        .custom-select-modern option:checked, .custom-select-modern option:focus, .custom-select-modern option:hover {
          background: #0d6efd;
          color: #fff;
        }
        </style>
      </div>
      <div class="col-12 col-md-2 d-flex align-items-center justify-content-center mt-3 mt-md-0">
        <button type="submit" class="btn btn-primary w-100 py-2 px-4 fw-bold shadow-sm" style="transition:background .2s; font-size:0.95rem;"> <i class="fas fa-filter me-2"></i>Filtrele</button>
      </div>
    </form>
  </div>
  <div class="container">
    <div class="row">
@forelse($cars as $car)
  <div class="col-md-4 mb-4">
    <div class="car-wrap rounded">
      @php
        $thumbnail = $car->images->where('is_thumbnail', true)->first() ?? $car->images->first();
      @endphp
      <div class="img rounded d-flex align-items-end lazy-bg"
           data-bg="{{ $thumbnail ? asset('storage/' . $thumbnail->path) : asset('images/default-car.jpg') }}"
           style="background-color: #f1f1f1; height: 200px;">
      </div>
      <div class="text">
        <h2 class="mb-0">
          <a href="{{ route('car.show', $car) }}">{{ $car->brand }} {{ $car->model }}</a>
        </h2>
        <div class="d-flex mb-3">
          <span class="cat">{{ translateFuelType($car->fuel_type) }}</span>
          <p class="price ml-auto">₺{{ number_format($car->daily_price, 2, ',', '.') }} <span>/gün</span></p>
        </div>
        <p class="d-flex mb-0 d-block">
          <a href="https://wa.me/{{ setting('whatsapp') }}?text={{ urlencode('Aracı kiralamak istiyorum: ' . route('car.show', $car)) }}"
            class="btn btn-primary py-2 mr-1">Rezervasyon</a>
          <a href="{{ route('car.show', $car) }}" class="btn btn-secondary py-2 ml-1">Detay</a>
        </p>
      </div>
    </div>
  </div>
@empty
  <div class="col-12 text-center">
    <p>Hiç araç bulunamadı.</p>
  </div>
@endforelse
    </div>
    <div class="row mt-5">
      <div class="col text-center">
        {{ $cars->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</section>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Anasayfa",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Araçlar",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
@endsection
