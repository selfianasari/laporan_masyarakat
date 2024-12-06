@extends('layouts.app')

@section('title', 'Edit Complaint')

@section('content')
<div class="container">
    <h2>Edit Complaint</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('complaints.update', $complaint->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- User Information -->
        <fieldset>
            <legend>User Information</legend>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $complaint->name) }}" required>
                @error('name')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $complaint->email) }}" required>
                @error('email')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telp.:</label>
                <input type="tel" id="phone" name="phone" class="form-control" value="{{ old('phone', $complaint->phone) }}">
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
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $complaint->date) }}" required>
                @error('date')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori Pengaduan:</label>
                <select id="category" name="category" class="form-select" required>
                    <option value="cleanliness" {{ old('category', $complaint->category) == 'cleanliness' ? 'selected' : '' }}>Kebersihan</option>
                    <option value="security" {{ old('category', $complaint->category) == 'security' ? 'selected' : '' }}>Keamanan</option>
                    <option value="infrastructure" {{ old('category', $complaint->category) == 'infrastructure' ? 'selected' : '' }}>Infrastruktur</option>
                    <option value="public_service" {{ old('category', $complaint->category) == 'public_service' ? 'selected' : '' }}>Layanan Publik</option>
                    <option value="other" {{ old('category', $complaint->category) == 'other' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('category')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $complaint->description) }}</textarea>
                @error('description')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lokasi:</label>
                <input type="text" id="location" name="location" class="form-control" value="{{ old('location', $complaint->location) }}">
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
                    <input type="checkbox" id="anonymous" name="anonymous" {{ old('anonymous', $complaint->anonymous) ? 'checked' : '' }}>
                    Kirim Secara Anonim
                </label>
            </div>

            <div class="mb-3">
                <label>
                    <input type="checkbox" name="agreement" required {{ old('agreement') ? 'checked' : '' }}>
                    Saya Setuju Dengan <a href="syarat-dan-ketentuan.html" target="_blank">Syarat dan Ketentuan</a>.
                </label>
                @error('agreement')
                    <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection