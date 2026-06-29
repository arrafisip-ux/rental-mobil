@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-6">

Tambah Data Mobil

</h2>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

<form action="{{ route('mobil.store') }}"
method="POST"
enctype="multipart/form-data">

@csrf

@include('mobil._form')

<div class="mt-8">

<button
class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">

Simpan Mobil

</button>

</div>

</form>

</div>

@endsection