@extends('layouts.front')
@section('title', 'Blog')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('front/carbook-master/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
              <a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span> <span>Bloglar <i class="ion-ios-arrow-forward"></i></span>
            <h1 class="mb-3 bread"> Bloglar</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
      <div class="container">
        @foreach ($posts as $post )
        <div class="row d-flex justify-content-center">
          <div class="col-md-12 text-center d-flex ftco-animate">
              <div class="blog-entry justify-content-end mb-md-5">
              <a href="{{ route('blog.show' , $post->slug) }}" class="block-20 img lazy-bg"
                 data-bg="{{ asset('storage/' . ($post->image_path ?? 'default.jpg')) }}"
                 style="background-color: #f1f1f1; background-size: cover; background-position: center; background-repeat: no-repeat;">
              </a>
              <div class="text px-md-5 pt-4">
                  <div class="meta mb-3">
                  <div><a href="#"> Yayın Tarihi: {{ $post->created_at->format('d.m.y') }}</a></div>
                </div>
                <h3 class="heading mt-2"><a href="#">{{ $post->title }}</a></h3>
                <p>{{ $post->summary }}</p>
                <p><a href="{{ route('blog.show' , $post->slug) }}" class="btn btn-primary">Devam Et <span class="icon-long-arrow-right"></span></a></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
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
          "name": "Blog",
          "item": "{{ url()->current() }}"
        }
      ]
    }
    </script>

<script>
// Lazy loading için resim yükleme
document.addEventListener('DOMContentLoaded', function() {
    const lazyBgElements = document.querySelectorAll('.lazy-bg');

    const lazyBgObserver = new IntersectionObserver(function(entries, observer) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                const bgUrl = entry.target.getAttribute('data-bg');
                if (bgUrl) {
                    entry.target.style.backgroundImage = `url(${bgUrl})`;
                    entry.target.classList.remove('lazy-bg');
                    observer.unobserve(entry.target);
                }
            }
        });
    });

    lazyBgElements.forEach(function(element) {
        lazyBgObserver.observe(element);
    });
});
</script>
@endsection
