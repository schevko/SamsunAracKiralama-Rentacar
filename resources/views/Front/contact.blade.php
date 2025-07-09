@extends('layouts.front')
@section('title' ,'İletişim')
@section('content')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('Front/carbook-master/images/bg_3.jpg') }});" data-stellar-background-ratio="0.5">
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
      "name": "İletişim",
      "item": "{{ url()->current() }}"
    }
  ]
}
</script>
<script>
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
@endsection
