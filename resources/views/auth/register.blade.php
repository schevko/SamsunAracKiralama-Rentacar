<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Kayıt Ol</title>


    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/argon-dashboard-tailwind-1.0.1/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="{{ asset('admin/argon-dashboard-tailwind-1.0.1/build/assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <!-- Navbar -->
    <nav class="absolute top-0 z-30 flex flex-wrap items-center justify-between w-full px-4 py-2 mt-6 mb-4 shadow-none lg:flex-nowrap lg:justify-start">
      <div class="container flex items-center justify-between py-0 flex-wrap-inherit">
        <button navbar-trigger class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden" type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
            <span bar1 class="w-5.5 rounded-xs duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
            <span bar2 class="w-5.5 rounded-xs mt-1.75 duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
            <span bar3 class="w-5.5 rounded-xs mt-1.75 duration-350 relative my-0 mx-auto block h-px bg-white transition-all"></span>
          </span>
        </button>
      </div>
    </nav>

    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section class="min-h-screen">
        <div class="bg-top relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg')]">
          <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                <h1 class="mt-12 mb-2 text-white">Hoş Geldiniz</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                  <h5>Kayıt Ol</h5>
                </div>
                <div class="flex-auto p-6">
                               @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif

                  @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                      {{ session('success') }}
                    </div>
                  @endif
                  <form role="form text-left" method="POST" action="{{ route('admin.register.post') }}">
                    @csrf
                    <div class="mb-4">
                      <input type="text" name="name" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Ad Soyad" aria-label="Name" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4">
                      <input type="email"  name="email" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                    </div>
                    <div class="mb-4">
                      <input type="password" name="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Şifre" aria-label="Password" aria-describedby="password-addon" />
                    </div>
                      <div class="mb-4">
                      <input type="password" name="password_confirmation" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Şifreyi Tekrar Giriniz" aria-label="Password" aria-describedby="password-addon" />
                    </div>
                    <div class="mb-4 flex items-center">
                      <input id="is_admin" name="is_admin" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                      <label for="is_admin" class="ml-2 text-sm font-normal text-slate-700">Admin olarak kaydet</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-block w-full px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">Kayıt Ol</button>
                    </div>
                    <p class="mt-4 mb-0 leading-normal text-sm">Hesabınız Varmı? <a href="{{ route('admin.login') }}" class="font-bold text-slate-700">Giriş Yap</a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </body>
    <!-- plugin for scrollbar  -->
  <script src="{{ asset('admin/argon-dashboard-tailwind-1.0.1/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
  <!-- main script file  -->
  <script src="{{ asset('admin/argon-dashboard-tailwind-1.0.1/build/assets/js/argon-dashboard-tailwind.js') }}" async></script>
</html>
