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

    {{-- Menu --}}
    <nav class="p-4 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('dashboard')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>📊</span>
            <span>Dashboard</span>

        </a>

        {{-- Mobil --}}
        <a href="{{ route('mobil.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('mobil.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>🚗</span>
            <span>Data Mobil</span>

        </a>

        {{-- Pelanggan --}}
        <a href="{{ route('pelanggan.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('pelanggan.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>👤</span>
            <span>Pelanggan</span>

        </a>

        {{-- Penyewaan --}}
        <a href="{{ route('penyewaan.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('penyewaan.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>📋</span>
            <span>Penyewaan</span>

        </a>

        {{-- Tarif --}}
        <a href="{{ route('tarif.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('tarif.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>💰</span>
            <span>Tarif</span>

        </a>

        {{-- Riwayat Oli --}}
        <a href="{{ route('riwayat-oli.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('riwayat-oli.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>🔧</span>
            <span>Riwayat Oli</span>

        </a>

        {{-- Laporan --}}
        <a href="{{ route('laporan.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('laporan.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>📈</span>
            <span>Laporan</span>

        </a>

    </nav>

</aside>