<x-guest-layout>

    <div class="mb-8 text-center">

        <h1 class="text-3xl font-bold text-slate-800">
            🚗 Rental Mobil
        </h1>

        <p class="mt-2 text-gray-500">
            Sistem Informasi Rental Mobil Berbasis Web
        </p>

    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-5">
            <x-input-label for="email" :value="'Email'" />

            <x-text-input
                id="email"
                class="block mt-2 w-full rounded-xl"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-5">

            <x-input-label
                for="password"
                :value="'Password'"
            />

            <x-text-input
                id="password"
                class="block mt-2 w-full rounded-xl"
                type="password"
                name="password"
                required
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <div class="flex items-center justify-between mb-6">

            <label class="flex items-center">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded">

                <span class="ml-2 text-sm text-gray-600">

                    Ingat Saya

                </span>

            </label>

            @if(Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm text-blue-600 hover:underline">

                    Lupa Password?

                </a>

            @endif

        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-xl">

            Masuk ke Sistem

        </button>

    </form>

</x-guest-layout>