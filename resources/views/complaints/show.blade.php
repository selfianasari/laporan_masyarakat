@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <!-- Main Panel -->
    <div class="main-panel">
        <div class="content-wrapper">
            <!-- Page Header -->
            <div class="page-header">
                <h3 class="page-title">Detail Pengaduan</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pengaduan</li>
                    </ol>
                </nav>
            </div>

            <!-- Card for Complaint Details -->
            <div class="row">
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Informasi Pengaduan</h4>

                            <!-- Complaint Details -->
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
                                    <p><a href="{{ $complaint->attachment_url }}" target="_blank">Lihat File</a></p>
                                @else
                                    <p>Tidak ada lampiran.</p>
                                @endif
                            </div>

                            <!-- Back Button -->
                            <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Daftar Pengaduan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
