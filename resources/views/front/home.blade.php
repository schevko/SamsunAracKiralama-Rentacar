{{-- filepath: c:\xampp\htdocs\Rent-a-car\resources\views\Front\home.blade.php --}}
@extends('layouts.front')
@section('title' , 'Anasayfa')
@section('content')

    {{-- Hero Alanı --}}
    <div class="hero-wrap ftco-degree-bg" style="background-image: url({{ asset('Front/carbook-master/images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Hızlı &amp; Kolay Araç Kiralama</h1>
                        <p style="font-size: 18px;">
                            {{ setting('site_description') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Öne Çıkan Araçlar Bölümü --}}
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Ne Sunuyoruz</span>
                    <h2 class="mb-2">Öne Çıkan Araçlar</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach($featuredcars as $car)
                            <div class="item w-100">
                                <div class="car-wrap rounded ftco-animate">
                        @if($car->images->isNotEmpty())
                                @php
                                    $thumbnail = $car->images->where('is_thumbnail', true)->first() ?? $car->images->first();
                                @endphp
                                <div class="img rounded d-flex align-items-end lazy-bg"
                                    data-bg="{{ $thumbnail->getUrl('medium') }}">
                                </div>
                            @else
                                <div class="img rounded d-flex align-items-end lazy-bg"
                                    data-bg="{{ asset('images/default-car.jpg') }}">
                                </div>
                            @endif
                                    <div class="text">
                                        <h2 class="mb-0">
                                            <a href="{{ route('car.show', $car->slug) }}">{{ $car->brand }} {{ $car->model }}</a>
                                        </h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ translateFuelType($car->fuel_type) }}</span>
                                            <p class="price ml-auto">₺{{ number_format($car->daily_price, 2, ',', '.') }} <span>/gün</span></p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="https://wa.me/{{ setting('whatsapp') }}?text={{ urlencode('Bu aracı kiralamak istiyorum: ' . route('car.show', $car->slug)) }}"
                                               class="btn btn-primary py-2 mr-1" target="_blank">Kirala</a>
                                            <a href="{{ route('car.show', $car->slug) }}" class="btn btn-secondary py-2 text-sm ml-1">Araç Detayı</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hakkımızda Bölümü --}}
    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center lazy-bg"
                     data-bg="{{ ($about && $about->image_path) ? Storage::url($about->image_path) : asset('images/default-about.jpg') }}">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        @if($about)
                            <span class="subheading">{{ $about->title }}</span>
                            <h2 class="mb-4">SAMSUN ARAÇ KİRALAMAYA HOŞGELDİNİZ</h2>
                            <p>{!! Str::limit(strip_tags($about->content), 300, '...') !!}</p>
                            <p><a href="{{ route('page.about') }}" class="btn btn-primary">Devamını Oku</a></p>
                        @else
                            <span class="subheading">Hakkımızda</span>
                            <h2 class="mb-4">SAMSUN ARAÇ KİRALAMAYA HOŞGELDİNİZ</h2>
                            <p>Hakkımızda içeriği bulunamadı. Lütfen yönetici panelinden ekleyiniz.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hizmetler Bölümü --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Hizmetler</span>
                    <h2 class="mb-3">Size Sunduğumuz Hizmetler</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Düğün Merasimleri</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Şehir İçi Transfer</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Havaalanı Transfer</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Tüm Şehir Turu</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Blog Bölümü --}}
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2>Son Bloglar</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                @foreach($posts as $post)
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="{{ route('blog.show', $post->slug) }}" class="block-20 lazy-bg"
                               data-bg="{{ $post->image_path ? Storage::url($post->image_path) : asset('images/default-blog.jpg') }}">
                            </a>
                            <div class="text pt-4">
                                <div class="meta mb-3">
                                    <div><a href="#">{{ $post->created_at->locale('tr')->isoFormat('DD MMMM YYYY') }}</a></div>
                                </div>
                                <h3 class="heading mt-2">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ Str::limit($post->title, 40) }}</a>
                                </h3>
                                <p>{{ Str::limit($post->summary, 60) }}</p>
                                <p><a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Devamını Oku</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
