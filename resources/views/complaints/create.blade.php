@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Pengaduan</h2>
    <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data">
        @csrf 
        
        <!-- Informasi Pengguna -->
        <fieldset>
            <legend>Informasi Pengguna</legend>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap:</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @error('name')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
                @error('email')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telp.:</label>
                <input type="tel" id="phone" name="phone" class="form-control">
                @error('phone')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>

        <!-- Detail Pengaduan -->
        <fieldset>
            <legend>Detail Pengaduan</legend>

            <div class="mb-3">
                <label for="date" class="form-label">Tanggal Pengaduan:</label>
                <input type="date" id="date" name="date" class="form-control" required>
                @error('date')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori Pengaduan:</label>
                <select id="category" name="category" class="form-select" required>
                    <option value="cleanliness">Kebersihan</option>
                    <option value="security">Keamanan</option>
                    <option value="infrastructure">Infrastruktur</option>
                    <option value="public_service">Layanan Publik</option>
                    <option value="other">Lainnya</option>
                </select>
                @error('category')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                @error('description')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" id="location" name="location" class="form-control">
                @error('location')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>

        <!-- Lampiran -->
        <fieldset>
            <legend>Lampiran</legend>

            <div class="mb-3">
                <label for="attachment" class="form-label">Upload File (optional):</label>
                <input type="file" id="attachment" name="attachment" class="form-control" accept="image/*,application/pdf">
            </div>
        </fieldset>

        <!-- Anonimitas -->
        <fieldset>
            <legend>Pilihan Privasi</legend>

            <div class="mb-3">
                <label>
                    <input type="checkbox" id="anonymous" name="anonymous">
                    Kirim Secara Anonim
                </label>
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="agreement" required>
                    Saya Setuju Dengan <a href="syarat-dan-ketentuan.html" target="_blank">Syarat dan Ketentuan</a>.
                </label>
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    @if(session('success'))
        <div class="thank-you-message">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</div>
@endsection
