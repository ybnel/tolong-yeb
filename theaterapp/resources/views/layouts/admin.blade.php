<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cineplex Admin') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," /> {{-- Anda mungkin ingin mengganti ini dengan ikon nyata --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <style type="text/tailwindcss">
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styles for responsive table columns based on container queries */
        @container(max-width:120px){.table-column-120{display: none;}}
        @container(max-width:240px){.table-column-240{display: none;}}
        @container(max-width:360px){.table-column-360{display: none;}}
        @container(max-width:480px){.table-column-480{display: none;}}
        @container(max-width:600px){.table-column-600{display: none;}}
    </style>
</head>
<body class="bg-[#111418]">
    <div class="relative flex size-full min-h-screen flex-col bg-[#111418] dark group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
        <div class="layout-container flex h-full grow flex-col">
            <div class="gap-1 px-6 flex flex-1 justify-center py-5">
                {{-- Admin Navigation Sidebar --}}
                <div class="layout-content-container flex flex-col w-80">
                    <div class="flex h-full min-h-[700px] flex-col justify-between bg-[#111418] p-4">
                        <div class="flex flex-col gap-4">
                            <h1 class="text-white text-base font-medium leading-normal">Cineplex Admin</h1>
                            <div class="flex flex-col gap-2">
                                {{-- Dashboard Link --}}
                                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.dashboard')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Dashboard</p>
                                </a>
                                {{-- Movies Link --}}
                                <a href="{{ route('admin.movies.index') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.movies.*')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M224,216H183.36A103.95,103.95,0,1,0,128,232h96a8,8,0,0,0,0-16ZM80,148a20,20,0,1,1,20-20A20,20,0,0,1,80,148Zm48,48a20,20,0,1,1,20-20A20,20,0,0,1,128,196Zm0-96a20,20,0,1,1,20-20A20,20,0,0,1,128,100Zm28,28a20,20,0,1,1,20,20A20,20,0,0,1,156,128Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Movies</p>
                                </a>
                                {{-- Studios Link --}}
                                {{-- Updated SVG for Studios icon --}}
                                <a href="{{ route('admin.studios.index') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.studios.*')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM188,80a12,12,0,1,1-12-12A12,12,0,0,1,188,80ZM96,68a12,12,0,1,1-12-12A12,12,0,0,1,96,68Zm0,120a12,12,0,1,1-12-12A12,12,0,0,1,96,188Zm92,0a12,12,0,1,1-12-12A12,12,0,0,1,188,188ZM128,120a20,20,0,1,1-20,20A20,20,0,0,1,128,120Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Studios</p>
                                </a>
                                {{-- Showtimes Link --}}
                                <a href="{{ route('admin.showtimes.index') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.showtimes.*')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Showtimes</p>
                                </a>
                                {{-- Bookings Link --}}
                                <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.bookings.*')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M227.19,104.48A16,16,0,0,0,240,88.81V64a16,16,0,0,0-16-16H32A16,16,0,0,0,16,64V88.81a16,16,0,0,0,12.81,15.67,24,24,0,0,1,0,47A16,16,0,0,0,16,167.19V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V167.19a16,16,0,0,0-12.81-15.67,24,24,0,0,1,0-47ZM32,167.2a40,40,0,0,0,0-78.39V64H88V192H32Zm192,0V192H104V64H224V88.8a40,40,0,0,0,0,78.39Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Bookings</p>
                                </a>
                                {{-- Users Link --}}
                                {{-- Users link is still here as it was in previous UIs, but not in the most recent image --}}
                                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.users.*')) rounded-xl bg-[#283039] @endif">
                                    <div class="text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                            <path d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-white text-sm font-medium leading-normal">Users</p>
                                </a>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            {{-- Profile Link --}}
                            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('profile.*')) rounded-xl bg-[#283039] @endif">
                                <div class="text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM128,108a24,24,0,1,1-24,24A24,24,0,0,1,128,108Zm-40,48a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H96A8,8,0,0,1,88,156Z"></path>
                                    </svg>
                                </div>
                                <p class="text-white text-sm font-medium leading-normal">Profile</p>
                            </a>
                            {{-- Settings Link --}}
                            <a href="{{ route('admin.settings') }}" class="flex items-center gap-3 px-3 py-2 @if(Request::routeIs('admin.settings')) rounded-xl bg-[#283039] @endif">
                                <div class="text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                                        <path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path>
                                    </svg>
                                </div>
                                <p class="text-white text-sm font-medium leading-normal">Settings</p>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Main content area where specific page content will be injected --}}
                <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>