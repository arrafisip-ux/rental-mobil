@extends('layouts.app')

@section('title','Edit Pelanggan')

@section('content')

<h1 class="text-3xl font-bold mb-8 dark:text-white">
    Edit Pelanggan
</h1>

<form action="{{ route('pelanggan.update',$pelanggan) }}" method="POST">

    @csrf
    @method('PUT')

    @include('pelanggan._form')

</form>

@endsection