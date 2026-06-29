@extends('layouts.app')

@section('title','Tambah Pelanggan')

@section('content')

<h1 class="text-3xl font-bold mb-8 dark:text-white">
    Tambah Pelanggan
</h1>

<form action="{{ route('pelanggan.store') }}" method="POST">

    @csrf

    @include('pelanggan._form')

</form>

@endsection