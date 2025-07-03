
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"><a href="#" class="logo">{{ setting('site_title') }}</a></h2>
              <p>Hoşgeldiniz</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Bilgi</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('page.about') }}" class="py-2 d-block">Hakkımızda</a></li>
                <li><a href="{{ route('page.cookiepolicy') }}" class="py-2 d-block">Çerez Politikaları</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Müşteri Destek</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('contact.index') }}" class="py-2 d-block">İletişim</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">İletişim Bilgilerimiz</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">{{ setting('contact_address') }}</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{{ setting('whatsapp') }}</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{{ setting('contact_email') }}</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
   &copy;<script>document.write(new Date().getFullYear());</script> {{ setting('footer_text') }}<i aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"></a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
