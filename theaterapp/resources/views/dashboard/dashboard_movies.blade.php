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
                  <div class="flex items-center gap-3 px-3 py-2 rounded-xl bg-[#283039]">
                    <div class="text-white" data-icon="FilmReel" data-size="24px" data-weight="fill">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M224,216H183.36A103.95,103.95,0,1,0,128,232h96a8,8,0,0,0,0-16ZM80,148a20,20,0,1,1,20-20A20,20,0,0,1,80,148Zm48,48a20,20,0,1,1,20-20A20,20,0,0,1,128,196Zm0-96a20,20,0,1,1,20-20A20,20,0,0,1,128,100Zm28,28a20,20,0,1,1,20,20A20,20,0,0,1,156,128Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Movies</p>
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
                    <div class="text-white" data-icon="Ticket" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M227.19,104.48A16,16,0,0,0,240,88.81V64a16,16,0,0,0-16-16H32A16,16,0,0,0,16,64V88.81a16,16,0,0,0,12.81,15.67,24,24,0,0,1,0,47A16,16,0,0,0,16,167.19V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V167.19a16,16,0,0,0-12.81-15.67,24,24,0,0,1,0-47ZM32,167.2a40,40,0,0,0,0-78.39V64H88V192H32Zm192,0V192H104V64H224V88.8a40,40,0,0,0,0,78.39Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Bookings</p>
                  </div>
                  <div class="flex items-center gap-3 px-3 py-2">
                    <div class="text-white" data-icon="Users" data-size="24px" data-weight="regular">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                        <path
                          d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"
                        ></path>
                      </svg>
                    </div>
                    <p class="text-white text-sm font-medium leading-normal">Users</p>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-1">
                <div class="flex items-center gap-3 px-3 py-2">
                  <div class="text-white" data-icon="Gear" data-size="24px" data-weight="regular">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" fill="currentColor" viewBox="0 0 256 256">
                      <path
                        d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"
                      ></path>
                    </svg>
                  </div>
                  <p class="text-white text-sm font-medium leading-normal">Settings</p>
                </div>
              </div>
            </div>
          </div>
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="flex flex-wrap justify-between gap-3 p-4">
              <p class="text-white tracking-light text-[32px] font-bold leading-tight min-w-72">Manage Movies</p>
              <button
                class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-xl h-8 px-4 bg-[#283039] text-white text-sm font-medium leading-normal"
              >
                <span class="truncate">Add Movie</span>
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
                    placeholder="Search movies"
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
                      <th class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Title</th>
                      <th class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Genre</th>
                      <th class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">Duration</th>
                      <th class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 px-4 py-3 text-left text-white w-[400px] text-sm font-medium leading-normal">
                        Release Date
                      </th>
                      <th class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 px-4 py-3 text-left text-white w-60 text-[#9caaba] text-sm font-medium leading-normal">
                        Actions
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        The Crimson Tide
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Action</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">2h 15m</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        2023-11-15
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit | Remove
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        Whispers of the Past
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Drama</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 45m</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        2023-10-20
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit | Remove
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        Starlight Symphony
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Romance</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 30m</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        2023-09-05
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit | Remove
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        Echoes of Tomorrow
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Sci-Fi</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">2h 00m</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        2023-08-12
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit | Remove
                      </td>
                    </tr>
                    <tr class="border-t border-t-[#3b4754]">
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120 h-[72px] px-4 py-2 w-[400px] text-white text-sm font-normal leading-normal">
                        The Silent Witness
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">Thriller</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">1h 50m</td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480 h-[72px] px-4 py-2 w-[400px] text-[#9caaba] text-sm font-normal leading-normal">
                        2023-07-28
                      </td>
                      <td class="table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600 h-[72px] px-4 py-2 w-60 text-[#9caaba] text-sm font-bold leading-normal tracking-[0.015em]">
                        Edit | Remove
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <style>
                          @container(max-width:120px){.table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-120{display: none;}}
                @container(max-width:240px){.table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-240{display: none;}}
                @container(max-width:360px){.table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-360{display: none;}}
                @container(max-width:480px){.table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-480{display: none;}}
                @container(max-width:600px){.table-2f2464c7-ebe9-45ae-b288-dab770c7bb68-column-600{display: none;}}
              </style>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
