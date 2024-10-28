@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Daftar Laporan</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="border-b-2 border-gray-300 p-2">Diajukan Oleh</th>
                <th class="border-b-2 border-gray-300 p-2">Kategori</th>
                <th class="border-b-2 border-gray-300 p-2">Deskripsi</th>
                <th class="border-b-2 border-gray-300 p-2">Tanggal</th>
                <th class="border-b-2 border-gray-300 p-2">Status</th>
                <th class="border-b-2 border-gray-300 p-2">Lampiran</th>
                <th class="border-b-2 border-gray-300 p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
            <tr>
                <td class="border-b border-gray-200 p-2">{{ $report->user->name }}</td>
                <td class="border-b border-gray-200 p-2">{{ $report->category }}</td>
                <td class="border-b border-gray-200 p-2">{{ $report->description }}</td>
                <td class="border-b border-gray-200 p-2">{{ $report->date->format('d-m-Y') }}</td>
                <td class="border-b border-gray-200 p-2">{{ $report->status }}</td>
                <td class="border-b border-gray-200 p-2">
                    @if ($report->attachment)
                        <a href="{{ asset('storage/' . $report->attachment) }}" class="text-blue-500" target="_blank">Lihat</a>
                    @else
                        Tidak ada
                    @endif
                </td>
                <td class="border-b border-gray-200 p-2">
                    <a href="{{ route('reports.show', $report) }}" class="text-blue-500">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center p-4 text-gray-500">Tidak ada laporan yang tersedia.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
