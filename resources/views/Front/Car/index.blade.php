@extends('layouts.front')
@section('title', 'Rent a Car')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight lazy-bg"
    data-bg="{{ asset('Front/carbook-master/images/bg_3.jpg') }}"
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
