<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Paneli')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap 5 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">

            {{-- Sidebar --}}
            <nav class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark text-white min-vh-100">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-3">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Admin Panel</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
                        {{-- Menü öğeleri buraya eklenecek --}}
                    </ul>
                </div>
            </nav>

            {{-- Main Content --}}
            <main class="col py-3">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Bootstrap 5 JS + Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
