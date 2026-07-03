@extends('layouts.app')

@section('title','Tambah Cek Kendaraan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Tambah Cek Kendaraan

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Catat hasil pemeriksaan kendaraan sebelum atau sesudah digunakan.

        </p>

    </div>

</div>

@if ($errors->any())

<div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl">

    <ul class="list-disc ml-5">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <form
        action="{{ route('cek-kendaraan.store') }}"
        method="POST">

        @include('cek-kendaraan._form')

    </form>

</div>

@endsection