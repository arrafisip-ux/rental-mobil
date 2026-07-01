@extends('layouts.app')

@section('title','Tambah Tarif')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Tambah Tarif
        </h1>

        <p class="mt-2 text-slate-600 dark:text-slate-400">
            Tambahkan data tarif rental mobil.
        </p>

    </div>

    @if($errors->any())

    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-xl p-5">

        <ul class="list-disc ml-5">

            @foreach($errors->all() as $error)

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