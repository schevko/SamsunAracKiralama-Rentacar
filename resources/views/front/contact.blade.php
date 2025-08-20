@extends('layouts.front')
@section('title' ,'İletişim')
@section('content')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('front/carbook-master/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	 <a href="{{ route('home') }}">Anasayfa <i class="ion-ios-arrow-forward"></i>></a></span> <span>İletişim<i class="ion-ios-arrow-forward"></i></span>            <h1 class="mb-3 bread">İletişim</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
        	<div class="col-md-4">
        		<div class="row mb-5">
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-map-o"></span>
			          	</div>
			            <p><span>Adres:</span>{{ setting('contact_address') }}</p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-mobile-phone"></span>
			          	</div>
			            <p><span>Telefon Numarası:</span> <a href="tel://1234567920">{{ setting('whatsapp') }}</a></p>
			          </div>
		          </div>
		          <div class="col-md-12">
		          	<div class="border w-100 p-4 rounded mb-2 d-flex">
			          	<div class="icon mr-3">
			          		<span class="icon-envelope-o"></span>
			          	</div>
			            <p><span>Email:</span> <a href="mailto:info@yoursite.com">{{ setting('contact_email') }}</a></p>
			          </div>
		          </div>
		        </div>
          </div>

          <div class="col-md-8 block-9 mb-md-5">
            <div id="form-messages"></div>
            <form action="{{ route('contact.store') }}" method="POST" id="contactForm" class="bg-light p-5 contact-form">
                @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Ad Soyad">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email"   placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Konu">
              </div>
              <div class="form-group">
                <textarea name="message" id="" cols="30" rows="7" class="form-control"  placeholder="Mesajınız"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Mesaj Gönder" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div id="map" style="width: 100%; height: 400px; border-radius: 12px; overflow: hidden;"></div>
            </div>
        </div>
      </div>
    </section>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
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
      "name": "İletişim",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>

<script>
// Leaflet Harita Başlatma
document.addEventListener('DOMContentLoaded', function() {
    // Şirket konumu koordinatları (örnek: Ankara)
    var lat = 41.231933;
    var lng = 36.832587;

    // Harita oluştur
    var map = L.map('map').setView([lat, lng], 15);

    // OpenStreetMap tile layer ekle
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 19
    }).addTo(map);

    // Özel marker ikonu
    var customIcon = L.divIcon({
        className: 'custom-marker',
        html: '<div style="background-color: #007bff; width: 30px; height: 30px; border-radius: 50%; border: 3px solid white; box-shadow: 0 2px 5px rgba(0,0,0,0.3); display: flex; align-items: center; justify-content: center;"><i class="fa fa-car" style="color: white; font-size: 14px;"></i></div>',
        iconSize: [36, 36],
        iconAnchor: [18, 18]
    });

    // Marker ekle
    var marker = L.marker([lat, lng], {icon: customIcon}).addTo(map);

    // Popup içeriği
    var popupContent = `
        <div style="text-align: center; padding: 10px;">
            <h6 style="margin-bottom: 8px; color: #007bff;">{{ setting('site_title') ?? 'Rent A Car' }}</h6>
            <p style="margin: 5px 0; font-size: 13px;"><strong>📍 Adres:</strong><br>{{ setting('contact_address') }}</p>
            <p style="margin: 5px 0; font-size: 13px;"><strong>📞 Telefon:</strong><br><a href="tel:{{ setting('whatsapp') }}">{{ setting('whatsapp') }}</a></p>
            <p style="margin: 5px 0; font-size: 13px;"><strong>✉️ Email:</strong><br><a href="mailto:{{ setting('contact_email') }}">{{ setting('contact_email') }}</a></p>
            <div style="margin-top: 10px;">
                <a href="https://www.google.com/maps/dir//` + lat + `,` + lng + `" target="_blank"
                   style="background: #007bff; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 12px;">
                   🧭 Yol Tarifi Al
                </a>
            </div>
        </div>
    `;

    // Marker'a popup ekle
    marker.bindPopup(popupContent, {
        maxWidth: 250,
        className: 'custom-popup'
    });

    // Harita yüklendiğinde popup'ı aç
    marker.openPopup();

    // Harita kontrollerini özelleştir
    map.zoomControl.setPosition('topright');
});

// Form işlemleri
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var data = form.serialize();
        var messageDiv = $('#form-messages');
        var submitButton = form.find('input[type="submit"]');
        var originalButtonText = submitButton.val();
        submitButton.prop('disabled', true).val('Gönderiliyor...');
        $.ajax({
            type: method,
            url: url,
            data: data,
            dataType: 'json',
            success: function(response) {
                messageDiv.html('<div class="alert alert-success">' + response.success + '</div>');
                form.trigger("reset");
            },
            error: function(xhr) {
                messageDiv.html('');
                var errors = xhr.responseJSON.errors;
                var errorHtml = '<div class="alert alert-danger"><ul>';
                $.each(errors, function(key, value) {
                    errorHtml += '<li>' + value[0] + '</li>';
                });
                errorHtml += '</ul></div>';
                messageDiv.html(errorHtml);
            },
            complete: function() {
                submitButton.prop('disabled', false).val(originalButtonText);
            }
        });
    });
});
</script>

<style>
/* Özel popup stilleri */
.leaflet-popup-content-wrapper {
    border-radius: 8px;
    box-shadow: 0 3px 14px rgba(0,0,0,0.4);
}

.leaflet-popup-content {
    margin: 8px 12px;
}

.custom-marker {
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
}

/* Harita loading animasyonu */
#map {
    background: linear-gradient(45deg, #f0f0f0 25%, transparent 25%),
                linear-gradient(-45deg, #f0f0f0 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, #f0f0f0 75%),
                linear-gradient(-45deg, transparent 75%, #f0f0f0 75%);
    background-size: 20px 20px;
    background-position: 0 0, 0 10px, 10px -10px, -10px 0px;
}
</style>
@endsection
