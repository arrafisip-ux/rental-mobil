@extends('layouts.app')

@section('title','Tambah Pemakaian Pribadi')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Tambah Pemakaian Pribadi

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Catat penggunaan kendaraan untuk kebutuhan internal perusahaan.

        </p>

    </div>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <form
        action="{{ route('pemakaian-pribadi.store') }}"
        method="POST">

        @include('pemakaian-pribadi._form')

    </form>

</div>

@endsection