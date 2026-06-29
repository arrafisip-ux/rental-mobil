@extends('layouts.app')

@section('title','Edit Mobil')

@section('content')

<h1 class="text-3xl font-bold text-slate-800 dark:text-white mb-6">
    Edit Data Mobil
</h1>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

    <form action="{{ route('mobil.update',$mobil->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 text-slate-700 dark:text-slate-300">
                    Kode Mobil
                </label>

                <input
                    type="text"
                    name="kode_mobil"
                    value="{{ old('kode_mobil',$mobil->kode_mobil) }}"
                    class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white p-3">
            </div>

            <div>
                <label class="block mb-2 text-slate-700 dark:text-slate-300">
                    Merk
                </label>

                <input
                    type="text"
                    name="merk"
                    value="{{ old('merk',$mobil->merk) }}"
                    class="w-full rounded-xl border border-slate-300 dark:border-slate-600 dark:bg-slate-700 dark:text-white p-3">
            </div>

        </div>

        <div class="mt-8 flex gap-3">

            <button class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

                Simpan Perubahan

            </button>

            <a href="{{ route('mobil.index') }}"
               class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl">

                Batal

            </a>

        </div>

    </form>

</div>

@endsection