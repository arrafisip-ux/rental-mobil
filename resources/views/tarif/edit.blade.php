@extends('layouts.app')

@section('title', 'Edit Tarif')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-white">
                Edit Tarif
            </h1>

            <p class="text-slate-400 mt-2">
                Ubah data tarif rental mobil.
            </p>

        </div>

    </div>

    @if ($errors->any())

    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl">

        <ul class="list-disc ml-5">

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="bg-slate-800 rounded-2xl shadow-lg p-8">

        <form action="{{ route('tarif.update', $tarif) }}" method="POST">

            @csrf
            @method('PUT')

            @include('tarif._form')

        </form>

    </div>

</div>

@endsection