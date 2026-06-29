<aside class="w-72 h-screen sticky top-0 overflow-y-auto
bg-white dark:bg-slate-800
border-r border-slate-200 dark:border-slate-700
shadow-sm transition-all duration-300">

    <!-- Logo -->
    <div class="p-6 border-b border-slate-200 dark:border-slate-700">

        <h1 class="text-2xl font-bold text-slate-800 dark:text-white">
            🚗 Rental Mobil
        </h1>

        <p class="mt-1 text-sm text-slate-500 dark:text-slate-400">
            Admin Panel
        </p>

    </div>

    <!-- Menu -->
    <nav class="p-4 space-y-2">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('dashboard')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>📊</span>
            <span>Dashboard</span>

        </a>

        <a href="{{ route('mobil.index') }}"
           class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all duration-200
           {{ request()->routeIs('mobil.*')
                ? 'bg-blue-600 text-white shadow-md'
                : 'text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white' }}">

            <span>🚗</span>
            <span>Data Mobil</span>

        </a>

        <a href="{{ route('pelanggan.index') }}"
class="block rounded-xl p-3 transition
{{ request()->routeIs('pelanggan.*')
? 'bg-blue-600 text-white shadow'
: 'text-slate-700 dark:text-white hover:bg-blue-600 hover:text-white' }}">

👤 Pelanggan

</a>

        <a href="#"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white transition-all duration-200">

            <span>📋</span>
            <span>Penyewaan</span>

        </a>

        <a href="#"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white transition-all duration-200">

            <span>💰</span>
            <span>Tarif</span>

        </a>

        <a href="#"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white transition-all duration-200">

            <span>🔧</span>
            <span>Riwayat Oli</span>

        </a>

        <a href="#"
           class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-slate-700 hover:text-blue-600 dark:hover:text-white transition-all duration-200">

            <span>📈</span>
            <span>Laporan</span>

        </a>

    </nav>

</aside>