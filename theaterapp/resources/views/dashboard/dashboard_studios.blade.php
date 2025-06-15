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
    <div class="relative flex size-full min-h-screen flex-col bg-[#111418] dark group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <div class="gap-1 px-6 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col w-80">
            <div class="flex h-full min-h-[700px] flex-col justify-between bg-[#111418] p-4">
              <div class="flex flex-col gap-4">
                <h1 class="text-white text-base font-medium leading-normal">Cineplex Admin</h1>
                <div class="flex flex-col gap-2">
                  <div class="flex items-center gap-3 px-3 py-2">
                    <div class="text-white" data-icon="House" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Dashboard</p>
                  </div>
                  <div class="flex items-center gap-3 px-3 py-2">
                    <div class="text-white" data-icon="FilmReel" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M224,216H183.36A103.95,103.95,0,1,0,128,232h96a8,8,0,0,0,0-16ZM40,128a88,88,0,1,1,88,88A88.1,88.1,0,0,1,40,128Zm88-24a24,24,0,1,0-24-24A24,24,0,0,0,128,104Zm0-32a8,8,0,1,1-8,8A8,8,0,0,1,128,72Zm24,104a24,24,0,1,0-24,24A24,24,0,0,0,152,176Zm-32,0a8,8,0,1,1,8,8A8,8,0,0,1,120,176Zm56-24a24,24,0,1,0-24-24A24,24,0,0,0,176,152Zm0-32a8,8,0,1,1-8,8A8,8,0,0,1,176,120ZM80,104a24,24,0,1,0,24,24A24,24,0,0,0,80,104Zm0,32a8,8,0,1,1,8-8A8,8,0,0,1,80,136Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Movies</p>
                  </div>
                  <div class="flex items-center gap-3 px-3 py-2 rounded-xl bg-[#283039]">
                    <div class="text-white" data-icon="Video" data-size="24px" data-weight="fill">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M232,208a8,8,0,0,1-8,8H32a8,8,0,0,1,0-16H224A8,8,0,0,1,232,208Zm0-152V168a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Zm-68,56a8,8,0,0,0-3.71-6.75l-44-28A8,8,0,0,0,104,84v56a8,8,0,0,0,12.29,6.75l44-28A8,8,0,0,0,164,112Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Studios</p>
                  </div>
                  <div class="flex items-center gap-3 px-3 py-2">
                    <div class="text-white" data-icon="Clock" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm64-88a8,8,0,0,1-8,8H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48A8,8,0,0,1,192,128Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Showtimes</p>
                  </div>
                  <div class="flex items-center gap-3 px-3 py-2">
                    <div class="text-white" data-icon="Bookmark" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M184,32H72A16,16,0,0,0,56,48V224a8,8,0,0,0,12.24,6.78L128,193.43l59.77,37.35A8,8,0,0,0,200,224V48A16,16,0,0,0,184,32Zm0,16V161.57l-51.77-32.35a8,8,0,0,0-8.48,0L72,161.56V48ZM132.23,177.22a8,8,0,0,0-8.48,0L72,209.57V180.43l56-35,56,35v29.14Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Bookings</p>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-1">
                <div class="flex items-center gap-3 px-3 py-2">
                  <div class="text-white" data-icon="UserCircle" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"
                      ></path>
                    </svg>
                  </div>
                  <p class="text-white text-sm font-medium leading-normal">Profile</p>
                </div>
              </div>
            </div>
          </div>
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-white tracking-light text-[32px] font-bold leading-tight min-w-72">Studios</p>
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#283039] text-white text-sm font-medium leading-normal"
              >
                <span class="truncate">Add Studio</span>
              </button>
            </div>
            <div class="px-4 py-3">
              <label class="flex flex-col min-w-40 h-12 w-full">
                <div class="flex w-full flex-1 items-stretch rounded-xl h-full">
                  <div
                    class="text-[#9caaba] flex border-none bg-[#283039] items-center justify-center pl-4 rounded-l-xl border-r-0"
                    data-icon="MagnifyingGlass"
                    data-size="24px"
                    data-weight="regular"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"
                      ></path>
                    </svg>
                  </div>
                  <input
                    placeholder="Search studios"
                    class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-xl text-white focus:outline-0 focus:ring-0 border-none bg-[#283039] focus:border-none h-full placeholder:text-[#9caaba] px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal"
                    value=""
                  />
                </div>
              </label>
            </div>
            <div class="px-4 py-3 @container">
              <div class="flex overflow-hidden rounded-xl border border-[#3b4754] bg-[#111418]">
                <table class="flex-1">
                  <thead>
                    <tr class="bg-[#1b2127]">
                      <th class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Studio Name</th>
                      <th class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Capacity</th>
                      <th class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Location</th>
                      <th class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 px-4 py-3 text-left text-white w-60 text-[#9caaba] text-sm font-medium leading-normal">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">Studio Alpha</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">150</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        Main Building
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">Studio Beta</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">120</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        Annex Building
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">Studio Gamma</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">100</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        Main Building
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">Studio Delta</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">80</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        Annex Building
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        Studio Epsilon
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">60</td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        Main Building
                      </td>
                      <td class="table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <style>
                          @container(max-width:120px){.table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-120{display: none;}}
                @container(max-width:240px){.table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-240{display: none;}}
                @container(max-width:360px){.table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-360{display: none;}}
                @container(max-width:480px){.table-49c6dc0b-441c-4030-b1de-fea7d73abae7-column-480{display: none;}}
              </style>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
