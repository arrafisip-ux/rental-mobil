<header class="bg-white dark:bg-slate-800 shadow px-8 py-5 flex justify-between items-center">

    <div>

        <h2 class="text-2xl font-bold text-slate-700 dark:text-white">

            Dashboard

        </h2>

    </div>

    <div class="flex items-center gap-4">

        <span class="text-slate-600 dark:text-white">

            {{ Auth::user()->name }}

        </span>

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                Logout

            </button>

        </form>

    </div>

</header>