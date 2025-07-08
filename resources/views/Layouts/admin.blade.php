{{-- filepath: c:\xampp\htdocs\Rent-a-car\resources\views\Layouts\admin.blade.php --}}
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Nucleo Icons -->
    <link href="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    {{-- DÜZELTME: perfect-scrollbar.css manuel olarak eklendi --}}
    <link href="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/css/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- Main Styling -->
    <link href="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />

    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
</head>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    @include('Admin.partials.sidebar')

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        @include('Admin.partials.navbar')
        <div class="w-full px-6 py-6 mx-auto">
            @yield('content')
        </div>
    </main>

    {{-- DÜZELTME: Tüm gerekli JS dosyaları manuel olarak ve doğru sırada eklendi --}}
    <!-- ChartJS -->
    <script src="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/js/plugins/Chart.min.js') }}"></script>
    <!-- Perfect Scrollbar -->
    <script src="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <!-- Sidenav Burger -->
    <script src="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/js/sidenav-burger.js') }}"></script>
    <!-- Navbar Sticky -->
    <script src="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/js/navbar-sticky.js') }}"></script>

    <!-- Ana Tema Scripti (En Sona Eklendi) -->
    <script src="{{ asset('Admin/argon-dashboard-tailwind-1.0.1/build/assets/js/argon-dashboard-tailwind.js') }}"></script>
</body>
</html>
