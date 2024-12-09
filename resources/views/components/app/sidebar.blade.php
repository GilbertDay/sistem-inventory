<div class="min-w-fit">
    <!-- Sidebar backdrop (mobile only) -->
    <div class="fixed inset-0 z-40 transition-opacity duration-200 bg-gray-900 bg-opacity-30 lg:hidden lg:z-auto"
        :class="sidebarOpen ? 'opacity-100' : 'opacity-0 pointer-events-none'" aria-hidden="true" x-cloak></div>

    <!-- Sidebar -->
    <div id="sidebar"
        class="flex lg:!flex flex-col absolute z-40 left-0 top-0 lg:static lg:left-auto lg:top-auto lg:translate-x-0 h-[100dvh] overflow-y-scroll lg:overflow-y-auto no-scrollbar w-64 lg:w-28 lg:sidebar-expanded:!w-72 2xl:!w-72 shrink-0 bg-white dark:bg-gray-800 p-4 transition-all duration-200 ease-in-out {{ $variant === 'v2' ? 'border-r border-gray-200 dark:border-gray-700/60' : 'rounded-r-2xl shadow-sm' }}"
        :class="sidebarOpen ? 'max-lg:translate-x-0' : 'max-lg:-translate-x-64'" @click.outside="sidebarOpen = false"
        @keydown.escape.window="sidebarOpen = false">

        <!-- Sidebar header -->
        <div class="flex justify-between pr-3 mb-10 sm:px-2">
            <!-- Close button -->
            <button class="text-gray-500 lg:hidden hover:text-gray-600" @click.stop="sidebarOpen = !sidebarOpen"
                aria-controls="sidebar" :aria-expanded="sidebarOpen">
                <span class="sr-only">Close sidebar</span>
                <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.7 18.7l1.4-1.4L7.8 13H20v-2H7.8l4.3-4.3-1.4-1.4L4 12z" />
                </svg>
            </button>
            <!-- Logo -->
            <a class="flex items-center justify-center w-full" href="{{ route('dashboard') }}">
                <img class="" src="{{ asset('images/logo-jbg.png') }}" alt="JBGLogo" width="100" height="100" />
                <!-- <svg class="fill-violet-500" xmlns="http://www.w3.org/2000/svg" width="32" height="32">
                    <path
                        d="M31.956 14.8C31.372 6.92 25.08.628 17.2.044V5.76a9.04 9.04 0 0 0 9.04 9.04h5.716ZM14.8 26.24v5.716C6.92 31.372.63 25.08.044 17.2H5.76a9.04 9.04 0 0 1 9.04 9.04Zm11.44-9.04h5.716c-.584 7.88-6.876 14.172-14.756 14.756V26.24a9.04 9.04 0 0 1 9.04-9.04ZM.044 14.8C.63 6.92 6.92.628 14.8.044V5.76a9.04 9.04 0 0 1-9.04 9.04H.044Z" />
                </svg> -->
            </a>
        </div>

        <!-- Links -->
        <div class="space-y-8">
            <!-- Pages group -->
            <div>
                <ul class="">
                    @if(Auth::user()->type == 1)
                    <!-- Users -->
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['dashboard'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['dashboard']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['dashboard'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('dashboard') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-regular fa-user shrink-0 fill-current @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['dashboard'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Dashboard</span>
                                    </div>
                                </div>
                            </a>
                        </a>
                    </li>

                    <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                        <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                            aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Barang</span>
                    </h3>


                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['dataBarang'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['dataBarang']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['dataBarang'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('dataBarang') }}">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-brands fa-fort-awesome shrink-0 fill-current @if(in_array(Request::segment(1), ['dataBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['dataBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Data
                                            Barang</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>


                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['jenisBarang'])){{ 'bg-[#283593]'}}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['jenisBarang']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['jenisBarang'])){{ 'hover:text-gray-900 dark:hover:text-white'}}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('jenisBarang') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['jenisBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['jenisBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Jenis
                                            Barang</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                        <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                            aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Transaksi</span>
                    </h3>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['barangMasuk'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['barangMasuk']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['barangMasuk'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('barangMasuk') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['barangMasuk'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['barangMasuk'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Barang
                                            Masuk</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['barangKeluar'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['barangKeluar']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['barangKeluar'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('barangKeluar') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['barangKeluar'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['barangKeluar'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Barang
                                            Keluar</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->type ==0 || Auth::user()->type == 1)
                    <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                        <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                            aria-hidden="true">•••</span>
                        <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Laporan</span>
                    </h3>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['stokOpname'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['stokOpname']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['stokOpname'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('stokOpname') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['stokOpname'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['stokOpname'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">
                                            Stok Opname</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['laporanBarangMasuk'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['laporanBarangMasuk']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['laporanBarangMasuk'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('laporanBarangMasuk') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['laporanBarangMasuk'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['laporanBarangMasuk'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Laporan
                                            Barang Masuk</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['laporanBarangKeluar'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['laporanBarangKeluar']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['laporanBarangKeluar'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                            <a href="{{ route('laporanBarangKeluar') }}">

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <i
                                            class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['laporanBarangKeluar'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                        <span
                                            class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['laporanBarangKeluar'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Laporan
                                            Barang Keluar</span>
                                    </div>

                                </div>
                            </a>
                        </a>
                    </li>
                    @endif
                    @if(Auth::user()->type == 1)
                        <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                                aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Manajemen User</span>
                        </h3>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['users'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['users']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['users'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('users') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['users'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['users'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Data
                                                User</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>


                        <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                                aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pengajuan</span>
                        </h3>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['staffPermohonan']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['staffPermohonan'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('staffPermohonan') }}">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Permohonan</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>

                        <div class="border-2 border-[#283593] mx-7 my-3"></div>

                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['supplier'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['supplier']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['supplier'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('supplier') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['supplier'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['supplier'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Supplier</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['reparasiBarang']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['reparasiBarang'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('reparasiBarang') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Reparasi Barang</span>
                                        </div>

                                    </div>
                            </a>
                            </a>
                        </li>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['penghapusanBarang'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['penghapusanBarang']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['penghapusanBarang'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('penghapusanBarang') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['penghapusanBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['penghapusanBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Penghapusan Barang</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>
                    @endif
                    @if(Auth::user()->type == 0)
                        <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                                aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pengajuan</span>
                        </h3>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['permohonan'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['permohonan']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['permohonan'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('permohonan') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['permohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['permohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Permohonan</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>
                    @endif

                    @if(Auth::user()->type == 2)
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['staffDashboard'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['staffDashboard']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['staffDashboard'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('staffDashboard') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-regular fa-user shrink-0 fill-current @if(in_array(Request::segment(1), ['staffDashboard'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['staffDashboard'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Dashboard</span>
                                        </div>
                                    </div>
                                </a>
                            </a>
                        </li>

                        <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                                aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Barang</span>
                        </h3>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['dataBarang'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['dataBarang']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['dataBarang'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('dataBarang') }}">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-brands fa-fort-awesome shrink-0 fill-current @if(in_array(Request::segment(1), ['dataBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['dataBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Data
                                                Barang</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>

                        <h3 class="pl-3 my-2 text-xs font-semibold text-gray-400 uppercase dark:text-gray-500">
                            <span class="hidden w-6 text-center lg:block lg:sidebar-expanded:hidden 2xl:hidden"
                                aria-hidden="true">•••</span>
                            <span class="lg:hidden lg:sidebar-expanded:block 2xl:block">Pengajuan</span>
                        </h3>
                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'bg-[#283593]' }}@endif"
                            x-data="{ open: {{ in_array(Request::segment(1), ['staffPermohonan']) ? 1 : 0 }} }">
                            <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['staffPermohonan'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                                @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('staffPermohonan') }}">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['staffPermohonan'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif  lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Permohonan</span>
                                        </div>

                                    </div>
                                </a>
                            </a>
                        </li>
                        <div class="border-[1px] border-[#283593] mx-3 my-3"></div>

                        <li class="pl-4 pr-3 py-2 rounded-lg mb-0.5 last:mb-0 bg-[linear-gradient(135deg,var(--tw-gradient-stops))] @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'bg-[#283593]' }}@endif"
                        x-data="{ open: {{ in_array(Request::segment(1), ['reparasiBarang']) ? 1 : 0 }} }">
                        <a class="block text-gray-800 dark:text-gray-100 truncate transition @if(!in_array(Request::segment(1), ['reparasiBarang'])){{ 'hover:text-gray-900 dark:hover:text-white' }}@endif"
                            @click.prevent="open = !open; sidebarExpanded = true">
                                <a href="{{ route('reparasiBarang') }}">

                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <i
                                                class="fa-solid fa-users shrink-0 fill-current @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif"></i>
                                            <span
                                                class="ml-4 text-sm font-medium duration-200 @if(in_array(Request::segment(1), ['reparasiBarang'])){{ 'text-white' }}@else{{ 'text-gray-600 dark:text-gray-500' }}@endif lg:opacity-0 lg:sidebar-expanded:opacity-100 2xl:opacity-100">Reparasi Barang</span>
                                        </div>

                                    </div>
                            </a>
                            </a>
                        </li>

                    @endif

                </ul>
            </div>
        </div>

        <!-- Expand / collapse button -->
        <!-- <div class="justify-end hidden pt-3 mt-auto lg:inline-flex 2xl:hidden">
            <div class="w-12 py-2 pl-4 pr-3">
                <button
                    class="text-gray-600 transition-colors hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-600"
                    @click="sidebarExpanded = !sidebarExpanded">
                    <span class="sr-only">Expand / collapse sidebar</span>
                    <svg class="text-gray-600 fill-current shrink-0 dark:text-gray-500 sidebar-expanded:rotate-180"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <path
                            d="M15 16a1 1 0 0 1-1-1V1a1 1 0 1 1 2 0v14a1 1 0 0 1-1 1ZM8.586 7H1a1 1 0 1 0 0 2h7.586l-2.793 2.793a1 1 0 1 0 1.414 1.414l4.5-4.5A.997.997 0 0 0 12 8.01M11.924 7.617a.997.997 0 0 0-.217-.324l-4.5-4.5a1 1 0 0 0-1.414 1.414L8.586 7M12 7.99a.996.996 0 0 0-.076-.373Z" />
                    </svg>
                </button>
            </div>
        </div> -->

    </div>
</div>
