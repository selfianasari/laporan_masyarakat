@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Pengaduan</h2>

    <div class="detail">
        <label>Nama Lengkap:</label>
        <p>{{ $complaint->name }}</p>
    </div>

    <div class="detail">
        <label>Email:</label>
        <p>{{ $complaint->email }}</p>
    </div>

    <div class="detail">
        <label>Nomor Telepon:</label>
        <p>{{ $complaint->phone }}</p>
    </div>

    <div class="detail">
        <label>Tanggal Pengaduan:</label>
        <p>{{ \Carbon\Carbon::parse($complaint->date)->format('d M Y') }}</p>
    </div>

    <div class="detail">
        <label>Kategori Pengaduan:</label>
        <p>{{ $complaint->category }}</p>
    </div>

    <div class="detail">
        <label>Deskripsi:</label>
        <p>{{ $complaint->description }}</p>
    </div>

    <div class="detail">
        <label>Lokasi:</label>
        <p>{{ $complaint->location }}</p>
    </div>

    <div class="detail">
        <label>Lampiran:</label>
        @if($complaint->attachment)
            <p><a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank">Lihat File</a></p>
        @else
            <p>Tidak ada lampiran.</p>
        @endif
    </div>

    <a href="{{ route('dashboard') }}" class="back-button">Kembali ke Daftar Pengaduan</a>
</div>

@endsection
