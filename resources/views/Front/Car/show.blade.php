{{-- filepath: c:\xampp\htdocs\Rent-a-car\resources\views\Front\Car\show.blade.php --}}
@extends('layouts.front')
@section('title', $car->brand . ' ' . $car->model)
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight lazy-bg"
             data-bg="{{ asset('Front/carbook-master/images/bg_3.jpg') }}"
             data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs">
                        <a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span> <span>Araçlar<i class="ion-ios-arrow-forward"></i></span>
                    </p>
                    <h1 class="mb-3 bread">{{ $car->brand }} {{ $car->model }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        {{-- SLIDER BAŞLANGICI --}}
                        @if($car->images->isNotEmpty())
                            {{-- DEĞİŞİKLİK: Slider ayarları doğrudan HTML'e eklendi ve özel script kaldırıldı --}}
                            <div class="carousel-car owl-carousel"
                                 data-loop="{{ $car->images->count() > 1 ? 'true' : 'false' }}"
                                 data-items="1"
                                 data-margin="0"
                                 data-stage-padding="0"
                                 data-nav="true"
                                 data-dots="true"
                                 data-autoplay="false">
                                @foreach($car->images as $image)
                                    <div class="item">
                                        <img src="{{ Storage::url($image->path) }}" class="img-fluid rounded" alt="{{ $car->brand }} {{ $car->model }} araç resmi">
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <img src="{{ asset('images/default-car.jpg') }}" class="img-fluid rounded" alt="Varsayılan araç resmi">
                        @endif
                        {{-- SLIDER SONU --}}
                        <div class="text text-center">
                            <span class="subheading">{{ $car->brand }}</span>
                            <h2>{{ $car->brand }} {{ $car->model }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Vites Türü
                                        <span>{{ translateTransmissionType($car->transmission_type) }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Koltuk Sayısı
                                        <span>{{ $car->seat_count }} Koltuk</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Bagaj Kapasitesi
                                        <span>{{ $car->luggage_capacity }} LİTRE</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Yakıt Türü
                                        <span>{{ translateFuelType($car->fuel_type) }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-selected="true">Açıklama</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <p>{{ $car->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Car",
      "name": "{{ $car->brand }} {{ $car->model }} {{ $car->year }}",
      "image": "{{ $car->images->isNotEmpty() ? Storage::url($car->images->first()->path) : asset('images/default-car.jpg') }}",
      "description": "{{ preg_replace('/[\r\n]+/', ' ', strip_tags($car->description)) }}",
      "brand": {
        "@type": "Brand",
        "name": "{{ $car->brand }}"
      },
      "model": "{{ $car->model }}",
      "vehicleModelDate": "{{ $car->year }}",
      "vehicleEngine": {
        "@type": "EngineSpecification",
        "fuelType": "{{ $car->fuel_type }}"
      },
      "offers": {
        "@type": "Offer",
        "priceCurrency": "TRY",
        "price": "{{ $car->daily_price }}",
        "availability": "https://schema.org/InStock",
        "priceValidUntil": "{{ now()->addMonths(6)->format('Y-m-d') }}",
        "url": "{{ url()->current() }}"
      }
    }
    </script>
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
          "item": "{{ route('car.index') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ $car->brand }} {{ $car->model }}",
          "item": "{{ url()->current() }}"
        }
      ]
    }
    </script>

    {{-- Özel script bloğu tamamen kaldırıldı --}}

@endsection
