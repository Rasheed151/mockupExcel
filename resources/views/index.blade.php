<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png"
        href="https://res.cloudinary.com/dvugdsa0z/image/upload/v1756707378/projectku/esqeuwdgmfpwbizrdrhx.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Index</title>
</head>

<body x-data="{ open: true }">
    <!-- Sidebar -->
    <div class="flex m-0">
        <aside
            class="border-r bg-[#047857] w-64 h-screen fixed left-0 transform transition-transform duration-300 ease-in-out"
            :class="open ? 'translate-x-0' : '-translate-x-full'">

            <!-- Header Sidebar -->
            <div class="flex justify-center items-center my-4">
                <h2 class="text-4xl font-bold">BULAN</h2>
            </div>

            <!-- Isi Menu -->
            <nav class="flex flex-col p-2 space-y-2 text-xl justify-center m-4">
                <details class="bg-gray-300 p-2 rounded-lg">
                    <summary class="cursor-pointer">2025</summary>
                    <ul class="ml-4 mt-2 space-y-1 ">
                        <li>Januari</li>
                        <li>Februari</li>
                        <li>Maret</li>
                        <li>April</li>
                        <li>Mei</li>
                        <li>Juni</li>
                        <li>Juli</li>
                        <li>Agustus</li>
                        <li>September</li>
                        <li>Oktober</li>
                        <li>November</li>
                        <li>Desember</li>
                    </ul>
                </details>

                <details class="bg-gray-300 p-2 rounded-lg">
                    <summary class="cursor-pointer">2024</summary>
                    <ul class="ml-4 mt-2 space-y-1 ">
                        <li>Januari</li>
                        <li>Februari</li>
                        <li>Maret</li>
                        <li>April</li>
                        <li>Mei</li>
                        <li>Juni</li>
                        <li>Juli</li>
                        <li>Agustus</li>
                        <li>September</li>
                        <li>Oktober</li>
                        <li>November</li>
                        <li>Desember</li>
                    </ul>
                </details>

                <details class="bg-gray-300 p-2 rounded-lg">
                    <summary class="cursor-pointer">2023</summary>
                    <ul class="ml-4 mt-2 space-y-1 ">
                        <li>Januari</li>
                        <li>Februari</li>
                        <li>Maret</li>
                        <li>April</li>
                        <li>Mei</li>
                        <li>Juni</li>
                        <li>Juli</li>
                        <li>Agustus</li>
                        <li>September</li>
                        <li>Oktober</li>
                        <li>November</li>
                        <li>Desember</li>
                    </ul>
                </details>

                <details class="bg-gray-300 p-2 rounded-lg">
                    <summary class="cursor-pointer">2022</summary>
                    <ul class="ml-4 mt-2 space-y-1 ">
                        <li>Januari</li>
                        <li>Februari</li>
                        <li>Maret</li>
                        <li>April</li>
                        <li>Mei</li>
                        <li>Juni</li>
                        <li>Juli</li>
                        <li>Agustus</li>
                        <li>September</li>
                        <li>Oktober</li>
                        <li>November</li>
                        <li>Desember</li>
                    </ul>
                </details>

                <details class="bg-gray-300 p-2 rounded-lg">
                    <summary class="cursor-pointer">2021</summary>
                    <ul class="ml-4 mt-2 space-y-1 ">
                        <li>Januari</li>
                        <li>Februari</li>
                        <li>Maret</li>
                        <li>April</li>
                        <li>Mei</li>
                        <li>Juni</li>
                        <li>Juli</li>
                        <li>Agustus</li>
                        <li>September</li>
                        <li>Oktober</li>
                        <li>November</li>
                        <li>Desember</li>
                    </ul>
                </details>

            </nav>


            <!-- Tombol Buka/Tutup -->
            <div class="absolute bottom-1 -right-[29px]">
                <button @click="open = !open"
                    class="bg-blue-600 hover:bg-blue-700 text-white p-2 rounded-r-lg shadow transition-all duration-300">
                    <span x-show="!open">-></span>
                    <span x-show="open">✕</span>
                </button>
            </div>
        </aside>
    </div>

    <main class="flex-1 ml-0 transition-all duration-300" :class="open ? 'ml-64' : 'ml-0'">
        <!-- header -->
        <div class="bg-gray-400 font-semibold py-4 px-8">
            <div class="nav flex flex-row justify-between text-2xl">
                <div class="flex justify-end bg-white rounded-lg p-1">
                    27-07-2025
                </div>
                <div class="flex justify-end bg-white rounded-lg p-1">
                    <div class="relative inline-block text-left">

                        <!-- Checkbox Trigger -->
                        <input type="checkbox" id="menu-toggle" class="hidden peer">

                        <!-- Button -->
                        <label for="menu-toggle"
                            class="inline-flex w-full cursor-pointer justify-center items-center gap-x-1.5 rounded-md bg-white/10 px-3 py-2 text-sm font-semibold ring-1 ring-white/20 hover:bg-white/20 select-none">
                            Options
                            <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                class="size-5 text-gray-300">
                                <path fill-rule="evenodd"
                                    d="M5.22 8.22a.75.75 0 011.06 0L10 11.94l3.72-3.72a.75.75 0 111.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0L5.22 9.28a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </label>

                        <!-- MENU -->
                        <div
                            class="dropdown-content absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-gray-200 outline outline-1 -outline-offset-1 outline-white/10 shadow-lg">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-white/10 hover:text-white rounded">
                                    Account settings
                                </a>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-white/10 hover:text-white rounded">
                                    Contact Support
                                </a>
                                <form method="POST">
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-left text-sm hover:bg-white/10 hover:text-white rounded">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-row justify-between pb-2 pt-8">
                <div class="flex justify-center bg-white text-xl font-semibold rounded-lg p-2">
                    Jumlah Pendapatan
                </div>
                <div class="flex justify-center bg-white text-xl font-semibold rounded-lg p-2">
                    Biaya PG/tutupan
                </div>
                <div class="flex justify-center bg-white text-xl font-semibold rounded-lg p-2">
                    Laba Bersih
                </div>

            </div>
        </div>
        <!-- content -->
        <div id="spreadsheet-root" class="p-4">
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h2 class="text-xl font-bold">Data 0725</h2>
                    <div class="text-sm text-gray-600">Rows: 1000 — Columns: A–Z</div>
                </div>
                <div class="text-sm text-gray-700">Tgl: <span id="server-date">27-07-2025</span></div>
            </div>

            <!-- spreadsheet wrapper -->
            <div id="spreadsheet-wrapper" class="border bg-white overflow-auto h-[80vh] ml-12">
                <!-- top padding placeholder -->
                <div id="top-pad" style="height:0px"></div>

                <table id="vs-table" class="border-collapse w-max select-none">
                    <thead id="vs-thead" class="sticky top-0 z-30">
                        <tr>
                            <th class="border p-1 w-12 text-center bg-emerald-700 text-white sticky left-0 z-40">No</th>
                            <!-- columns inserted by JS -->
                        </tr>
                    </thead>
                    <tbody id="vs-tbody">
                        <!-- visible rows inserted by JS -->
                    </tbody>
                </table>

                <!-- bottom padding placeholder -->
                <div id="bottom-pad" style="height:0px"></div>
            </div>
        </div>

        <!-- CSRF token meta for fetch -->
        <meta name="csrf-token" content="{{ csrf_token() }}">


    </main>

</body>

</html>