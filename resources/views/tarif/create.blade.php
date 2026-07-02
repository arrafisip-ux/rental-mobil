@extends('layouts.app')

@section('title', 'Tambah Tarif')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
                Tambah Tarif
            </h1>

            <p class="mt-2 text-slate-500 dark:text-slate-400">
                Tambahkan tarif untuk kendaraan rental.
            </p>

        </div>

    </div>

    @if ($errors->any())

        <div class="mb-6 bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-700 text-red-700 dark:text-red-200 px-5 py-4 rounded-xl">

            <ul class="list-disc ml-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('tarif.store') }}" method="POST">

            @include('tarif._form')

        </form>

    </div>

</div>

@endsection