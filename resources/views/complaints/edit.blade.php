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

        <fieldset>
            <legend>User Information</legend>

            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $complaint->name) }}" required>
            @error('name')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $complaint->email) }}" required>
            @error('email')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror

            <label for="phone">Nomor Telp.:</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone', $complaint->phone) }}">
            @error('phone')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </fieldset>

        <!-- Detail Pengaduan -->
        <fieldset>
            <legend>Detail Pengaduan</legend>

            <label for="date">Tanggal Pengaduan:</label>
            <input type="date" id="date" name="date" value="{{ old('date', $complaint->date) }}" required>
            @error('date')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror

            <label for="category">Kategori Pengaduan:</label>
            <select id="category" name="category" required>
                <option value="cleanliness" {{ old('category', $complaint->category) == 'cleanliness' ? 'selected' : '' }}>Kebersihan</option>
                <option value="security" {{ old('category', $complaint->category) == 'security' ? 'selected' : '' }}>Keamanan</option>
                <option value="infrastructure" {{ old('category', $complaint->category) == 'infrastructure' ? 'selected' : '' }}>Infrastruktur</option>
                <option value="public_service" {{ old('category', $complaint->category) == 'public_service' ? 'selected' : '' }}>Layanan Public</option>
                <option value="other" {{ old('category', $complaint->category) == 'other' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('category')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror

            <label for="description">Deskripsi:</label>
            <textarea id="description" name="description" rows="4" required>{{ old('description', $complaint->description) }}</textarea>
            @error('description')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror

            <label for="location">Lokasi:</label>
            <input type="text" id="location" name="location" value="{{ old('location', $complaint->location) }}">
            @error('location')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </fieldset>

        <!-- Lampiran -->
        <fieldset>
            <legend>Lampiran</legend>

            <label for="attachment">Upload File (optional):</label>
            <input type="file" id="attachment" name="attachment" accept="image/*,application/pdf">
        </fieldset>

        <!-- Anonimitas -->
        <fieldset>
            <legend>Pilihan Privasi</legend>

            <label>
                <input type="checkbox" id="anonymous" name="anonymous" {{ old('anonymous', $complaint->anonymous) ? 'checked' : '' }}>
                Kirim Secara Anonim
            </label>

            <label>
                <input type="checkbox" name="agreement" required {{ old('agreement') ? 'checked' : '' }}>
                Saya Setuju Dengan <a href="syarat-dan-ketentuan.html" target="_blank">Syarat dan Ketentuan</a>.
            </label>
            @error('agreement')
                <div class="error" style="color: red;">{{ $message }}</div>
            @enderror
        </fieldset>

        <button type="submit">Perbarui</button>
    </form>
</div>
@endsection
