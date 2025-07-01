<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
            <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="{{ route('admin.dashboard') }}">
            <div class="inline-flex items-center justify-center bg-gradient-to-tl from-blue-500 to-violet-500 p-2 rounded-lg shadow-md">
                <i class="fas fa-user-shield text-white text-lg"></i>
            </div>
            <span class="ml-2 font-semibold transition-all duration-200 ease-nav-brand">Admin Panel</span>
            </a>
      </div>
      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
      <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <!-- Anasayfa -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.dashboard') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-slate-700 transition-colors' }}" href="{{ route('admin.dashboard') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 fas fa-home"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Anasayfa</span>
            </a>
          </li>

          <!-- Araç Yönetimi -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.car.*') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}" href="{{ route('admin.car.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 fas fa-car"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Araç Yönetimi</span>
            </a>
          </li>

          <!-- Gelen Kutusu -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.contactmessage.*') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}" href="{{ route('admin.contactmessage.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 fas fa-envelope"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gelen Kutusu</span>
            </a>
          </li>

          <!-- Sayfa Yönetimi -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.page.*') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}" href="{{ route('admin.page.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-emerald-500 fas fa-file-alt"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Sayfa Yönetimi</span>
            </a>
          </li>

          <!-- Blog Yönetimi -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.post.*') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}" href="{{ route('admin.post.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-purple-500 fas fa-blog"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Blog yönetimi</span>
            </a>
          </li>

          <!-- Ayarlar -->
          <li class="mt-0.5 w-full">
            <a class="{{ request()->routeIs('admin.setting.*') ? 'py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors' : 'py-2.7 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors' }}" href="{{ route('admin.setting.edit') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-slate-500 fas fa-cog"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Ayarlar</span>
            </a>
          </li>

        </ul>
      </div>
    </aside>
