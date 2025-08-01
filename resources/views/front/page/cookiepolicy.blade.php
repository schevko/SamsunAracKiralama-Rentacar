@extends('layouts.front')
@section('title', $page->title)
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('front/carbook-master/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 pb-5">
        <p class="breadcrumbs">
          <a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span> <span> Çerez Politikaları <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">{{ $page->title }}</h1>
      </div>
    </div>
  </div>
</section>
<section class="container py-5">
  {!! $page->content !!}
</section>
@endsection
