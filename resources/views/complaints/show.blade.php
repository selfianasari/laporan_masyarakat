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

    <a href="{{ route('complaints.index') }}" class="back-button">Kembali ke Daftar Pengaduan</a>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .detail {
        margin-bottom: 15px;
    }

    .detail label {
        font-weight: bold;
    }

    .back-button {
        display: block;
        margin: 20px auto;
        padding: 10px 15px;
        background-color: #007bff;
        color: white;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>
@endsection
