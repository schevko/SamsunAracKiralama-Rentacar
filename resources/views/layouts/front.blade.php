<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $meta_title ?? setting('site_title') }}</title>
     <meta name="description" content="{{ $meta_description ?? setting('site_description') }}">

     <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3gnF4QqKGS9QhRYe1AQqWbDNENZBvYq3xjBgObVVmZ38og7MGdkvEJkG6klPRImwDQFbK+N+aZ1U5kMY0nNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-qtKqbrhMRzDLPAT3O4c6ncdMkI5PhqWImBklDiAOMOVivzZp7W6V1RtK/4mB5lzj15hZyzsZKptYjPxkzGzZpg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Performans için preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}"/>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- Tema CSS'leri - Basit ve doğrudan yükleme -->

    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('Front/carbook-master/css/icomoon.css') }}">

    <!-- Kritik CSS - Mobil uyumluluk için güncellendi -->
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; }
        .hero-wrap { position: relative; }

        /* Mobil Uyumluluk */
        @media (max-width: 768px) {
            h1 { font-size: 2rem !important; }
            h2 { font-size: 1.5rem !important; }
            .container { padding-left: 15px; padding-right: 15px; }
            .navbar-brand { font-size: 18px !important; }
            .navbar-toggler { padding: 5px 10px; }
            .hero-wrap { height: 70vh !important; }
            .hero-wrap h1 { font-size: 24px !important; }
            .car-wrap .img { height: 200px !important; }
            .ftco-section { padding: 3em 0 !important; }
            .btn { padding: 10px 15px !important; }
        }

 @media (max-width: 768px) {
  .owl-carousel .owl-stage {
    display: flex !important;
    justify-content: center !important;
  }

  .owl-carousel .owl-item {
    display: flex !important;
    justify-content: center !important;
  }

  .car-wrap {
    width: 100% !important; /* %100 genişlik */
    max-width: 95vw; /* Ekranın %95'ine kadar */
    margin: 0 auto;
    padding: 1rem;
  }

  .car-wrap .text {
    text-align: center;
  }

  .car-wrap img {
    max-width: 100%;
    height: auto;
  }
}


        /* Lazy loading için stil */
        .lazy {
            opacity: 0;
            transition: opacity 0.3s;
        }
        .lazy.loaded {
            opacity: 1;
        }
           .carousel-car .owl-stage {
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <!-- jQuery temel kütüphanesi başta yüklenir -->
    <script src="{{ asset('Front/carbook-master/js/jquery.min.js') }}"></script>
        <!-- BURAYI KONTROL EDİN: Orijinal jQuery'den sonra kendi JS kodlarınız varsa geri ekleyin -->

    @include('front.partials.navbar')

    @yield('content')

    @include('front.partials.footer')

    <!-- Temel JavaScript kütüphaneleri -->
    <script src="{{ asset('Front/carbook-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('Front/carbook-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('Front/carbook-master/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('Front/carbook-master/js/jquery.waypoints.min.js') }}"></script>

    <!-- Eksik jQuery Stellar eklentisini CDN üzerinden yükleyin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stellar.js/0.6.2/jquery.stellar.min.js"></script>

    <!-- AnimateNumber kütüphanesini ekle (Eksikti) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>

    <!-- Diğer JavaScript kütüphaneleri -->
    <script src="{{ asset('Front/carbook-master/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('Front/carbook-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('Front/carbook-master/js/scrollax.min.js') }}"></script>
    <!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-tS3gnF4QqKGS9QhRYe1AQqWbDNENZBvYq3xjBgObVVmZ38og7MGdkvEJkG6klPRImwDQFbK+N+aZ1U5kMY0nNw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
        });
    </script>

<!-- Lazy Loading için JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Arkaplan görselleri için lazy loading
        var lazyBackgrounds = document.querySelectorAll(".lazy-bg");
        if ("IntersectionObserver" in window) {
            let lazyBackgroundObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        let lazyBackground = entry.target;
                        let bgUrl = lazyBackground.getAttribute("data-bg");
                        lazyBackground.style.backgroundImage = "url('" + bgUrl + "')";
                        lazyBackground.classList.add("loaded");
                        lazyBackgroundObserver.unobserve(lazyBackground);
                    }
                });
            });

            lazyBackgrounds.forEach(function(lazyBackground) {
                lazyBackgroundObserver.observe(lazyBackground);
            });
        } else {
            // Eski tarayıcılar için fallback
            setTimeout(function() {
                lazyBackgrounds.forEach(function(lazyBackground) {
                    let bgUrl = lazyBackground.getAttribute("data-bg");
                    lazyBackground.style.backgroundImage = "url('" + bgUrl + "')";
                    lazyBackground.classList.add("loaded");
                });
            }, 250);
        }
    });
</script>

    <!-- En son main.js'i yükle -->
    <script src="{{ asset('Front/carbook-master/js/main.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
