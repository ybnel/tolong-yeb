{{-- resources/views/layouts/partials/admin-sidebar.blade.php --}}
<div class="layout-content-container flex flex-col w-80">
    <div class="flex h-full min-h-[700px] flex-col justify-between bg-[#111418] p-4 rounded-xl">
        <div class="flex flex-col gap-4">
            <h1 class="text-white text-base font-medium leading-normal">Cineplex Admin</h1>
            <div class="flex flex-col gap-2">
                
                {{-- DIBAIKI: Mengarah ke route 'admin.dashboard' --}}
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-[#283039] transition-colors
                          {{-- DIBAIKI: Memeriksa route 'admin.dashboard' --}}
                          {{ request()->routeIs('admin.dashboard') ? 'bg-[#283039]' : '' }}">
                    <div class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256"><path d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"></path></svg></div>
                    <p class="text-white text-sm font-medium leading-normal">Dashboard</p>
                </a>

                {{-- DIBAIKI: Mengarah ke route 'admin.films.index' dan memeriksa grup route 'admin.films.*' --}}
                <a href="{{ route('admin.films.index') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-[#283039] transition-colors
                          {{-- DIBAIKI: Memeriksa semua route film (index, create, edit) --}}
                          {{ request()->routeIs('admin.films.*') ? 'bg-[#283039]' : '' }}">
                    <div class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256"><path d="M224,216H183.36A103.95,103.95,0,1,0,128,232h96a8,8,0,0,0,0-16ZM80,148a20,20,0,1,1,20-20A20,20,0,0,1,80,148Zm48,48a20,20,0,1,1,20-20A20,20,0,0,1,128,196Zm0-96a20,20,0,1,1,20-20A20,20,0,0,1,128,100Zm28,28a20,20,0,1,1,20,20A20,20,0,0,1,156,128Z"></path></svg></div>
                    <p class="text-white text-sm font-medium leading-normal">Movies</p>
                </a>

                {{-- DIBAIKI: Mengarah ke route 'admin.studios.index' --}}
                <a href="{{ route('admin.studios.index') }}" 
                   class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-[#283039] transition-colors
                          {{ request()->routeIs('admin.studios.*') ? 'bg-[#283039]' : '' }}">
                   <div class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V72H40V56ZM40,192V88H216V192Z"></path></svg></div>
                   <p class="text-white text-sm font-medium leading-normal">Studios</p>
                </a>
                
                {{-- DIBAIKI: Mengarah ke route 'admin.schedules.index' --}}
                <a href="{{ route('admin.schedules.index') }}"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-[#283039] transition-colors
                           {{ request()->routeIs('admin.schedules.*') ? 'bg-[#283039]' : '' }}">
                    <div class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path></svg></div>
                    <p class="text-white text-sm font-medium leading-normal">Showtimes</p>
                </a>
                
            </div>
        </div>
        <div class="flex flex-col gap-1">
            {{-- Tombol Logout --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-[#283039] w-full text-left">
                    <div class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256"><path d="M112,216a8,8,0,0,1-8,8H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32h56a8,8,0,0,1,0,16H48V208h56A8,8,0,0,1,112,216Zm109.66-92.66-48-48a8,8,0,0,0-11.32,11.32L196.69,120H104a8,8,0,0,0,0,16h92.69l-34.35,34.34a8,8,0,0,0,11.32,11.32l48-48A8,8,0,0,0,221.66,123.34Z"></path></svg></div>
                    <p class="text-white text-sm font-medium leading-normal">Log Out</p>
                </a>
            </form>
        </div>
    </div>
</div>
