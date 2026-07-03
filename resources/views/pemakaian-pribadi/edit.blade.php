@extends('layouts.app')

@section('title','Edit Pemakaian Pribadi')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">

            Edit Pemakaian Pribadi

        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">

            Ubah data pemakaian kendaraan perusahaan.

        </p>

    </div>

</div>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <form
        action="{{ route('pemakaian-pribadi.update',$pemakaianPribadi) }}"
        method="POST">

        @csrf
        @method('PUT')

        @include('pemakaian-pribadi._form')

    </form>

</div>

@endsection