@extends('layouts.app')

@section('title','Penyewaan')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold text-slate-800 dark:text-white">
            Data Penyewaan
        </h1>

        <p class="mt-2 text-slate-500 dark:text-slate-400">
            Daftar transaksi penyewaan mobil.
        </p>

    </div>

    <a href="{{ route('penyewaan.create') }}"
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl shadow">

        + Tambah Penyewaan

    </a>

</div>

@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-100 dark:bg-slate-700">

            <tr>

                <th class="p-4 text-left">No Transaksi</th>

                <th class="p-4 text-left">Pelanggan</th>

                <th class="p-4 text-left">Mobil</th>

                <th class="p-4 text-left">Tanggal Pinjam</th>

                <th class="p-4 text-left">Total</th>

                <th class="p-4 text-left">Status</th>

                <th class="p-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($penyewaans as $item)

        <tr class="border-t border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700">

            <td class="p-4">

                {{ $item->no_transaksi }}

            </td>

            <td class="p-4">

                {{ $item->pelanggan->nama }}

            </td>

            <td class="p-4">

                {{ $item->mobil->merk }}

                {{ $item->mobil->tipe }}

            </td>

            <td class="p-4">

                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y H:i') }}

            </td>

            <td class="p-4">

                Rp {{ number_format($item->total_bayar,0,',','.') }}

            </td>

            <td class="p-4">

                @if($item->status=='Booking')

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">

                        Booking

                    </span>

                @elseif($item->status=='Berjalan')

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">

                        Berjalan

                    </span>

                @elseif($item->status=='Selesai')

                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                        Selesai

                    </span>

                @else

                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                        Batal

                    </span>

                @endif

            </td>
<td class="p-4">
    <div class="flex justify-center items-center gap-2">

       @if($item->status == 'Berjalan')

    <a href="{{ route('penyewaan.pengembalian', $item) }}"
       class="bg-blue-600 hover:bg-blue-700
              text-white text-sm
              px-3 py-2 rounded-lg transition">

        Kembalikan

    </a>

    <a href="{{ route('penyewaan.edit', $item) }}"
       class="bg-yellow-500 hover:bg-yellow-600
              text-white text-sm
              px-3 py-2 rounded-lg transition">

        Edit

    </a>

    <form action="{{ route('penyewaan.destroy',$item) }}"
          method="POST"
          class="inline">

        @csrf
        @method('DELETE')

        <button
            onclick="return confirm('Hapus transaksi ini?')"
            class="bg-red-600 hover:bg-red-700
                   text-white text-sm
                   px-3 py-2 rounded-lg transition">

            Hapus

        </button>

    </form>

        @elseif($item->status == 'Booking')

            <a href="{{ route('penyewaan.edit', $item) }}"
               class="bg-yellow-500 hover:bg-yellow-600
                      text-white text-sm
                      px-3 py-2 rounded-lg transition">

                Edit

            </a>

            <form action="{{ route('penyewaan.destroy',$item) }}"
                  method="POST"
                  class="inline">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus transaksi ini?')"
                    class="bg-red-600 hover:bg-red-700
                           text-white text-sm
                           px-3 py-2 rounded-lg transition">

                    Hapus

                </button>

            </form>

        @elseif($item->status == 'Selesai')

            <span
                class="inline-flex items-center
                       bg-green-100 text-green-700
                       px-3 py-2 rounded-lg text-sm">

                ✓ Selesai

            </span>

        @else

            <form action="{{ route('penyewaan.destroy',$item) }}"
                  method="POST"
                  class="inline">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Hapus transaksi ini?')"
                    class="bg-red-600 hover:bg-red-700
                           text-white text-sm
                           px-3 py-2 rounded-lg transition">

                    Hapus

                </button>

            </form>

        @endif

    </div>
</td>
        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center py-10 text-slate-500">

                Belum ada transaksi penyewaan.

            </td>

        </tr>

        @endforelse

        </tbody>

    </table>

    @if($penyewaans->count())

    <div class="p-6">

        {{ $penyewaans->links() }}

    </div>

    @endif

</div>

@endsection