@extends('layouts.front')
@section('title' , 'Blog Detay')
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight lazy-bg"
         data-bg="{{ asset('storage/' . ($post->image_path ?? 'default.jpg')) }}"
         data-stellar-background-ratio="0.5">
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
    // Blog içeriğindeki tüm görselleri seçelim
    const contentImages = document.querySelectorAll('.col-md-8.ftco-animate img');

    // Her görsel için lazy loading özelliği ekleyelim
    contentImages.forEach(function(img) {
      const src = img.getAttribute('src');
      if(src) {
        img.setAttribute('data-src', src);
        img.setAttribute('src', 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==');
        img.classList.add('lazy');
      }
    });

    // Lazy loading observer'ını başlatalım
    if ("IntersectionObserver" in window) {
      const lazyImageObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
          if (entry.isIntersecting) {
            const lazyImage = entry.target;
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.classList.add("loaded");
            lazyImageObserver.unobserve(lazyImage);
          }
        });
      });

      document.querySelectorAll('img.lazy').forEach(function(lazyImage) {
        lazyImageObserver.observe(lazyImage);
      });
    } else {
      // IntersectionObserver olmayan tarayıcılar için fallback
      document.querySelectorAll('img.lazy').forEach(function(lazyImage) {
        lazyImage.src = lazyImage.dataset.src;
        lazyImage.classList.add("loaded");
      });
    }
  });
</script>
@endsection
