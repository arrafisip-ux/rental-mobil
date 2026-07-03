<aside class="w-72 h-screen sticky top-0 overflow-y-auto
bg-white dark:bg-slate-800
border-r border-slate-200 dark:border-slate-700
shadow-sm transition-all duration-300">

    {{-- Logo --}}
    <div class="p-6 border-b border-slate-200 dark:border-slate-700">

        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
            🚗 Rental Mobil
        </h1>

        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Admin Panel
        </p>

    </div>

    <nav class="p-4 space-y-6">

        {{-- DASHBOARD --}}
        <div>

            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-400 font-semibold">
                Dashboard
            </p>

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
               {{ request()->routeIs('dashboard')
                    ? 'bg-blue-600 text-white shadow-md'
                    : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                <span>📊</span>
                <span>Dashboard</span>

            </a>

        </div>

        {{-- MASTER DATA --}}
        <div>

            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-400 font-semibold">
                Master Data
            </p>

            <div class="space-y-2">

                <a href="{{ route('mobil.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('mobil.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>🚗</span>
                    <span>Data Mobil</span>

                </a>

                <a href="{{ route('pelanggan.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('pelanggan.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>👤</span>
                    <span>Pelanggan</span>

                </a>

                <a href="{{ route('tarif.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('tarif.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>💰</span>
                    <span>Tarif</span>

                </a>

            </div>

        </div>

        {{-- TRANSAKSI --}}
        <div>

            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-400 font-semibold">
                Transaksi
            </p>

            <div class="space-y-2">

                <a href="{{ route('penyewaan.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('penyewaan.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>📋</span>
                    <span>Penyewaan</span>

                </a>

            </div>

        </div>

        {{-- OPERASIONAL --}}
        <div>

            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-400 font-semibold">
                Operasional
            </p>

            <div class="space-y-2">

                <a href="{{ route('perawatan.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('perawatan.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>🛠️</span>
                    <span>Perawatan Kendaraan</span>

                </a>
                <a href="{{ route('pemakaian-pribadi.index') }}"
    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
    {{ request()->routeIs('pemakaian-pribadi.*')
        ? 'bg-blue-600 text-white shadow-md'
        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

    <span>🚘</span>
    <span>Pemakaian Pribadi</span>

</a>
<a href="{{ route('cek-kendaraan.index') }}"
    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
    {{ request()->routeIs('cek-kendaraan.*')
        ? 'bg-blue-600 text-white shadow-md'
        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

    <span>✅</span>
    <span>Cek Kendaraan</span>

</a>

                <a href="{{ route('riwayat-oli.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('riwayat-oli.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>🛢️</span>
                    <span>Riwayat Oli</span>

                </a>

            </div>

        </div>

        {{-- LAPORAN --}}
        <div>

            <p class="px-4 mb-2 text-xs uppercase tracking-wider text-slate-400 font-semibold">
                Laporan
            </p>

            <div class="space-y-2">

                <a href="{{ route('laporan.index') }}"
                    class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
                    {{ request()->routeIs('laporan.*')
                        ? 'bg-blue-600 text-white shadow-md'
                        : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

                    <span>📈</span>
                    <span>Laporan</span>

                </a>

            </div>

        </div>

    </nav>

</aside>