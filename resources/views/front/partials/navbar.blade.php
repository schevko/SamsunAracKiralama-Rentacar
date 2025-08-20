<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
      @if(setting('logo'))
       <img src="{{ url('storage/' . setting('logo')) }}" alt="#" style="height: 90px; margin-right: 10px;">
      @endif
      {{ setting('site_title') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>

    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('home') }}"
             class="nav-link {{ request()->routeIs('home') ? 'text-success fw-bold' : '' }}">
            Anasayfa
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('page.about') }}"
             class="nav-link {{ request()->routeIs('page.about') ? 'text-success fw-bold' : '' }}">
            Hakkımızda
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('car.index') }}"
             class="nav-link {{ request()->routeIs('car.index') ? 'text-success fw-bold' : '' }}">
            Araçlar
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('blog.index') }}"
             class="nav-link {{ request()->routeIs('blog.index') ? 'text-success fw-bold' : '' }}">
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('contact.index') }}"
             class="nav-link {{ request()->routeIs('contact.index') ? 'text-success fw-bold' : '' }}">
            İletişim
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
