
@extends('layouts.front')
@section('title' , $post->title)
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('front/carbook-master/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span>
          <span class="mr-2"><a href="{{ route('blog.index') }}">Bloglar <i class="ion-ios-arrow-forward"></i>></a></span>
          <span>Blog Detayı <i class="ion-ios-arrow-forward"></i></span>
        </p>
        <h1 class="mb-3 bread">{{ $post->title }}</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-8 ftco-animate">
        @if($post->image_path)
            <p>
                <img src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}" class="img-fluid rounded mb-4">
            </p>
        @endif
        {!! $post->content !!}
      </div>
      <div class="col-md-4 sidebar ftco-animate">
      </div>
    </div>
  </div>
</section>

<!-- Schema.org yapısal veri işaretlemesi -->
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
      "name": "Blog",
      "item": "{{ route('blog.index') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ $post->title }}",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>

<!-- Blog içeriğindeki görseller için lazy loading -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const contentImages = document.querySelectorAll('.col-md-8.ftco-animate img');
    contentImages.forEach(function(img) {
      if (img.getAttribute('src')) {
        img.setAttribute('loading', 'lazy');
      }
    });
  });
</script>
@endsection
