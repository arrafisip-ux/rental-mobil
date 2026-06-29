@extends('layouts.app')

@section('title','Tambah Pelanggan')

@section('content')

<div class="max-w-5xl mx-auto">

    <h1 class="text-3xl font-bold text-slate-800 dark:text-white mb-8">
        Tambah Pelanggan
    </h1>

    <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('pelanggan.store') }}" method="POST">

            @include('pelanggan._form')

        </form>

    </div>

</div>

@endsection