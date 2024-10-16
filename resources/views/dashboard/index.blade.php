@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-gray-100 p-6">
    <h2 class="font-semibold text-xl text-gray-800">Dashboard</h2>
    <p>Selamat datang di dashboard!</p>

    <div class="mt-6">
        <h3 class="text-lg font-semibold">Data Pengaduan</h3>
        @if($complaints->isEmpty())
            <p>Tidak ada pengaduan yang tersedia.</p>
        @else
            <table class="min-w-full bg-gray border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Kategori</th>
                        <th class="py-2 px-4 border-b">Deskripsi</th>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint) 
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $complaint->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->category }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $complaint->date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection
