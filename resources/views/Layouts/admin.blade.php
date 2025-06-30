<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yönetim Paneli')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { overflow-x: hidden; }
        .sidebar .list-group-item.active {
            background-color: #0d6efd;
            color: #fff;
            font-weight: bold;
        }
    </style>
    @yield('css')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('admin.slider.index') }}">Rent A Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topnav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="topnav">
            <ul class="navbar-nav">
                <li class="nav-item text-white me-3 d-flex align-items-center">
                    Hoş Geldiniz - {{ auth()->user()->name }}
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link text-danger">Çıkış Yap</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-light vh-100 py-3 sidebar">
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.slider.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.slider.*') ? 'active' : '' }}">Slider Yönetimi</a>
                <a href="{{ route('admin.car.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.car.*') ? 'active' : '' }}">Araç Yönetimi</a>
                <a href="{{ route('admin.page.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.page.*') ? 'active' : '' }}">Sayfa Yönetimi</a>
                <a href="{{ route('admin.post.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.post.*') ? 'active' : '' }}">Blog Yönetimi</a>
                <a href="{{ route('admin.contactmessage.index') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.contactmessage.*') ? 'active' : '' }}">Gelen Kutusu</a>
                <a href="{{ route('admin.setting.edit') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">Ayarlar Yönetimi</a>
            </div>
        </div>

        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 py-4 px-4">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
@yield('js')
</body>
</html>
