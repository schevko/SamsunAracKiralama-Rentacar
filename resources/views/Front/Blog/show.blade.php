@extends('layouts.front')
@section('title' , 'Blog Detay')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('storage/' . ($post->image_path ?? 'default.jpg')) }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i></a></span>
          <span class="mr-2"><a href="{{ route('blog.index') }}">Bloglar <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Blog Detayı <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
        <h2 class="mb-3">{{ $post->title }}</h2>
        {!! $post->content !!}
      </div>
    </div>
  </div>
</section>

@endsection
