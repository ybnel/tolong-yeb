<html>
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Inter%3Awght%40400%3B500%3B700%3B900&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Stitch Design</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-[#121416] dark group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#2c3035] px-10 py-3">
          <div class="flex items-center gap-4 text-white">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M36.7273 44C33.9891 44 31.6043 39.8386 30.3636 33.69C29.123 39.8386 26.7382 44 24 44C21.2618 44 18.877 39.8386 17.6364 33.69C16.3957 39.8386 14.0109 44 11.2727 44C7.25611 44 4 35.0457 4 24C4 12.9543 7.25611 4 11.2727 4C14.0109 4 16.3957 8.16144 17.6364 14.31C18.877 8.16144 21.2618 4 24 4C26.7382 4 29.123 8.16144 30.3636 14.31C31.6043 8.16144 33.9891 4 36.7273 4C40.7439 4 44 12.9543 44 24C44 35.0457 40.7439 44 36.7273 44Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-white text-lg font-bold leading-tight tracking-[-0.015em]">Cineplex</h2>
          </div>
          <div class="flex flex-1 justify-end gap-8">
            <div class="flex items-center gap-9">
              <a class="text-white text-sm font-medium leading-normal" href="#">Now Showing</a>
              <a class="text-white text-sm font-medium leading-normal" href="#">Coming Soon</a>
              <a class="text-white text-sm font-medium leading-normal" href="#">Deals</a>
              <a class="text-white text-sm font-medium leading-normal" href="#">Private Events</a>
            </div>
            <button
              class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#2c3035] text-white text-sm font-bold leading-normal tracking-[0.015em]"
            >
              <span class="truncate">Sign In</span>
            </button>
          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap gap-2 p-4">
              <a class="text-[#a2abb3] text-base font-medium leading-normal" href="#">Movies</a>
              <span class="text-[#a2abb3] text-base font-medium leading-normal">/</span>
              <a class="text-[#a2abb3] text-base font-medium leading-normal" href="#">The Matrix</a>
              <span class="text-[#a2abb3] text-base font-medium leading-normal">/</span>
              <span class="text-white text-base font-medium leading-normal">Select Seats</span>
            </div>
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <div class="flex min-w-72 flex-col gap-3">
                <p class="text-white tracking-light text-[32px] font-bold leading-tight">The Matrix</p>
                <p class="text-[#a2abb3] text-sm font-normal leading-normal">Select Seats</p>
              </div>
            </div>
            <div class="flex w-full grow bg-[#121416] @container p-4">
              <div class="w-full gap-1 overflow-hidden bg-[#121416] @[480px]:gap-2 aspect-[3/2] rounded-xl flex">
                <div
                  class="w-full bg-center bg-no-repeat bg-cover aspect-auto rounded-none flex-1"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBdY07yew7V0dnoU0NDXD7Ff2Ehx98NuKFu1VKfNH8diByK_S6UboseQkRz7ttr7qsGvhcdShaljnNl3UwJXSVVZu3YINZLjsADvu-vGcqBEysAwVF3Wh2D2qPwy49htQIJop9wy0xUamPlGfjB-7e7FkdkFFDA-WItaNqZ-H7NpAVfFQJWW-3FsWs3_t9CMi0o64Zpaw__CSFduODdG9h-fiPfHQ_iywcnh9E95jTMpTPBGl5jX00DiSfCGUMGXFbNo9RkdYn92Rk");'
                ></div>
              </div>
            </div>
            <h3 class="text-white text-lg font-bold leading-tight tracking-[-0.015em] px-4 pb-2 pt-4">Select Seats</h3>
            <p class="text-white text-base font-normal leading-normal pb-3 pt-1 px-4">
              Choose your seats for The Matrix. Seats marked in green are available, while those in red are already booked. Select your preferred seats by clicking on them.
            </p>
            <div class="flex px-4 py-3 justify-end">
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-10 px-4 bg-[#dce7f3] text-[#121416] text-sm font-bold leading-normal tracking-[0.015em]"
              >
                <span class="truncate">Book Seats</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
