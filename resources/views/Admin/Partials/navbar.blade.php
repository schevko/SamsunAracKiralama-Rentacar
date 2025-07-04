{{-- filepath: c:\xampp\htdocs\Rent-a-car\resources\views\Admin\partials\navbar.blade.php --}}
<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">

        {{-- SOL TARAF: Mobil menü butonu --}}
        <div class="flex items-center">
            <div class="flex items-center xl:hidden">
                <a href="javascript:;" class="block p-0 text-sm text-slate-500 dark:text-white transition-all ease-nav-brand" sidenav-trigger>
                    <div class="w-4.5 overflow-hidden">
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 dark:bg-white transition-all"></i>
                        <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 dark:bg-white transition-all"></i>
                        <i class="ease relative block h-0.5 rounded-sm bg-slate-500 dark:bg-white transition-all"></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- SAĞ TARAF: Hoşgeldiniz ve Çıkış butonları --}}
        <div class="flex items-center">
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none">
                <!-- Hoşgeldiniz Mesajı -->
                <li class="flex items-center mr-4">
                    <span class="inline-block font-semibold text-sm text-slate-700 dark:text-white">Hoşgeldiniz, {{ auth()->user()->name }}</span>
                </li>

                <!-- Çıkış Butonu  -->
                <li class="flex items-center">
                    <a href="{{ route('admin.logout') }}" class="inline-block px-4 py-1.5 mb-0 text-xs font-bold leading-normal text-white align-middle transition-all ease-in bg-gradient-to-tl from-red-600 to-rose-400 border-0 rounded-lg shadow-md hover:shadow-lg hover:-translate-y-px active:opacity-85">
                        <i class="fas fa-sign-out-alt mr-1"></i> Çıkış
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
