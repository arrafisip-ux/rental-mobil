@extends('layouts.app')

@section('title', 'Tambah Penyewaan')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                Tambah Penyewaan
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Buat transaksi penyewaan baru.
            </p>

        </div>

    </div>

    @if ($errors->any())

        <div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4">

            <ul class="list-disc ml-5 text-red-700">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

        <form
            action="{{ route('penyewaan.store') }}"
            method="POST">

            @include('penyewaan._form')

        </form>

    </div>

</div>

@endsection