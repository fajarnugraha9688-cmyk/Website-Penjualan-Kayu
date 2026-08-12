@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ========================================= --}}
    {{-- HEADER --}}
    {{-- ========================================= --}}
    <div class="bg-white rounded-2xl shadow border p-6">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold">

                    👥 Data Pelanggan

                </h1>

                <p class="text-gray-500 mt-2">

                    Daftar seluruh pelanggan yang telah terdaftar pada sistem.

                </p>

            </div>

            <div class="bg-green-100 text-green-700 px-5 py-3 rounded-xl font-semibold">

                Total Pelanggan :
                {{ $customers->count() }}

            </div>

        </div>

    </div>

    {{-- ========================================= --}}
    {{-- TABEL --}}
    {{-- ========================================= --}}
    <div class="bg-white rounded-2xl shadow border overflow-hidden">

        <table class="w-full">

            <thead class="bg-green-700 text-white">

                <tr>

                    <th class="px-5 py-4 text-left">No</th>

                    <th class="px-5 py-4 text-left">Nama</th>

                    <th class="px-5 py-4 text-left">Email</th>

                    <th class="px-5 py-4 text-left">No HP</th>

                    <th class="px-5 py-4 text-center">Jumlah Order</th>

                    <th class="px-5 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>
                @forelse($customers as $customer)

                <tr class="border-b hover:bg-gray-50">

                    <td class="px-5 py-4">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-5 py-4 font-semibold">

                        {{ $customer->name }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $customer->email }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $customer->no_hp }}

                    </td>

                    <td class="px-5 py-4 text-center">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            {{ $customer->orders_count }} Order

                        </span>

                    </td>

                    <td class="px-5 py-4 text-center">

                        <a
                            href="{{ route('pelanggan.show', $customer) }}"
                            class="inline-block bg-green-700 hover:bg-green-800 text-white px-4 py-2 rounded-lg transition">

                            Detail

                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-10 text-gray-500">

                        Belum ada pelanggan yang terdaftar.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection