<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $meta_title ?? setting('site_title') }}</title>
    <meta name="description" content="{{ $meta_description ?? setting('site_description') }}">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Performans için preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}"/>

    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/ui-lightness/jquery-ui.css">

    <!-- jQuery Timepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.css">

    <!-- Owl Carousel CSS (integrity kaldırıldı) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Tema CSS'leri -->
    <link rel="stylesheet" href="{{ asset('front/carbook-master/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/carbook-master/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/carbook-master/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/carbook-master/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/carbook-master/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom-car-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/car-card-style.css') }}">    <!-- Kritik CSS - Mobil uyumluluk için güncellendi -->
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
    @include('front.partials.navbar')

    @yield('content')

    @include('front.partials.footer')

    <!-- JavaScript - DOĞRU SIRALAMA -->

    <!-- 1. jQuery (tek sefer - CDN daha güncel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- 2. jQuery UI (datepicker için) -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <!-- 2.1 jQuery Timepicker (timepicker için) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.18/jquery.timepicker.min.js"></script>

    <!-- 3. jQuery eklentileri -->
    <script src="{{ asset('front/carbook-master/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('front/carbook-master/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/carbook-master/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front/carbook-master/js/jquery.waypoints.min.js') }}"></script>

    <!-- 4. CDN eklentiler -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/stellar.js/0.6.2/jquery.stellar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js"></script>

    <!-- 5. Owl Carousel JS (integrity kaldırıldı) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- 6. Local JS dosyaları -->
    <script src="{{ asset('front/carbook-master/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/carbook-master/js/scrollax.min.js') }}"></script>

    <!-- 7. AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
        });
    </script>

    <!-- 8. Lazy Loading Script -->
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

    <!-- 9. En son main.js -->
    <script src="{{ asset('front/carbook-master/js/main.js') }}"></script>

</body>
</html>
