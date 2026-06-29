<header class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 shadow-sm px-8 py-5 flex justify-between items-center">

<h2 class="text-2xl font-bold text-slate-800 dark:text-white">

Dashboard

</h2>

<div class="flex items-center gap-4">

<button
@click="darkMode=!darkMode"
class="bg-slate-200 dark:bg-slate-700 px-4 py-2 rounded-xl">

<span x-show="!darkMode">🌙</span>

<span x-show="darkMode">☀️</span>

</button>

<span class="text-slate-700 dark:text-white">

{{ Auth::user()->name }}

</span>

<form method="POST"
action="{{ route('logout') }}">

@csrf

<button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-xl text-white">

Logout

</button>

</form>

</div>

</header>