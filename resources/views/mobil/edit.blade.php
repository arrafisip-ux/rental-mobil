@extends('layouts.app')

@section('content')

<h2 class="text-3xl font-bold text-slate-800 dark:text-white mb-6">

Edit Mobil

</h2>

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-8">

<form action="{{ route('mobil.update',$mobil) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

@include('mobil._form')

<div class="mt-8">

<button
class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-xl">

Update Mobil

</button>

</div>

</form>

</div>

@endsection