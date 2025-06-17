<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yönetim Paneli')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Rent A Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminSidebar"
                aria-controls="adminSidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-light collapse d-md-block" id="adminSidebar">
            <div class="list-group list-group-flush">
                    <a href="{{ route('admin.slider.index') }}" class="list-group-item list-group-item-action">Slider</a>
            </div>
        </div>



        <!-- Main Content -->
        <main class="col-md-9 col-lg-10 px-4 py-3">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

