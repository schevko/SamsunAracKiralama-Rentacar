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
                    <span class="inline-block font-semibold text-sm text-white">Hoşgeldiniz, {{ auth()->user()->name }}</span>
                </li>

                <!-- Çıkış Butonu  -->
                <li class="flex items-center">
                    <a href="{{ route('admin.logout') }}" class="inline-flex items-center gap-2 px-6 py-2 text-sm font-bold text-white uppercase bg-red-600 rounded-lg shadow-md hover:bg-red-700 hover:scale-105 transition-all duration-200 border-0 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1" />
                        </svg>
                        <span class="tracking-wide">Çıkış</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
